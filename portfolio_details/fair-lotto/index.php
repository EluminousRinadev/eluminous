<?php 
$pagename = "portfolio";
$pagename1 = "";

$pageTitle = "Fair Lotto";// Default Page title
$metaDesc = "A play lotto multilingual website, where users register and play lotto. ";// Default metaDesc
$keywords = "Fair Lotto";// Default 

require_once '../../includes/head.php';
?>
<!-- inner_banner -->
<section class="inner_banner">
	<img src="<?php echo SITE_URL;?>images/portfolios/portfolio_banner_details.jpg" alt="main_banner_bg" class="img-fluid">
	<div class="inner_page_title">
		<div class="container">
			<h1>Fair Lotto <small></small></h1>
			<!-- <a href="#contact" class="blue_big_btn blue_big_btn_scrool">Let's Grow Together</a> -->
		</div>
	</div>
</section>
<section id="protfolio_slider_details">
	<div class="container-fluid">
		<div class="row justify-content-between">
			
			<div class="col-md-7">
				<div id="photo-slider">
					<div class="slider-for">
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto1.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto2.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto3.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto4.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div> 
						
					</div>
					<div class="slider-nav">
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto1.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto2.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto3.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/fair-lotto/fair-lotto4.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						 
					</div>
				</div>
				
				
			</div>
			<div class="col-md-5 gray_bg d-flex align-items-center ">
				<div class="project_details align-self-center">
					<h2>Project description</h2>					
					<h6>Description:<br>
					<small>A play lotto multilingual website, where users register and play lotto. Users login to the website to play lotto.</small>
                         <small>Lotto 6 in 36 option and Super 7 option are available for users to select their numbers. Winning numbers will be updated /decided at the end of each week.</small>
					</h6>
					<h6>Skills:</h6>
					<div class="tech_use_port">
						<div class="tect_wrapper">
							<object data="<?php echo SITE_URL;?>images/portfolios/joomla.svg" type=""></object>
							<p>Joomla</p>
						</div>
						<div class="tect_wrapper">
							<object data="<?php echo SITE_URL;?>images/portfolios/css.svg" type=""></object>
							<p>CSS3</p>
						</div>
						<div class="tect_wrapper">
							<object data="<?php echo SITE_URL;?>images/portfolios/html5.svg" type=""></object>
							<p>HTML5</p>
						</div>
                              <div class="tect_wrapper">
							<object data="<?php echo SITE_URL;?>images/portfolios/responsive.svg" type=""></object>
							<p>Responsive</p>
						</div>
						
					</div>

					<div class="scrool_expertise text-left">
						<a href="http://fair-lotto.org/index.php?lang=en" target="_blank" class="small_blue_btn blue_big_btn_scrool">Launch website</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div class="portfolio-nav">
	<a href="<?php echo SITE_URL;?>#" rel="next">
		<i class="fa fa-angle-left"></i>
	</a>
	<a href="<?php echo SITE_URL;?>portfolio" class="close-portfolio external">
		<i class="fa fa-th"></i>
	</a>
	<a href="<?php echo SITE_URL;?>#" rel="prev">
		<i class="fa fa-angle-right"></i>
	</a>
</div>
<section class="gray_bg">
	<div class="container">

		<?php require_once '../../includes/portfolio.php';?>
	</div>
</section>
<?php require_once '../../includes/main_contact.php';?>
<?php require_once '../../includes/footer.php';?>
<?php //require_once 'includes/free_quote.php';?>