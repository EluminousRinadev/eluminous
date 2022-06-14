<?php /** * Prevent Direct Access */ defined( 'ABSPATH' ) or die( "Restricted access!" ); /** * Callback for getting a list of items * @return array (multilevel array) */ function spacexchimp_p005_get_items_media() { $text = SPACEXCHIMP_P005_TEXT; return array( array( 'slug' => 'facebook', 'label' => 'Facebook', 'placeholder' => 'https://www.facebook.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Facebook' ), 'link' => '//www.facebook.com' ), array( 'slug' => 'facebook-group', 'label' => 'Facebook Group', 'placeholder' => 'https://www.facebook.com/groups/YourGroupnameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Facebook Group' ), 'link' => '//www.facebook.com' ), array( 'slug' => 'twitter', 'label' => 'Twitter', 'placeholder' => 'https://twitter.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Twitter' ), 'link' => '//twitter.com' ), array( 'slug' => 'instagram', 'label' => 'Instagram', 'placeholder' => 'https://instagram.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Instagram' ), 'link' => '//instagram.com' ), array( 'slug' => 'google-plus', 'label' => 'Google+', 'placeholder' => 'https://plus.google.com/u/0/+YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Google+' ), 'link' => '//plus.google.com' ), array( 'slug' => 'youtube', 'label' => 'YouTube', 'placeholder' => 'https://www.youtube.com/channel/YourChannelIdentifierHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'YouTube' ), 'link' => '//www.youtube.com' ), array( 'slug' => 'youtube-gaming', 'label' => 'YouTube Gaming', 'placeholder' => 'https://gaming.youtube.com/channel/YourChannelIdentifierHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'YouTube Gaming' ), 'link' => '//gaming.youtube.com' ), array( 'slug' => 'google-play', 'label' => 'Google Play', 'placeholder' => 'https://play.google.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Google Play' ), 'link' => '//play.google.com' ), array( 'slug' => 'itunes', 'label' => 'iTunes', 'placeholder' => 'https://www.apple.com/itunes/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'iTunes' ), 'link' => '//www.apple.com/itunes' ), array( 'slug' => 'itunes-podcasts', 'label' => 'iTunes Podcasts', 'placeholder' => 'https://www.apple.com/itunes/podcasts/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'iTunes Podcasts' ), 'link' => '//www.apple.com/itunes/podcasts' ), array( 'slug' => 'apple-music', 'label' => 'Apple Music', 'placeholder' => 'https://www.apple.com/lae/music/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Apple Music' ), 'link' => '//www.apple.com/lae/music' ), array( 'slug' => 'periscope', 'label' => 'Periscope', 'placeholder' => 'https://www.periscope.tv/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Periscope' ), 'link' => '//www.periscope.tv' ), array( 'slug' => 'vimeo', 'label' => 'Vimeo', 'placeholder' => 'https://vimeo.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Vimeo' ), 'link' => '//vimeo.com' ), array( 'slug' => 'blogger', 'label' => 'Blogger', 'placeholder' => 'https://YourBlogNameHere.blogspot.com', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Blogger' ), 'link' => '//www.blogger.com' ), array( 'slug' => 'buzzsprout', 'label' => 'Buzzsprout', 'placeholder' => 'https://www.buzzsprout.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Buzzsprout' ), 'link' => '//www.buzzsprout.com' ), array( 'slug' => 'livejournal', 'label' => 'LiveJournal', 'placeholder' => 'https://YourUsernameHere.livejournal.com', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'LiveJournal' ), 'link' => '//www.livejournal.com' ), array( 'slug' => 'reddit', 'label' => 'Reddit', 'placeholder' => 'https://www.reddit.com/user/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Reddit' ), 'link' => '//www.reddit.com' ), array( 'slug' => 'linkedin', 'label' => 'LinkedIn', 'placeholder' => 'https://linkedin.com/in/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'LinkedIn' ), 'link' => '//linkedin.com' ), array( 'slug' => 'diaspora', 'label' => 'Diaspora', 'placeholder' => 'https://diasporafoundation.org/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Diaspora' ), 'link' => '//diasporafoundation.org' ), array( 'slug' => 'deviantart', 'label' => 'DeviantArt', 'placeholder' => 'https://www.deviantart.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'DeviantArt' ), 'link' => '//www.deviantart.com' ), array( 'slug' => 'xing', 'label' => 'XING', 'placeholder' => 'https://www.xing.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'XING' ), 'link' => '//www.xing.com' ), array( 'slug' => 'pinterest', 'label' => 'Pinterest', 'placeholder' => 'https://www.pinterest.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Pinterest' ), 'link' => '//www.pinterest.com' ), array( 'slug' => 'flickr', 'label' => 'Flickr', 'placeholder' => 'https://www.flickr.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Flickr' ), 'link' => '//www.flickr.com' ), array( 'slug' => 'tumblr', 'label' => 'Tumblr', 'placeholder' => 'https://www.tumblr.com/blog/YourBlogNameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Tumblr' ), 'link' => '//www.tumblr.com' ), array( 'slug' => 'snapchat', 'label' => 'Snapchat', 'placeholder' => 'https://www.snapchat.com/add/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Snapchat' ), 'link' => '//www.snapchat.com' ), array( 'slug' => 'twitch', 'label' => 'Twitch', 'placeholder' => 'https://www.twitch.tv/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Twitch' ), 'link' => '//www.twitch.tv' ), array( 'slug' => 'patreon', 'label' => 'Patreon', 'placeholder' => 'https://www.patreon.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Patreon' ), 'link' => '//www.patreon.com' ), array( 'slug' => 'imdb', 'label' => 'IMDb', 'placeholder' => 'https://www.imdb.com/name/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'IMDb' ), 'link' => '//www.imdb.com' ), array( 'slug' => 'soundcloud', 'label' => 'SoundCloud', 'placeholder' => 'https://soundcloud.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'SoundCloud' ), 'link' => '//soundcloud.com' ), array( 'slug' => 'plugdj', 'label' => 'Plug.dj', 'placeholder' => 'https://plug.dj/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Plug.dj' ), 'link' => '//plug.dj' ), array( 'slug' => 'spotify', 'label' => 'Spotify', 'placeholder' => 'https://open.spotify.com/user/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Spotify' ), 'link' => '//www.spotify.com' ), array( 'slug' => 'bandcamp', 'label' => 'Bandcamp', 'placeholder' => 'https://bandcamp.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Bandcamp' ), 'link' => '//bandcamp.com' ), array( 'slug' => 'dloky', 'label' => 'Dloky', 'placeholder' => 'https://dloky.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Dloky' ), 'link' => '//dloky.com' ), array( 'slug' => 'amazon', 'label' => 'Amazon', 'placeholder' => 'https://www.amazon.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Amazon' ), 'link' => '//www.amazon.com' ), array( 'slug' => 'bookbub', 'label' => 'BookBub', 'placeholder' => 'https://www.bookbub.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'BookBub' ), 'link' => '//www.bookbub.com' ), array( 'slug' => 'goodreads', 'label' => 'Goodreads', 'placeholder' => 'https://www.goodreads.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Goodreads' ), 'link' => '//www.goodreads.com' ), array( 'slug' => 'meetvibe', 'label' => 'MeetVibe', 'placeholder' => 'https://meetvibe.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'MeetVibe' ), 'link' => '//meetvibe.com' ), array( 'slug' => 'meetup', 'label' => 'Meetup', 'placeholder' => 'https://www.meetup.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Meetup' ), 'link' => '//www.meetup.com' ), array( 'slug' => 'steam', 'label' => 'Steam', 'placeholder' => 'https://store.steampowered.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Steam' ), 'link' => '//store.steampowered.com' ), array( 'slug' => 'mixer', 'label' => 'Mixer', 'placeholder' => 'https://mixer.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Mixer' ), 'link' => '//mixer.com' ), array( 'slug' => 'discord', 'label' => 'Discord', 'placeholder' => 'https://discordapp.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Discord' ), 'link' => '//discordapp.com' ), array( 'slug' => 'yelp', 'label' => 'Yelp', 'placeholder' => 'https://www.yelp.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Yelp' ), 'link' => '//www.yelp.com' ), array( 'slug' => 'stumbleupon', 'label' => 'StumbleUpon', 'placeholder' => 'https://www.stumbleupon.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'StumbleUpon' ), 'link' => '//www.stumbleupon.com' ), array( 'slug' => 'bloglovin', 'label' => 'Bloglovin', 'placeholder' => 'https://www.bloglovin.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Bloglovin' ), 'link' => '//www.bloglovin.com' ), array( 'slug' => 'whatsapp', 'label' => 'WhatsApp', 'placeholder' => 'https://www.whatsapp.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'WhatsApp' ), 'link' => '//www.whatsapp.com' ), array( 'slug' => 'medium', 'label' => 'Medium', 'placeholder' => 'https://medium.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Medium' ), 'link' => '//medium.com' ), array( 'slug' => '500px', 'label' => '500px', 'placeholder' => 'https://500px.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), '500px' ), 'link' => '//500px.com' ), array( 'slug' => 'behance', 'label' => 'Behance', 'placeholder' => 'https://www.behance.net/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Behance' ), 'link' => '//www.behance.net' ), array( 'slug' => 'polyvore', 'label' => 'Polyvore', 'placeholder' => 'https://www.polyvore.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Polyvore' ), 'link' => '//www.polyvore.com' ), array( 'slug' => 'yellowpages', 'label' => 'Yellow Pages', 'placeholder' => 'https://www.yellowpages.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Yellow Pages' ), 'link' => '//www.yellowpages.com' ), array( 'slug' => 'line', 'label' => 'LINE', 'placeholder' => 'https://line.me/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'LINE' ), 'link' => '//line.me' ), array( 'slug' => 'itch', 'label' => 'itch', 'placeholder' => 'https://itch.io/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'itch' ), 'link' => '//itch.io' ), array( 'slug' => 'mastodon', 'label' => 'Mastodon', 'placeholder' => 'https://mastodon.social/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Mastodon' ), 'link' => '//mastodon.social' ), array( 'slug' => 'remind', 'label' => 'Remind', 'placeholder' => 'https://www.remind.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Remind' ), 'link' => '//www.remind.com' ), array( 'slug' => 'trademe', 'label' => 'Trade Me', 'placeholder' => 'https://www.trademe.co.nz/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Trade Me' ), 'link' => '//www.trademe.co.nz' ), array( 'slug' => 'vsco', 'label' => 'VSCO', 'placeholder' => 'https://vsco.co/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'VSCO' ), 'link' => '//vsco.co' ), array( 'slug' => 'hireology', 'label' => 'Hireology', 'placeholder' => 'https://hireology.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Hireology' ), 'link' => '//hireology.com' ), array( 'slug' => 'kompoz', 'label' => 'Kompoz', 'placeholder' => 'https://www.kompoz.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Kompoz' ), 'link' => '//www.kompoz.com' ), array( 'slug' => 'soundblend', 'label' => 'SoundBlend', 'placeholder' => 'https://www.soundblend.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'SoundBlend' ), 'link' => '//www.soundblend.com' ), array( 'slug' => 'vkontakte', 'label' => 'VKontakte', 'placeholder' => 'https://vk.com/id_YourIdentifierHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'VKontakte' ), 'link' => '//vk.com' ), array( 'slug' => 'odnoklassniki', 'label' => 'Odnoklassniki', 'placeholder' => 'https://ok.ru/profile/YourIdentifierHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Odnoklassniki' ), 'link' => '//ok.ru' ), array( 'slug' => 'telegram', 'label' => 'Telegram', 'placeholder' => 'https://telegram.me/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Telegram' ), 'link' => '//telegram.org' ), array( 'slug' => 'github', 'label' => 'GitHub', 'placeholder' => 'https://github.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'GitHub' ), 'link' => '//github.com' ), array( 'slug' => 'wordpress', 'label' => 'WordPress', 'placeholder' => 'https://profiles.wordpress.org/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'WordPress' ), 'link' => '//wordpress.org' ), array( 'slug' => 'codepen', 'label' => 'CodePen', 'placeholder' => 'http://codepen.io/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'CodePen' ), 'link' => '//codepen.io' ), array( 'slug' => 'askfm', 'label' => 'ASKfm', 'placeholder' => 'https://ask.fm/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'ASKfm' ), 'link' => '//ask.fm' ), array( 'slug' => 'ebay', 'label' => 'eBay', 'placeholder' => 'https://www.ebay.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'eBay' ), 'link' => '//www.ebay.com' ), array( 'slug' => 'hangouts', 'label' => 'Hangouts', 'placeholder' => 'https://hangouts.google.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Hangouts' ), 'link' => '//hangouts.google.com' ), array( 'slug' => 'houzz', 'label' => 'Houzz', 'placeholder' => 'https://www.houzz.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Houzz' ), 'link' => '//www.houzz.com' ), array( 'slug' => 'quora', 'label' => 'Quora', 'placeholder' => 'https://www.quora.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Quora' ), 'link' => '//www.quora.com' ), array( 'slug' => 'steemit', 'label' => 'Steemit', 'placeholder' => 'https://steemit.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Steemit' ), 'link' => '//steemit.com' ), array( 'slug' => 'theartstack', 'label' => 'ArtStack', 'placeholder' => 'https://theartstack.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'ArtStack' ), 'link' => '//theartstack.com' ), array( 'slug' => 'theknot', 'label' => 'The Knot', 'placeholder' => 'https://www.theknot.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'The Knot' ), 'link' => '//www.theknot.com' ), array( 'slug' => 'viber', 'label' => 'Viber', 'placeholder' => 'https://www.viber.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Viber' ), 'link' => '//www.viber.com' ), array( 'slug' => 'etsy', 'label' => 'Etsy', 'placeholder' => 'https://www.etsy.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Etsy' ), 'link' => '//www.etsy.com' ), array( 'slug' => 'tripadvisor', 'label' => 'Trip Advisor', 'placeholder' => 'https://www.tripadvisor.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Trip Advisor' ), 'link' => '//www.tripadvisor.com' ), array( 'slug' => 'stackoverflow', 'label' => 'Stack Overflow', 'placeholder' => 'https://stackoverflow.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Stack Overflow' ), 'link' => '//stackoverflow.com' ), array( 'slug' => 'stackexchange', 'label' => 'Stack Exchange', 'placeholder' => 'https://stackexchange.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Stack Exchange' ), 'link' => '//stackexchange.com' ), array( 'slug' => 'bitbucket', 'label' => 'Bitbucket', 'placeholder' => 'https://bitbucket.org/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Bitbucket' ), 'link' => '//bitbucket.org' ), array( 'slug' => 'dailypaintworks', 'label' => 'Daily Paintworks', 'placeholder' => 'https://www.dailypaintworks.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Daily Paintworks' ), 'link' => '//www.dailypaintworks.com' ), array( 'slug' => 'flipboard', 'label' => 'Flipboard', 'placeholder' => 'https://flipboard.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Flipboard' ), 'link' => '//flipboard.com' ), array( 'slug' => 'feedsfloor', 'label' => 'FeedsFloor', 'placeholder' => 'https://www.feedsfloor.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'FeedsFloor' ), 'link' => '//www.feedsfloor.com' ), array( 'slug' => 'gab', 'label' => 'Gab', 'placeholder' => 'https://gab.ai/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Gab' ), 'link' => '//gab.ai' ), array( 'slug' => 'minds', 'label' => 'Minds', 'placeholder' => 'https://www.minds.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Minds' ), 'link' => '//www.minds.com' ), array( 'slug' => 'wattpad', 'label' => 'Wattpad', 'placeholder' => 'https://www.wattpad.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Wattpad' ), 'link' => '//www.wattpad.com' ), array( 'slug' => 'about-me', 'label' => 'about.me', 'placeholder' => 'https://about.me/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'about.me' ), 'link' => '//about.me' ), array( 'slug' => 'stitcher', 'label' => 'Stitcher', 'placeholder' => 'https://www.stitcher.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Stitcher' ), 'link' => '//www.stitcher.com' ), array( 'slug' => 'strava', 'label' => 'Strava', 'placeholder' => 'https://www.strava.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Strava' ), 'link' => '//www.strava.com' ), array( 'slug' => 'wechat', 'label' => 'WeChat', 'placeholder' => 'https://www.wechat.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'WeChat' ), 'link' => '//www.wechat.com' ), array( 'slug' => 'weibo', 'label' => 'Weibo', 'placeholder' => 'https://weibo.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Weibo' ), 'link' => '//weibo.com' ), array( 'slug' => 'untappd', 'label' => 'Untappd', 'placeholder' => 'https://untappd.com/user/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Untappd' ), 'link' => '//untappd.com' ), array( 'slug' => 'tunein', 'label' => 'TuneIn', 'placeholder' => 'https://tunein.com/radio/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'TuneIn' ), 'link' => '//tunein.com' ), array( 'slug' => 'iheart', 'label' => 'iHeart', 'placeholder' => 'https://www.iheart.com/podcast/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'iHeart' ), 'link' => '//www.iheart.com' ), array( 'slug' => 'blackberry-world', 'label' => 'BlackBerry World', 'placeholder' => 'https://appworld.blackberry.com/webstore/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'BlackBerry World' ), 'link' => '//appworld.blackberry.com/webstore/' ), array( 'slug' => 'livestream', 'label' => 'Livestream', 'placeholder' => 'https://livestream.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Livestream' ), 'link' => '//livestream.com' ), array( 'slug' => 'myspace', 'label' => 'Myspace', 'placeholder' => 'https://www.myspace.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Myspace' ), 'link' => '//www.myspace.com' ), array( 'slug' => 'qzone', 'label' => 'Qzone', 'placeholder' => 'https://qzone.qq.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Qzone' ), 'link' => '//qzone.qq.com' ), array( 'slug' => 'tiktok', 'label' => 'TikTok', 'placeholder' => 'https://www.tiktok.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'TikTok' ), 'link' => '//www.tiktok.com' ), array( 'slug' => 'likee', 'label' => 'Likee', 'placeholder' => 'https://likee.video/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Likee' ), 'link' => '//likee.video' ), array( 'slug' => 'dribbble', 'label' => 'Dribbble', 'placeholder' => 'https://dribbble.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Dribbble' ), 'link' => '//dribbble.com' ), array( 'slug' => 'parler', 'label' => 'Parler', 'placeholder' => 'https://parler.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Parler' ), 'link' => '//parler.com' ), array( 'slug' => 'actors-access', 'label' => 'Actors Access', 'placeholder' => 'https://www.actorsaccess.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Actors Access' ), 'link' => '//www.actorsaccess.com' ), array( 'slug' => 'odysee', 'label' => 'Odysee', 'placeholder' => 'https://odysee.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Odysee' ), 'link' => '//odysee.com' ), array( 'slug' => 'bitchute', 'label' => 'BitChute', 'placeholder' => 'https://www.bitchute.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'BitChute' ), 'link' => '//www.bitchute.com' ), array( 'slug' => 'flote', 'label' => 'Flote', 'placeholder' => 'https://flote.app/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Flote' ), 'link' => '//flote.app' ), array( 'slug' => 'dlive', 'label' => 'DLive', 'placeholder' => 'https://dlive.tv/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'DLive' ), 'link' => '//dlive.tv' ), array( 'slug' => 'ruqqus', 'label' => 'Ruqqus', 'placeholder' => 'https://ruqqus.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Ruqqus' ), 'link' => '//ruqqus.com' ), array( 'slug' => 'mewe', 'label' => 'MeWe', 'placeholder' => 'https://mewe.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'MeWe' ), 'link' => '//mewe.com' ), array( 'slug' => 'gitlab', 'label' => 'GitLab', 'placeholder' => 'https://gitlab.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'GitLab' ), 'link' => '//gitlab.com' ), array( 'slug' => 'koo-app', 'label' => 'Koo App', 'placeholder' => 'https://www.kooapp.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Koo App' ), 'link' => '//kooapp.com' ), array( 'slug' => 'rumble', 'label' => 'Rumble', 'placeholder' => 'https://rumble.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Rumble' ), 'link' => '//rumble.com' ), array( 'slug' => 'envato', 'label' => 'Envato', 'placeholder' => 'https://envato.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Envato' ), 'link' => '//envato.com' ), array( 'slug' => 'google-news', 'label' => 'Google News', 'placeholder' => 'https://news.google.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Google News' ), 'link' => '//news.google.com' ), array( 'slug' => 'komoot', 'label' => 'Komoot', 'placeholder' => 'https://www.komoot.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Komoot' ), 'link' => '//komoot.com' ), array( 'slug' => 'tinder', 'label' => 'Tinder', 'placeholder' => 'https://tinder.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Tinder' ), 'link' => '//tinder.com' ), array( 'slug' => 'trello', 'label' => 'Trello', 'placeholder' => 'https://trello.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Trello' ), 'link' => '//trello.com' ) ); } /** * Callback for getting a list of items * @return array (multilevel array) */ function spacexchimp_p005_get_items_additional() { $text = SPACEXCHIMP_P005_TEXT; return array( array( 'slug' => 'telephone', 'label' => 'Telephone', 'placeholder' => 'tel://1-555-555-5555', 'help' => __( 'Enter your telephone number with prefix <b>tel://</b>.', $text ), 'link' => '' ), array( 'slug' => 'email', 'label' => 'Email', 'placeholder' => 'mailto:YourUsernameHere@gmail.com', 'help' => __( 'Enter your email address with prefix <b>mailto:</b>.', $text ), 'link' => '' ), array( 'slug' => 'website', 'label' => 'Personal website', 'placeholder' => 'https://www.spacexchimp.com', 'help' => __( 'Enter the URL of your personal website.', $text ), 'link' => '' ), array( 'slug' => 'rss-feed', 'label' => 'RSS Feed', 'placeholder' => 'http://YourDomainNameHere.com/feed', 'help' => __( 'Enter the URL of your RSS feed.', $text ), 'link' => '' ), array( 'slug' => 'paypal', 'label' => 'PayPal', 'placeholder' => 'https://www.paypal.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'PayPal' ), 'link' => '//paypal.com' ), array( 'slug' => 'ko-fi', 'label' => 'Ko-fi', 'placeholder' => 'https://ko-fi.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Ko-fi' ), 'link' => '//ko-fi.com' ), array( 'slug' => 'skype', 'label' => 'Skype', 'placeholder' => 'skype:YourUsernameHere?call', 'help' => __( 'Enter your Skype name with prefix <b>skype:</b> and suffix <b>?call</b>, or <b>?add</b>, or <b>?chat</b>, or <b>?userinfo</b> for view profile.', $text ), 'link' => '//www.skype.com' ), array( 'slug' => 'zoom', 'label' => 'Zoom', 'placeholder' => 'https://zoom.us/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Zoom' ), 'link' => '//zoom.us' ), array( 'slug' => 'signal', 'label' => 'Signal', 'placeholder' => 'https://signal.org/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Signal' ), 'link' => '//signal.org' ), array( 'slug' => 'dropbox', 'label' => 'Dropbox', 'placeholder' => 'https://www.dropbox.com/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'Dropbox' ), 'link' => '//dropbox.com' ), array( 'slug' => 'xmpp', 'label' => 'XMPP', 'placeholder' => 'https://xmpp.org/YourUsernameHere', 'help' => sprintf( __( 'Enter the URL of your profile page on %s. The URL must contain the protocol identifier (<b>http://</b> or <b>https://</b>).', $text ), 'XMPP' ), 'link' => '//xmpp.org' ) ); }