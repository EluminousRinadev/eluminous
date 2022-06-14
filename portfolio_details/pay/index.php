<?php
$pagename = "portfolio";
$pagename1 = "";
require_once '../../includes/head.php';
?>
<!-- inner_banner -->
<section class="inner_banner">
	<img src="<?php echo SITE_URL;?>images/portfolios/portfolio_banner_details.jpg" alt="main_banner_bg" class="img-fluid">
	<div class="inner_page_title">
		<div class="container">
			<h1>Pay <small></small></h1>
			<!-- <a href="#contact" class="blue_big_btn blue_big_btn_scrool">Let's Grow Together</a> -->
		</div>
	</div>
</section>
<section id="protfolio_slider_details">
	<div class="container-fluid">
		<div class="row justify-content-between">
			
			<div class="col-md-7">
				<div id="photo-slider">
					<div class="">
						<div class="item">
							<img src="<?php echo SITE_URL;?>/portfolio_details/flashcards/flashcards.jpg" alt="image"  draggable="false"/ class="img-fluid">
						</div>
						
					</div>
				</div>
				
				
			</div>
			<div class="col-md-5 gray_bg d-flex align-items-center ">
				<div class="project_details align-self-center">
					<h2>Project description</h2>
					<h6>Description:<br>
					<small>
					<b>Business problem:</b> Payment gateway had points as its currency. Purchasing articles/services from mobile applications using these points as currency was not possible. It was limited only to the website.
					</small>
					<small>
					<b>Solution in brief:</b>  Developed an integration SDK bundle (Library) which can be used by Android app developer to make use of this points related payment gateway in the developed app itself.
					</small>
					</h6>
					
					<h6>Skills:</h6>
					<div class="tech_use_port">
						<div class="tect_wrapper">
							<object data="<?php echo SITE_URL;?>images/portfolios/android.svg" type=""></object>
							<p>Android</p>
						</div>
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