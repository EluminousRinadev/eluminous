<?php
/**
 * @package    Spokal
 * @subpackage XML-Sitemaps
 */

/**
 * Class Spokal_Sitemaps
 *
 * @todo: Load this file when an actual sitemap is being requested
 */
class Spokal_Sitemaps {
	/**
	 * Content of the sitemap to output.
	 *
	 * @var string $sitemap
	 */
	private $sitemap = '';

	/**
	 * XSL stylesheet for styling a sitemap for web browsers
	 *
	 * @var string $stylesheet
	 */
	private $stylesheet = '';

	/**
	 * Flag to indicate if this is an invalid or empty sitemap.
	 *
	 * @var bool $bad_sitemap
	 */
	public $bad_sitemap = false;

	/**
	 * Whether or not the XML sitemap was served from a transient or not.
	 *
	 * @var bool $transient
	 */
	private $transient = false;

	/**
	 * The maximum number of entries per sitemap page
	 *
	 * @var int $max_entries
	 */
	private $max_entries;

	/**
	 * Holds the post type's newest publish dates
	 *
	 * @var array $post_type_dates
	 */
	private $post_type_dates;

	/**
	 * Holds the Xml Sitemaps options
	 *
	 * @var array $options
	 */
	private $options = array();

	/**
	 * Holds the n variable
	 *
	 * @var int $n
	 */
	private $n = 1;

	/**
	 * Holds the home_url() value to speed up loops
	 *
	 * @var string $home_url
	 */
	private $home_url = '';

	/**
	 * Holds the get_bloginfo( 'charset' ) value to reuse for performance
	 *
	 * @var string $charset
	 */
	private $charset = '';

	/**
	 * Holds the timezone string value to reuse for performance
	 *
	 * @var string $timezone_string
	 */
	private $timezone_string = '';

	/**
	 * Class constructor
	 */
	function __construct() {
		if ( ! defined( 'ENT_XML1' ) ) {
			define( 'ENT_XML1', 16 );
		}

		add_action( 'after_setup_theme', array( $this, 'reduce_query_load' ), 99 );
		add_filter( 'posts_where', array( $this, 'invalidate_main_query' ) );

		add_action( 'pre_get_posts', array( $this, 'redirect' ), 1 );
		add_filter( 'redirect_canonical', array( $this, 'canonical' ) );
		add_action( 'spokal_hit_sitemap_index', array( $this, 'hit_sitemap_index' ) );

		// default stylesheet
		$this->stylesheet = '<?xml-stylesheet type="text/xsl" href="' . preg_replace( '/(^http[s]?:)/', '', esc_url( home_url( 'main-sp-sitemap.xsl' ) ) ) . '"?>';
                
                $this->options = get_option('spokal_xml_sitemaps',array(
                                                            'enable' => 'true',
                                                            'exclude_post_types' => array(),
                                                            'exclude_taxonomies' => array(),
                                                            'max_entries' => 1000,
                                                            'disable_user' => "true",
                                                            'exclude_users' => array(),
                                                            'no_author_user' => "true"
                                                        ));
		$this->max_entries = $this->options['max_entries'];
                $this->options['trailingslash'] = false;
		$this->home_url    = home_url();
		$this->charset     = get_bloginfo( 'charset' );
                

	}

	/**
	 * Check the current request URI, if we can determine it's probably an XML sitemap, kill loading the widgets
	 */
	public function reduce_query_load() {
		if ( isset( $_SERVER['REQUEST_URI'] ) && ( in_array( substr( $_SERVER['REQUEST_URI'], - 4 ), array(
				'.xml',
				'.xsl',
			) ) )
		) {
			remove_all_actions( 'widgets_init' );
		}
	}

	/**
	 * This query invalidates the main query on purpose so it returns nice and quickly
	 *
	 * @param string $where
	 *
	 * @return string
	 */
	function invalidate_main_query( $where ) {

		global $wp_query;

		// check if $wp_query is properly set which isn't always the case in older WP development versions
		if ( ! is_object( $wp_query ) ) {
			return $where;
		}

		if ( is_main_query() && ( get_query_var( 'sp_sitemap' ) != '' || get_query_var( 'sp_xsl' ) != '' ) ) {
			$where = ' AND 0=1 ' . $where;
		}

		return $where;
	}


	/**
	 * Returns the server HTTP protocol to use for output, if it's set.
	 *
	 * @return string
	 */
	private function http_protocol() {
		return ( isset( $_SERVER['SERVER_PROTOCOL'] ) && $_SERVER['SERVER_PROTOCOL'] !== '' ) ? sanitize_text_field( $_SERVER['SERVER_PROTOCOL'] ) : 'HTTP/1.1';
	}

	/**
	 * Returns the timezone string for a site, even if it's set to a UTC offset
	 *
	 * Adapted from http://www.php.net/manual/en/function.timezone-name-from-abbr.php#89155
	 *
	 * @return string valid PHP timezone string
	 */
	private function determine_timezone_string() {

		// if site timezone string exists, return it
		if ( $timezone = get_option( 'timezone_string' ) ) {
			return $timezone;
		}

		// get UTC offset, if it isn't set then return UTC
		if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) ) {
			return 'UTC';
		}

		// adjust UTC offset from hours to seconds
		$utc_offset *= HOUR_IN_SECONDS;

		// attempt to guess the timezone string from the UTC offset
		$timezone = timezone_name_from_abbr( '', $utc_offset );

		// last try, guess timezone string manually
		if ( false === $timezone ) {

			$is_dst = date( 'I' );

			foreach ( timezone_abbreviations_list() as $abbr ) {
				foreach ( $abbr as $city ) {
					if ( $city['dst'] == $is_dst && $city['offset'] == $utc_offset ) {
						return $city['timezone_id'];
					}
				}
			}
		}

		// fallback to UTC
		return 'UTC';
	}

	/**
	 * Returns the correct timezone string
	 *
	 * @return string
	 */
	private function get_timezone_string() {
		if ( '' == $this->timezone_string ) {
			$this->timezone_string = $this->determine_timezone_string();
		}

		return $this->timezone_string;
	}

	/**
	 * Register your own sitemap. Call this during 'init'.
	 *
	 * @param string   $name     The name of the sitemap
	 * @param callback $function Function to build your sitemap
	 * @param string   $rewrite  Optional. Regular expression to match your sitemap with
	 */
	function register_sitemap( $name, $function, $rewrite = '' ) {
		add_action( 'spokal_do_sitemap_' . $name, $function );
		if ( ! empty( $rewrite ) ) {
			add_rewrite_rule( $rewrite, 'index.php?sp_sitemap=' . $name, 'top' );
		}
	}

	/**
	 * Register your own XSL file. Call this during 'init'.
	 *
	 * @param string   $name     The name of the XSL file
	 * @param callback $function Function to build your XSL file
	 * @param string   $rewrite  Optional. Regular expression to match your sitemap with
	 */
	function register_xsl( $name, $function, $rewrite = '' ) {
		add_action( 'spokal_xsl_' . $name, $function );
		if ( ! empty( $rewrite ) ) {
			add_rewrite_rule( $rewrite, 'index.php?sp_xsl=' . $name, 'top' );
		}
	}

	/**
	 * Set the sitemap content to display after you have generated it.
	 *
	 * @param string $sitemap The generated sitemap to output
	 */
	function set_sitemap( $sitemap ) {
		$this->sitemap = $sitemap;
	}

	/**
	 * Set a custom stylesheet for this sitemap. Set to empty to just remove
	 * the default stylesheet.
	 *
	 * @param string $stylesheet Full xml-stylesheet declaration
	 */
	public function set_stylesheet( $stylesheet ) {
		$this->stylesheet = $stylesheet;
	}

	/**
	 * Set as true to make the request 404. Used stop the display of empty sitemaps or
	 * invalid requests.
	 *
	 * @param bool $bool Is this a bad request. True or false.
	 */
	function set_bad_sitemap( $bool ) {
		$this->bad_sitemap = (bool) $bool;
	}

	/**
	 * Prevent stupid plugins from running shutdown scripts when we're obviously not outputting HTML.
	 *
	 * @since 1.4.16
	 */
	function sitemap_close() {
		remove_all_actions( 'wp_footer' );
		die();
	}

	/**
	 * Hijack requests for potential sitemaps and XSL files.
	 *
	 * @param \WP_Query $query
	 */
	function redirect( $query ) {
                
		if ( ! $query->is_main_query() ) {
			return;
		}
                
		$xsl = get_query_var( 'sp_xsl' );
    		if ( ! empty( $xsl ) ) {
			$this->xsl_output( $xsl );
			$this->sitemap_close();
		}

		$type = get_query_var( 'sp_sitemap' );
                
		if ( empty( $type ) ) {
			return;
		}

		$n = get_query_var( 'sp_sitemap_n' );
		if ( is_scalar( $n ) && intval( $n ) > 0 ) {
			$this->n = intval( $n );
		}
                
                $this->sitemap = get_transient( 'spokal_sitemap_cache_' . $type . '_' . $this->n );

		if ( ! $this->sitemap || '' == $this->sitemap ) {
			$this->build_sitemap( $type );
                        
			// 404 for invalid or emtpy sitemaps
			if ( $this->bad_sitemap ) {
				global $wp_query;
				$wp_query->set_404();
				status_header( 404 );

				return;
			}
                        
                        set_transient( 'spokal_sitemap_cache_' . $type . '_' . $this->n, $this->sitemap, DAY_IN_SECONDS );
			
		}
		else {
			$this->transient = true;
		}
                
		$this->output();
		$this->sitemap_close();
	}

	/**
	 * Attempt to build the requested sitemap. Sets $bad_sitemap if this isn't
	 * for the root sitemap, a post type or taxonomy.
	 *
	 * @param string $type The requested sitemap's identifier.
	 */
	function build_sitemap( $type ) {
            
		if ( $type == 1 ) {
			$this->build_root_map();
		}
		elseif ( post_type_exists( $type ) ) {
			$this->build_post_type_map( $type );
		}
		elseif ( $tax = get_taxonomy( $type ) ) {
			$this->build_tax_map( $tax );
		}
		elseif ( $type == 'author' ) {
			$this->build_user_map();
		}
		elseif ( has_action( 'spokal_do_sitemap_' . $type ) ) {
			do_action( 'spokal_do_sitemap_' . $type );
		}
		else {
			$this->bad_sitemap = true;
		}
	}

	/**
	 * Build the root sitemap -- example.com/sp-sitemap.xml -- which lists sub-sp-sitemaps
	 * for other content types.
	 */
	function build_root_map() {

		global $wpdb;

		$this->sitemap = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		// reference post type specific sitemaps
		$post_types = get_post_types( array( 'public' => true ) );
		if ( is_array( $post_types ) && $post_types !== array() ) {

			foreach ( $post_types as $post_type ) {
				if (in_array($post_type, $this->options['exclude_post_types'])
                                    || in_array( $post_type, array( 'revision', 'nav_menu_item','attachment' ))    
                                    ) {
					continue;
				}

				// using the same query with build_post_type_map($post_type) function to count number of posts.
				$query = $wpdb->prepare( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_status IN ('publish','inherit') AND post_password = '' AND post_author != 0 AND post_date != '0000-00-00 00:00:00' AND post_type = %s ", $post_type );

				$count = $wpdb->get_var( $query );
				if ( $count == 0 ) {
					continue;
				}

				$n = ( $count > $this->max_entries ) ? (int) ceil( $count / $this->max_entries ) : 1;
				for ( $i = 0; $i < $n; $i ++ ) {
					$count = ( $n > 1 ) ? ($i + 1) : '';

					if ( empty( $count ) || $count == $n ) {
						$date = $this->get_last_modified( $post_type );
					}
					else {
						if ( ! isset( $all_dates ) ) {
							$all_dates = $wpdb->get_col( $wpdb->prepare( "SELECT post_modified_gmt FROM (SELECT @rownum:=@rownum+1 rownum, $wpdb->posts.post_modified_gmt FROM (SELECT @rownum:=0) r, $wpdb->posts WHERE post_status IN ('publish','inherit') AND post_type = %s ORDER BY post_modified_gmt ASC) x WHERE rownum %%%d=0", $post_type, $this->max_entries ) );
						}
						$datetime = new DateTime( $all_dates[ $i ], new DateTimeZone( $this->get_timezone_string() ) );
						$date     = $datetime->format( 'c' );
					}

					$this->sitemap .= '<sitemap>' . "\n";
					$this->sitemap .= '<loc>' . Spokal_Sitemaps_Admin::spokal_xml_sitemaps_base_url( $post_type . '-sp-sitemap' . $count . '.xml' ) . '</loc>' . "\n";
					$this->sitemap .= '<lastmod>' . htmlspecialchars( $date ) . '</lastmod>' . "\n";
					$this->sitemap .= '</sitemap>' . "\n";
				}
				unset( $all_dates );
			}
		}
		unset( $post_types, $query, $count, $n, $i, $date );

		// reference taxonomy specific sitemaps
		$taxonomies     = get_taxonomies( array( 'public' => true ), 'objects' );
		$taxonomy_names = array_keys( $taxonomies );

		if ( is_array( $taxonomies ) && $taxonomies !== array() ) {
			foreach ( $taxonomy_names as $tax ) {
				if ( in_array( $tax, array( 'link_category', 'nav_menu' ) ) ) {
					unset( $taxonomy_names[ $tax ], $taxonomies[ $tax ] );
					continue;
				}

				if (in_array($tax, $this->options['exclude_taxonomies'])) {
					unset( $taxonomy_names[ $tax ], $taxonomies[ $tax ] );
					continue;
				}
			}

			// Retrieve all the taxonomies and their terms so we can do a proper count on them.
			$hide_empty         = ( apply_filters( 'spokal_sitemap_exclude_empty_terms', true, $tax ) ) ? 'count != 0 AND' : '';
			$query              = "SELECT taxonomy, term_id FROM $wpdb->term_taxonomy WHERE $hide_empty taxonomy IN ('" . implode( "','", $taxonomy_names ) . "');";
			$all_taxonomy_terms = $wpdb->get_results( $query );
			$all_taxonomies     = array();
			foreach ( $all_taxonomy_terms as $obj ) {
				$all_taxonomies[ $obj->taxonomy ][] = $obj->term_id;
			}
			unset( $all_taxonomy_terms );

			foreach ( $taxonomies as $tax_name => $tax ) {

				$steps = $this->max_entries;
				$count = ( isset ( $all_taxonomies[ $tax_name ] ) ) ? count( $all_taxonomies[ $tax_name ] ) : 0;
                                if ( $count == 0 ) {
					continue;
				}
				$n     = ( $count > $this->max_entries ) ? (int) ceil( $count / $this->max_entries ) : 1;
                                
				for ( $i = 0; $i < $n; $i ++ ) {
					$count = ( $n > 1 ) ? ($i + 1) : '';

					if ( ! is_array( $tax->object_type ) || count( $tax->object_type ) == 0 ) {
						continue;
					}

					if ( ( empty( $count ) || $count == $n ) ) {
						$date = $this->get_last_modified( $tax->object_type );
					}
					else {
						$terms = array_splice( $all_taxonomies[ $tax_name ], 0, $steps );
						if ( ! $terms ) {
							continue;
						}

						$args  = array(
							'post_type' => $tax->object_type,
							'tax_query' => array(
								array(
									'taxonomy' => $tax_name,
									'field'    => 'slug',
									'terms'    => $terms,
								),
							),
							'orderby'   => 'modified',
							'order'     => 'DESC',
						);
						$query = new WP_Query( $args );

						$date = '';
						if ( $query->have_posts() ) {
							$datetime = new DateTime( $query->posts[0]->post_modified_gmt, new DateTimeZone( $this->get_timezone_string() ) );
							$date     = $datetime->format( 'c' );
						}
						else {
							$date = $this->get_last_modified( $tax->object_type );
						}
					}

					$this->sitemap .= '<sitemap>' . "\n";
					$this->sitemap .= '<loc>' . Spokal_Sitemaps_Admin::spokal_xml_sitemaps_base_url( $tax_name . '-sp-sitemap' . $count . '.xml' ) . '</loc>' . "\n";
					$this->sitemap .= '<lastmod>' . htmlspecialchars( $date ) . '</lastmod>' . "\n";
					$this->sitemap .= '</sitemap>' . "\n";
				}
			}
		}
		unset( $taxonomies, $tax, $all_terms, $steps, $count, $n, $i, $tax_object, $date, $terms, $args, $query );
                
		if ( $this->options['disable_user'] === "false"  ) {

			// reference user profile specific sitemaps
                        if ( $this->options['no_author_user'] === "true" ) {
                                $users = get_users( array( 'fields' => 'id' ) );
                        }else{
                            $users = get_users( array( 'who' => 'authors', 'fields' => 'id' ) );
                        }
			
			$count = count( $users );
			$n     = ( $count > $this->max_entries ) ? (int) ceil( $count / $this->max_entries ) : 1;

			for ( $i = 0; $i < $n; $i ++ ) {
				$count = ( $n > 1 ) ? ($i + 1) : '';

				$date_query = "
						SELECT mt1.meta_value FROM $wpdb->users
						INNER JOIN $wpdb->usermeta ON ($wpdb->users.ID = $wpdb->usermeta.user_id)
						INNER JOIN $wpdb->usermeta AS mt1 ON ($wpdb->users.ID = mt1.user_id) WHERE 1=1
						AND ( ($wpdb->usermeta.meta_key = %s AND CAST($wpdb->usermeta.meta_value AS CHAR) != '0')
						AND mt1.meta_key = 'spokal_profile_updated' ) ORDER BY mt1.meta_value
					";

				if ( empty( $count ) || $count == $n ) {
					$date = $wpdb->get_var(
						$wpdb->prepare(
							$date_query . ' ASC LIMIT 1',
							$wpdb->get_blog_prefix() . 'user_level'
						)
					);
				}
				else {
					$date = $wpdb->get_var(
						$wpdb->prepare(
							$date_query . ' DESC LIMIT 1 OFFSET %d',
							$wpdb->get_blog_prefix() . 'user_level',
							($this->max_entries * ( $i + 1 ) - 1)
						)
					);
				}
				$date = new DateTime( date( 'y-m-d H:i:s', $date ), new DateTimeZone( $this->get_timezone_string() ) );

				$this->sitemap .= '<sitemap>' . "\n";
				$this->sitemap .= '<loc>' . Spokal_Sitemaps_Admin::spokal_xml_sitemaps_base_url( 'author-sp-sitemap' . $count . '.xml' ) . '</loc>' . "\n";
				$this->sitemap .= '<lastmod>' . htmlspecialchars( $date->format( 'c' ) ) . '</lastmod>' . "\n";
				$this->sitemap .= '</sitemap>' . "\n";
			}
			unset( $users, $count, $n, $i, $date );
		}

		$this->sitemap .= '</sitemapindex>';
	}

	/**
	 * Function to dynamically filter the change frequency
	 *
	 * @param string $filter  Expands to spokal_sitemap_change_freq_$filter, allowing for a change of the frequency for numerous specific URLs
	 * @param string $default The default value for the frequency
	 * @param string $url     The URL of the currenty entry
	 *
	 * @return mixed|void
	 */
	private function filter_frequency( $filter, $default, $url ) {
		/**
		 * Filter: 'spokal_sitemap_change_freq_' . $filter - Allow filtering of the specific change frequency
		 *
		 * @api string $default The default change frequency
		 */
		$change_freq = apply_filters( 'spokal_sitemap_change_freq_' . $filter, $default, $url );

		if ( ! in_array( $change_freq, array(
			'always',
			'hourly',
			'daily',
			'weekly',
			'monthly',
			'yearly',
			'never',
		) )
		) {
			$change_freq = $default;
		}

		return $change_freq;
	}

	/**
	 * Build a sub-sp-sitemap for a specific post type -- example.com/post_type-sp-sitemap.xml
	 *
	 * @param string $post_type Registered post type's slug
	 */
	function build_post_type_map( $post_type ) {
		global $wpdb;

		if (
			(in_array($post_type, $this->options['exclude_post_types']))
			|| in_array( $post_type, array( 'revision', 'nav_menu_item','attachment' ) )
		) {
			$this->bad_sitemap = true;

			return;
		}

		$output = '';

		$steps  = ( 100 > $this->max_entries ) ? $this->max_entries : 100;
		$n      = (int) $this->n;
		$offset = ( $n > 1 ) ? (( $n - 1 ) * $this->max_entries) : 0;
		$total  = ($offset + $this->max_entries);

		$query = $wpdb->prepare( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_status IN ('publish','inherit') AND post_password = '' AND post_author != 0 AND post_date != '0000-00-00 00:00:00' AND post_type = %s ", $post_type );

		$typecount = $wpdb->get_var( $query );

		if ( $total > $typecount ) {
			$total = $typecount;
		}

		if ( $n === 1 ) {
			$front_id = get_option( 'page_on_front' );
			if ( ! $front_id && ( $post_type == 'post' || $post_type == 'page' ) ) {
				$output .= $this->sitemap_url(
					array(
						'loc' => $this->home_url,
						'pri' => 1,
						'chf' => $this->filter_frequency( 'homepage', 'daily', $this->home_url ),
					)
				);
			}
			elseif ( $front_id && $post_type == 'post' ) {
				$page_for_posts = get_option( 'page_for_posts' );
				if ( $page_for_posts ) {
					$page_for_posts_url = get_permalink( $page_for_posts );
					$output .= $this->sitemap_url(
						array(
							'loc' => $page_for_posts_url,
							'pri' => 1,
							'chf' => $change_freq = $this->filter_frequency( 'blogpage', 'daily', $page_for_posts_url ),
						)
					);
				}
			}

			$archive_url = get_post_type_archive_link( $post_type );
			
			if ( $archive_url ) {
				$output .= $this->sitemap_url(
					array(
						'loc' => $archive_url,
						'pri' => 0.8,
						'chf' => $this->filter_frequency( $post_type . '_archive', 'weekly', $archive_url ),
						'mod' => $this->get_last_modified( $post_type ),
					)
				);
			}
		}
                
		if ( $typecount == 0 && empty( $archive ) ) {
			$this->bad_sitemap = true;

			return;
		}

		$stackedurls = array();

		$status = ( $post_type == 'attachment' ) ? 'inherit' : 'publish';

		$parsed_home = parse_url( $this->home_url );
		$host        = '';
		$scheme      = 'http';
		if ( isset( $parsed_home['host'] ) && ! empty( $parsed_home['host'] ) ) {
			$host = str_replace( 'www.', '', $parsed_home['host'] );
		}
		if ( isset( $parsed_home['scheme'] ) && ! empty( $parsed_home['scheme'] ) ) {
			$scheme = $parsed_home['scheme'];
		}

		while ( $total > $offset ) {
                        
			$query = $wpdb->prepare( "SELECT l.ID, post_title, post_content, post_name, post_author, post_parent, post_modified_gmt, post_date, post_date_gmt FROM ( SELECT ID FROM $wpdb->posts WHERE post_status = '%s' AND post_password = '' AND post_type = '%s' AND post_author != 0 AND post_date != '0000-00-00 00:00:00' ORDER BY post_modified ASC LIMIT %d OFFSET %d ) o JOIN $wpdb->posts l ON l.ID = o.ID ORDER BY l.ID",
				$status, $post_type, $steps, $offset
			);

			$posts = $wpdb->get_results( $query );
                        
			$post_ids = array();
			foreach ( $posts as $p ) {
				$post_ids[] = $p->ID;
			}

			if ( count( $post_ids ) > 0 ) {
				update_meta_cache( 'post', $post_ids );

				$imploded_post_ids = implode( $post_ids, ',' );

				$attachments = $this->get_attachments( $imploded_post_ids );
				$thumbnails  = $this->get_thumbnails( $imploded_post_ids );

				$this->do_attachment_ids_caching( $attachments, $thumbnails );
			}

			$offset = ($offset + $steps);

			if ( is_array( $posts ) && $posts !== array() ) {
				foreach ( $posts as $p ) {
					$p->post_type   = $post_type;
					$p->post_status = 'publish';
					$p->filter      = 'sample';

					$url = array();

					if ( isset( $p->post_modified_gmt ) && $p->post_modified_gmt != '0000-00-00 00:00:00' && $p->post_modified_gmt > $p->post_date_gmt ) {
						$url['mod'] = $p->post_modified_gmt;
					}
					else {
						if ( '0000-00-00 00:00:00' != $p->post_date_gmt ) {
							$url['mod'] = $p->post_date_gmt;
						}
						else {
							$url['mod'] = $p->post_date;
						}
					}

					$url['loc'] = get_permalink( $p );

					$url['chf'] = $this->filter_frequency( $post_type . '_single', 'weekly', $url['loc'] );

					/**
					 * Do not include external URLs.
					 * @see https://wordpress.org/plugins/page-links-to/ can rewrite permalinks to external URLs.
					 */
					if ( false === strpos( $url['loc'], $this->home_url ) ) {
						continue;
					}
                                        
                                        if ( $this->options['trailingslash'] === true && $p->post_type != 'post' ) {
                                                $url['loc'] = trailingslashit( $url['loc'] );
                                        }

					$url['pri'] = $this->calculate_priority( $p );

					$url['images'] = array();

					$content = $p->post_content;
					$content = '<p><img src="' . $this->image_url( get_post_thumbnail_id( $p->ID ) ) . '" alt="' . $p->post_title . '" /></p>' . $content;

					if ( preg_match_all( '`<img [^>]+>`', $content, $matches ) ) {
						foreach ( $matches[0] as $img ) {
							if ( preg_match( '`src=["\']([^"\']+)["\']`', $img, $match ) ) {
								$src = $match[1];
								if ( $this->is_url_relative( $src ) === true ) {
									if ( $src[0] !== '/' ) {
										continue;
									}
									else {
										// The URL is relative, we'll have to make it absolute
										$src = $this->home_url . $src;
									}
								}
								elseif ( strpos( $src, 'http' ) !== 0 ) {
									// Protocol relative url, we add the scheme as the standard requires a protocol
									$src = $scheme . ':' . $src;

								}

								if ( strpos( $src, $host ) === false ) {
									continue;
								}

								if ( $src != esc_url( $src ) ) {
									continue;
								}

								if ( isset( $url['images'][ $src ] ) ) {
									continue;
								}

								$image = array(
									'src' => $src
								);

								if ( preg_match( '`title=["\']([^"\']+)["\']`', $img, $match ) ) {
									$image['title'] = str_replace( array( '-', '_' ), ' ', $match[1] );
								}

								if ( preg_match( '`alt=["\']([^"\']+)["\']`', $img, $match ) ) {
									$image['alt'] = str_replace( array( '-', '_' ), ' ', $match[1] );
								}

								$image = $image;

								$url['images'][] = $image;
							}
						}
					}

					if ( strpos( $p->post_content, '[gallery' ) !== false ) {
						if ( is_array( $attachments ) && $attachments !== array() ) {
							$url['images'] = $this->parse_attachments( $attachments, $p );
						}
						unset( $attachment, $src, $image, $alt );
					}

					if ( ! in_array( $url['loc'], $stackedurls ) ) {
						if ( is_array( $url ) && $url !== array() ) {
							$output .= $this->sitemap_url( $url );
							$stackedurls[] = $url['loc'];
						}
					}
					// Clear the post_meta and the term cache for the post, as we no longer need it now.
//					 wp_cache_delete( $p->ID, 'post_meta' );
//					 clean_object_term_cache( $p->ID, $post_type );
				}
			}
		}

		if ( empty( $output ) ) {
			$this->bad_sitemap = true;

			return;
		}

		$this->sitemap = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" ';
		$this->sitemap .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" ';
		$this->sitemap .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		$this->sitemap .= $output;

		$this->sitemap .= '</urlset>';
	}

	/**
	 * Build a sub-sp-sitemap for a specific taxonomy -- example.com/tax-sp-sitemap.xml
	 *
	 * @param string $taxonomy Registered taxonomy's slug
	 */
	function build_tax_map( $taxonomy ) {
		if (
			( in_array($taxonomy->name, $this->options['exclude_taxonomies']) )
			|| in_array( $taxonomy, array( 'link_category', 'nav_menu' ) )
		) {
			$this->bad_sitemap = true;

			return;
		}
                
		global $wpdb;

		$output = '';

		$steps  = $this->max_entries;
		$n      = (int) $this->n;
		$offset = ( $n > 1 ) ? (( $n - 1 ) * $this->max_entries) : 0;

		$terms      = get_terms( $taxonomy->name, array( 'hide_empty' => true ) );
		$terms      = array_splice( $terms, $offset, $steps );

		if ( is_array( $terms ) && $terms !== array() ) {
			foreach ( $terms as $c ) {
				$url = array();
                                $url['loc'] = "";
				if ( ! is_string( $url['loc'] ) || $url['loc'] === '' ) {
					$url['loc'] = get_term_link( $c, $c->taxonomy );
					if ( $this->options['trailingslash'] === true ) {
						$url['loc'] = trailingslashit( $url['loc'] );
					}
				}
				if ( $c->count > 10 ) {
					$url['pri'] = 0.6;
				}
				else {
					if ( $c->count > 3 ) {
						$url['pri'] = 0.4;
					}
					else {
						$url['pri'] = 0.2;
					}
				}

				// Grab last modified date
				$sql        = $wpdb->prepare(
					"
						SELECT MAX(p.post_modified_gmt) AS lastmod
						FROM	$wpdb->posts AS p
						INNER JOIN $wpdb->term_relationships AS term_rel
							ON		term_rel.object_id = p.ID
						INNER JOIN $wpdb->term_taxonomy AS term_tax
							ON		term_tax.term_taxonomy_id = term_rel.term_taxonomy_id
							AND		term_tax.taxonomy = %s
							AND		term_tax.term_id = %d
						WHERE	p.post_status IN ('publish','inherit')
							AND		p.post_password = ''",
					$c->taxonomy,
					$c->term_id
				);
				$url['mod'] = $wpdb->get_var( $sql );
				$url['chf'] = $this->filter_frequency( $c->taxonomy . '_term', 'weekly', $url['loc'] );

				if ( is_array( $url ) && $url !== array() ) {
					$output .= $this->sitemap_url( $url );
				}
			}
		}
                
		if ( empty( $output ) ) {
			$this->bad_sitemap = true;

			return;
		}

		$this->sitemap = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
		$this->sitemap .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" ';
		$this->sitemap .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		if ( is_string( $output ) && trim( $output ) !== '' ) {
			$this->sitemap .= $output;
		}
		else {
			// If the sitemap is empty, add the homepage URL to make sure it doesn't throw errors in GWT.
			$this->sitemap .= $this->sitemap_url( home_url() );
		}
		$this->sitemap .= '</urlset>';
                
	}


	/**
	 * Build the sub-sp-sitemap for authors
	 *
	 * @since 1.4.8
	 */
	function build_user_map() {
		if ($this->options['disable_user'] === "true") {
			$this->bad_sitemap = true;

			return;
		}

		$output = '';

		$steps  = $this->max_entries;
		$n      = (int) $this->n;
		$offset = ( $n > 1 ) ? (( $n - 1 ) * $this->max_entries) : 0;

		$users = get_users(
			array(
				'who'        => 'authors',
				'meta_query' => array(
					array(
						'key'     => 'spokal_profile_updated',
						'value'   => 'some-value',
						'compare' => 'NOT EXISTS',
					),
				)
			)
		);

		if ( is_array( $users ) && $users !== array() ) {
			foreach ( $users as $user ) {
				update_user_meta( $user->ID, 'spokal_profile_updated', time() );
			}
		}
		unset( $users, $user );

		// query for users with this meta
		$users = get_users(
			array(
				'who'      => 'authors',
				'offset'   => $offset,
				'number'   => $steps,
				'meta_key' => 'spokal_profile_updated',
				'orderby'  => 'meta_value_num',
				'order'    => 'ASC',
			)
		);

                add_filter( 'spokal_sitemap_exclude_author', array( $this, 'user_sitemap_remove_excluded_authors' ), 8 );

		$users = apply_filters( 'spokal_sitemap_exclude_author', $users );
                
                // ascending sort
		usort( $users, array( $this, 'user_map_sorter' ) );
                
		if ( is_array( $users ) && $users !== array() ) {
			foreach ( $users as $user ) {
				$author_link = get_author_posts_url( $user->ID );
				if ( $author_link !== '' ) {
					$url = array(
						'loc' => $author_link,
						'pri' => 0.8,
						'chf' => $change_freq = $this->filter_frequency( 'author_archive', 'daily', $author_link ),
						'mod' => date( 'c', isset( $user->spokal_profile_updated ) ? $user->spokal_profile_updated : time() ),
					);

					if ( is_array( $url ) && $url !== array() ) {
						$output .= $this->sitemap_url( $url );
					}
				}
			}
			unset( $user, $author_link );
		}

		if ( empty( $output ) ) {
			$this->bad_sitemap = true;

			return;
		}

		$this->sitemap = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" ';
		$this->sitemap .= 'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" ';
		$this->sitemap .= 'xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
		$this->sitemap .= $output;

		$this->sitemap .= '</urlset>';
	}

	/**
	 * Spits out the XSL for the XML sitemap.
	 *
	 * @param string $type
	 *
	 * @since 1.4.13
	 */
	function xsl_output( $type ) {
		if ( $type == 'main' ) {
			header( $this->http_protocol() . ' 200 OK', true, 200 );
			// Prevent the search engines from indexing the XML Sitemap.
			header( 'X-Robots-Tag: noindex, follow', true );
			header( 'Content-Type: text/xml' );

			// Make the browser cache this file properly.
			$expires = YEAR_IN_SECONDS;
			header( 'Pragma: public' );
			header( 'Cache-Control: maxage=' . $expires );
			header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', (time() + $expires) ) . ' GMT' );

			require_once( 'sitemap-xsl.php' );
		}
		else {
			do_action( 'spokal_xsl_' . $type );
		}
	}

	/**
	 * Spit out the generated sitemap and relevant headers and encoding information.
	 */
	function output() {
		header( $this->http_protocol() . ' 200 OK', true, 200 );
		// Prevent the search engines from indexing the XML Sitemap.
		header( 'X-Robots-Tag: noindex,follow', true );
		header( 'Content-Type: text/xml' );
		echo '<?xml version="1.0" encoding="' . esc_attr( $this->charset ) . '"?>';
		if ( $this->stylesheet ) {
			echo $this->stylesheet . "\n";
		}
		echo $this->sitemap;
		echo "\n" . '<!-- XML Sitemap generated by Spokal -->';

		$debug_display = defined( 'WP_DEBUG_DISPLAY' ) && true === WP_DEBUG_DISPLAY;
		$debug         = defined( 'WP_DEBUG' ) && true === WP_DEBUG;

		if ( $debug_display && $debug ) {
			if ( $this->transient ) {
				echo "\n" . '<!-- ' . number_format( ( memory_get_peak_usage() / 1024 / 1024 ), 2 ) . 'MB | Served from transient cache -->';
			}
			else {
				global $wpdb;
				echo "\n" . '<!-- ' . number_format( ( memory_get_peak_usage() / 1024 / 1024 ), 2 ) . 'MB | ' . esc_attr( $wpdb->num_queries ) . ' -->';
				if ( defined( 'SAVEQUERIES' ) && SAVEQUERIES ) {
					echo "\n" . '<!--' . print_r( $wpdb->queries, true ) . '-->';
				}
			}
		}
	}

	/**
	 * Build the <url> tag for a given URL.
	 *
	 * @param array $url Array of parts that make up this entry
	 *
	 * @return string
	 */
	function sitemap_url( $url ) {

		// Create a DateTime object date in the correct timezone
		if ( isset( $url['mod'] ) ) {
			$date = new DateTime( $url['mod'], new DateTimeZone( $this->get_timezone_string() ) );
		}
		else {
			$date = new DateTime( date( 'y-m-d H:i:s' ), new DateTimeZone( $this->get_timezone_string() ) );
		}

		$url['loc'] = htmlspecialchars( $url['loc'] );

		$output = "\t<url>\n";
		$output .= "\t\t<loc>" . $url['loc'] . "</loc>\n";
		$output .= "\t\t<lastmod>" . $date->format( 'c' ) . "</lastmod>\n";
		$output .= "\t\t<changefreq>" . $url['chf'] . "</changefreq>\n";
		$output .= "\t\t<priority>" . str_replace( ',', '.', $url['pri'] ) . "</priority>\n";

		if ( isset( $url['images'] ) && ( is_array( $url['images'] ) && $url['images'] !== array() ) ) {
			foreach ( $url['images'] as $img ) {
				if ( ! isset( $img['src'] ) || empty( $img['src'] ) ) {
					continue;
				}
				$output .= "\t\t<image:image>\n";
				$output .= "\t\t\t<image:loc>" . esc_html( $img['src'] ) . "</image:loc>\n";
				if ( isset( $img['title'] ) && ! empty( $img['title'] ) ) {
					$output .= "\t\t\t<image:title><![CDATA[" . _wp_specialchars( html_entity_decode( $img['title'], ENT_QUOTES, $this->charset ) ) . "]]></image:title>\n";
				}
				if ( isset( $img['alt'] ) && ! empty( $img['alt'] ) ) {
					$output .= "\t\t\t<image:caption><![CDATA[" . _wp_specialchars( html_entity_decode( $img['alt'], ENT_QUOTES, $this->charset ) ) . "]]></image:caption>\n";
				}
				$output .= "\t\t</image:image>\n";
			}
		}
		$output .= "\t</url>\n";

		return $output;
	}

	/**
	 * Make a request for the sitemap index so as to cache it before the arrival of the search engines.
	 */
	function hit_sitemap_index() {
		$url = Spokal_Sitemaps_Admin::spokal_xml_sitemaps_base_url( 'sp-sitemap.xml' );
		wp_remote_get( $url );
	}

	/**
	 * Hook into redirect_canonical to stop trailing slashes on sitemap.xml URLs
	 *
	 * @param string $redirect The redirect URL currently determined.
	 *
	 * @return bool|string $redirect
	 */
	function canonical( $redirect ) {
		$sitemap = get_query_var( 'sp_sitemap' );
		if ( ! empty( $sitemap ) ) {
			return false;
		}

		$xsl = get_query_var( 'sp_xsl' );
		if ( ! empty( $xsl ) ) {
			return false;
		}

		return $redirect;
	}

	/**
	 * Get the modification date for the last modified post in the post type:
	 *
	 * @param array $post_types Post types to get the last modification date for
	 *
	 * @return string
	 */
	function get_last_modified( $post_types ) {
		global $wpdb;

		if ( ! is_array( $post_types ) ) {
			$post_types = array( $post_types );
		}

		// We need to do this only once, as otherwise we'd be doing a query for each post type
		if ( ! is_array( $this->post_type_dates ) ) {
			$this->post_type_dates = array();
			$query                 = "SELECT post_type, MAX(post_modified_gmt) AS date FROM $wpdb->posts WHERE post_status IN ('publish','inherit') AND post_type IN ('" . implode( "','", get_post_types( array( 'public' => true ) ) ) . "') GROUP BY post_type ORDER BY post_modified_gmt DESC";
			$results               = $wpdb->get_results( $query );
			foreach ( $results as $obj ) {
				$this->post_type_dates[ $obj->post_type ] = $obj->date;
			}
			unset( $results );
		}

		if ( count( $post_types ) === 1 && isset( $this->post_type_dates[ $post_types[0] ] ) ) {
			$result = $this->post_type_dates[ $post_types[0] ];
		}
		else {
			$result = null;
			foreach ( $post_types as $post_type ) {
				if ( isset( $this->post_type_dates[ $post_type ] ) && strtotime( $this->post_type_dates[ $post_type ] ) > $result ) {
					$result = $this->post_type_dates[ $post_type ];
				}
			}
		}

		$date = new DateTime( $result, new DateTimeZone( $this->get_timezone_string() ) );

		return $date->format( 'c' );
	}
        
        /**
	 * Sorts an array of WP_User by the spokal_profile_updated meta field
	 *
	 * since 1.6
	 *
	 * @param Wp_User $a The first WP user
	 * @param Wp_User $b The second WP user
	 *
	 * @return int 0 if equal, 1 if $a is larger else or -1;
	 */
	private function user_map_sorter( $a, $b ) {
		if ( ! isset( $a->spokal_profile_updated ) ) {
			$a->spokal_profile_updated = time();
		}
		if ( ! isset( $b->spokal_profile_updated ) ) {
			$b->spokal_profile_updated = time();
		}

		if ( $a->spokal_profile_updated == $b->spokal_profile_updated ) {
			return 0;
		}

		return ( $a->spokal_profile_updated > $b->spokal_profile_updated ) ? 1 : (- 1);
	}

	/**
	 * Filtering users that should be exclude by excluded role.
	 *
	 * @param array $users
	 *
	 * @return array all the user that aren't excluded from the sitemap
	 */
	public function user_sitemap_remove_excluded_authors( $users ) {

		if ( is_array( $users ) && $users !== array() ) {

                    foreach ( $users as $user_key => $user ) {
                        $exclude_user = false;

                        if ( $this->options['no_author_user'] === "true" ) {
                                $count_posts  = count_user_posts( $user->ID );
                                $exclude_user = $count_posts == 0;
                        }

                        $user_role    = $user->roles[0];
                        if(in_array($user_role,$this->options['exclude_users'])){
                            $exclude_user = true;
                        }
                        

                        if ( $exclude_user === true ) {
                                unset( $users[ $user_key ] );
                        }
                    }
		}

		return $users;
	}

	/**
	 * Get attached image URL - Adapted from core for speed
	 *
	 * @param int $post_id
	 *
	 * @return string
	 */
	private function image_url( $post_id ) {

		static $uploads;

		if ( empty( $uploads ) ) {
			$uploads = wp_upload_dir();
		}

		if ( false !== $uploads['error'] ) {
			return '';
		}

		$url = '';

		if ( $file = get_post_meta( $post_id, '_wp_attached_file', true ) ) {
			if ( 0 === strpos( $file, $uploads['basedir'] ) ) { 
				$url = str_replace( $uploads['basedir'], $uploads['baseurl'], $file );
			} //replace file location with url location
			elseif ( false !== strpos( $file, 'wp-content/uploads' ) ) {
				$url = $uploads['baseurl'] . substr( $file, (strpos( $file, 'wp-content/uploads' ) + 18) );
			}
			else {
				$url = $uploads['baseurl'] . "/$file";
			} 
		}

		return $url;
	}


	/**
	 * Getting the attachments from database
	 *
	 * @param string $post_ids
	 *
	 * @return mixed
	 */
	private function get_attachments( $post_ids ) {
		global $wpdb;
		$child_query = "SELECT ID, post_title, post_parent FROM $wpdb->posts WHERE post_status = 'inherit' AND post_type = 'attachment' AND post_parent IN (" . $post_ids . ')';
		$wpdb->query( $child_query );
		$attachments = $wpdb->get_results( $child_query );

		return $attachments;
	}

	/**
	 * Getting thumbnails
	 *
	 * @param array $post_ids
	 *
	 * @return mixed
	 */
	private function get_thumbnails( $post_ids ) {
		global $wpdb;

		$thumbnail_query = "SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id' AND post_id IN (" . $post_ids . ')';
		$wpdb->query( $thumbnail_query );
		$thumbnails = $wpdb->get_results( $thumbnail_query );

		return $thumbnails;
	}

	/**
	 * Parsing attachment_ids and do the caching
	 *
	 * @param array $attachments
	 * @param array $thumbnails
	 */
	private function do_attachment_ids_caching( $attachments, $thumbnails ) {
		$attachment_ids = wp_list_pluck( $attachments, 'ID' );
		$thumbnail_ids  = wp_list_pluck( $thumbnails, 'meta_value' );

		$attachment_ids = array_unique( array_merge( $thumbnail_ids, $attachment_ids ) );

		_prime_post_caches( $attachment_ids );
		update_meta_cache( 'post', $attachment_ids );
	}

	/**
	 * Parses the given attachments
	 *
	 * @param array     $attachments
	 * @param stdobject $post
	 *
	 * @return array
	 */
	private function parse_attachments( $attachments, $post ) {

		$return = array();

		foreach ( $attachments as $attachment ) {
			if ( $attachment->post_parent !== $post->ID ) {
				continue;
			}

			$src   = $this->image_url( $attachment->ID );
			$image = array(
				'src' => $src
			);

			$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
			if ( $alt !== '' ) {
				$image['alt'] = $alt;
			}
			unset( $alt );

			$image['title'] = $attachment->post_title;

			$return[] = $image;
		}

		return $return;
	}

	/**
	 * Calculate the priority of the post
	 *
	 * @param stdobject $post
	 *
	 * @return float|mixed
	 */
	private function calculate_priority( $post ) {
		$front_id = get_option( 'page_on_front' );
                if ( $post->post_parent == 0 && $post->post_type == 'page' ) {
                        $return = 0.8;
                }
                else {
                        $return = 0.6;
                }

		if ( isset( $front_id ) && $post->ID == $front_id ) {
			$return = 1.0;
		}

		return $return;
	}

        
        
        /**
        * Check whether a url is relative
        *
        * @param string $url
        *
        * @return bool
        */
        public function is_url_relative( $url ) {
		return ( strpos( $url, 'http' ) !== 0 && strpos( $url, '//' ) !== 0 );
	}
} /* End of class */
