<?php
ob_start();
?>


<!-- This is for sweet alert  -->

<script src="dist/sweetalert-dev.js"></script>
<script src="js/jquery.min.js"></script>

<link rel="stylesheet" href="dist/sweetalert.css">
<link href="css/sticky-popup.css" rel="stylesheet">
<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">



<?php

include("class.phpmailer.php");

require_once('mail_functions.php');

$strThankYoumsg_1	=	$strThankYoumsg_2	=	'';

$strThankYoumsg		=	'Thank you for your time in scheduling the appointment. We acknowledge the schedule of the meeting. Let us explore the synergies and how we can help each other to build a stronger organizations. Look forward to meeting you in Moscone Center, San Francisco, California-United States of America.';

$adminMail			=   'priyank_purohit@eluminoustechnologies.com';
$adminMail_1		=     'eluminous_bde7@eluminoustechnologies.com';
//$adminMail_2		=	  'eluminous_bde4@eluminoustechnologies.com'; //'hrushikeshw@gmail.com' ;
$AdminfromName		=	'Admin';
$adminMailsubject	=	'Received new enquiry';
$CustmorMailsubject	=	'Thanks for reaching out : eLuminous Technologies Pvt. Ltd.';
$AdminMailbody		=	$customerMailBody	=	'';
//------------------------------------STARTS---GET IN TOUCH---------------------------------
if(isset($_REQUEST['get_btn']) && ($_REQUEST['get_btn']!="")){
	$strGetYourName = trim($_REQUEST['strGetYourName']);
	$strGetYourEmail	=	 trim($_REQUEST['strGetYourEmail']);
	$strGetYourSubject	=	 trim($_REQUEST['strGetYourSubject']);
	$getintoucharea	=	 trim($_REQUEST['getintoucharea']);
	$strAdminMailSubject	=	"Get In Touch Enquiry || ".$strGetYourSubject;
	$strAdminMailBody		=	'<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #08293D;">
  <tr>
    <td  ><a  href="http://eluminoustechnologies.com/"><img src="http://eluminoustechnologies.com/mobile-world-congress-2017/img/eluminous-admin-logo-indiasoft.png"  alt="logo" border="0" style="display:block;width:600px;height:125px;" /></a></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/shadow_header.png" width="515" height="19" alt="shadow" style="display:block;" /></td>
  </tr>
  <tr>
    <td style="padding:20px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; line-height:21px;"><table rules="all" style="border:1px solid #cccccc;" cellpadding="5" width="100%">
         <tr style="background: #f4f4f4;">
          <td><strong>Name: </strong></td>
          <td>' . strip_tags($strGetYourName) . '</td>
        </tr>
        <tr style="background: #f4f4f4;">
          <td><strong>Email id</strong>:</td>
          <td>'. strip_tags($strGetYourEmail) .'</td>
        </tr>
        <tr style="background: #f4f4f4;">
          <td><strong>Subject:</strong></td>
          <td>'. strip_tags($strGetYourSubject) .'</td>
        </tr>
		<tr style="background: #f4f4f4;">
          <td><strong>Message:</strong></td>
          <td>'. strip_tags($getintoucharea) .'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/divider.png" width="584" height="18" alt="border" style="display:block; margin:10px 0;" /></td>
  </tr>
</table>';
   // $isSend	=	sendmail("eluminous_se38@eluminoustechnologies.com", $strGetYourEmail,	$strAdminMailSubject, $strAdminMailBody, $strGetYourName);
	// Admin Mail
	$isSend	=	sendmail($adminMail, $strGetYourEmail,	$strAdminMailSubject, $strAdminMailBody, $strGetYourName);
	$isSend	=	sendmail($adminMail_1, $strGetYourEmail,	$strAdminMailSubject, $strAdminMailBody, $strGetYourName);
	//$isSend	=	sendmail($adminMail_2, $strGetYourEmail,	$strAdminMailSubject, $strAdminMailBody, $strGetYourName);
	// User Mail
	$strUserMailSubject	=	'Thanks for reaching out : eLuminous Technologies Pvt. Ltd.';
	$strUserMailBody	=	'<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #08293D;">
 <tr>
    <td  ><a  href="http://eluminoustechnologies.com/"><img src="http://eluminoustechnologies.com/mobile-world-congress-2017/img/eluminous-admin-logo-indiasoft.png"  alt="logo" border="0" style="display:block;width:600px;height:125px;" /></a></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/shadow_header.png" width="515" height="19" alt="shadow" style="display:block;" /></td>
  </tr>
  <tr>
    <td style="padding:10px 20px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; line-height:21px;"><strong style="font-size:13px;">Dear '.strip_tags($strGetYourName).',</strong><br>
      <p style="padding-top:10px; margin:0;">Thanks for taking the time to check out our site, and showing your interest!</p>
      <p style="padding-top:10px; margin:0;">One of our experts will contact you soon to talk about your potential fit with the service offering. Can you confirm the preferred time for calling you? Also, it will be great if you can let us know a bit about your requirements to make the conversation easier.</p>
      <p style="padding-top:10px; margin:0;">Look forward to your mail !</p>
      
     </td>
  </tr>
 
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/divider.png" width="584" height="18" alt="border" style="display:block; margin:10px 0;" /></td>
  </tr>
</table>';

     //$isSend	=	sendmail($strGetYourEmail, "eluminous_se38@eluminoustechnologies.com",	$strUserMailSubject, $strUserMailBody, 'eLuminous Technologies');
	$isSend	=	sendmail($strGetYourEmail, $adminMail_1,	$strUserMailSubject, $strUserMailBody, 'eLuminous Technologies');
	?>
<script type="text/javascript"> 
            $(document).ready(function(){
                 swal("Thank you!", "Thank you for contact with us. One of our experts will contact you soon for further discussion.", "success");
			});
           
        </script>
<?php
    unset($_POST['strGetYourName']);
    unset($_POST['strGetYourEmail']);
	unset($_REQUEST['strGetYourSubject']);
	unset($_REQUEST['getintoucharea']);
}
//------------------------------------ENDS-----GET IN TOUCH---------------------------------------

//--------------------------Request Form Functionality Starts-------------------------------------------------------

if(isset($_REQUEST['btn_request_callback']) && ($_REQUEST['btn_request_callback']!='')){
	$your_name_1			=	trim($_REQUEST['your_name_1']) ? trim($_REQUEST['your_name_1']) : '' ;
    $your_company_1	=	trim($_REQUEST['your_company_1']) ? trim($_REQUEST['your_company_1']) : '' ;
    $your_email_address_1			=	trim($_REQUEST['your_email_address_1']) ? trim($_REQUEST['your_email_address_1']) : '' ;
	$phone_1			=	trim($_REQUEST['phone_1']) ? trim($_REQUEST['phone_1']) : '' ;
	$Preferred_Time	=		trim($_REQUEST['Preferred_Time']) ? trim($_REQUEST['Preferred_Time']) : '' ;
	//$Preferred_Date	=		trim($_REQUEST['Preferred_Date']) ? trim($_REQUEST['Preferred_Date']) : '' ;
	$agenda	=		trim($_REQUEST['agenda']) ? trim($_REQUEST['agenda']) : '' ;
	
	
	
    

//-----------------Add user to mailchimp list start----------------------

  require_once 'MCAPI.class.php';



  $apikey = 'cd3fd2e7e4d879f3a4cddf90de30dd7d-us14';//'aead6c3d89c238208f6928a2e34f34cb-us13';

  $listId = '3bf3adc75e';//'f5f8296e9d'; 

  $apiUrl = 'http://api.mailchimp.com/1.3/';

   

  // create a new api object

  $api = new MCAPI($apikey);

   

  // set $merge_vars to null if you have only one input

  $merge_vars = null;

  $merge_vars = array('FNAME'=>$strName);

   

  if($email !== '') {

   

    $return_value = $api->listSubscribe( $listId, $strEmailAddress, $merge_vars, 'html', false, false, true, true );

  

    // check for error code

    if ($api->errorCode){

    //echo "<p>Error: $api->errorCode, $api->errorMessage</p>";

    } 

  }

//-----------------Add user to mailchimp list end----------------------



    $mail_from			=	$strEmailAddress;
 
	$adminMailsubject	=	'Mobile World Congress 2017-Meeting Appointment';

   $AdminMailbody		=	'<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #08293D;">
  <tr>
    <td  ><a  href="http://eluminoustechnologies.com/"><img src="http://eluminoustechnologies.com/mobile-world-congress-2017/img/eluminous-admin-logo-indiasoft.png"  alt="logo" border="0" style="display:block;width:600px;height:125px;" /></a></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/shadow_header.png" width="515" height="19" alt="shadow" style="display:block;" /></td>
  </tr>
  <tr>
    <td style="padding:20px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; line-height:21px;"><table rules="all" style="border:1px solid #cccccc;" cellpadding="5" width="100%">
         <tr style="background: #f4f4f4;">
          <td><strong>Name: </strong></td>
          <td>' . strip_tags($your_name_1) . '</td>
        </tr>
        <tr style="background: #f4f4f4;">
          <td><strong>Company</strong>:</td>
          <td>'. strip_tags($your_company_1) .'</td>
        </tr>
        <tr style="background: #f4f4f4;">
          <td><strong>Email:</strong></td>
          <td>'. strip_tags($your_email_address_1) .'</td>
        </tr>
		<tr style="background: #f4f4f4;">
          <td><strong>Phone:</strong></td>
          <td>'. strip_tags($phone_1) .'</td>
        </tr>
		<tr style="background: #f4f4f4;">
          <td><strong>Preferred Date & Time:</strong></td>
          <td>'. strip_tags($Preferred_Time) .'</td>
        </tr>
		<tr style="background: #f4f4f4;">
          <td><strong>Agenda:</strong></td>
          <td>'. strip_tags($agenda).'</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/divider.png" width="584" height="18" alt="border" style="display:block; margin:10px 0;" /></td>
  </tr>
</table>

';
    
   //sendmail('eluminous_se38@eluminoustechnologies.com',	$your_email_address_1,	$adminMailsubject, $AdminMailbody, $your_name_1);
	$isSend	=	sendmail($adminMail,	$your_email_address_1,	$adminMailsubject, $AdminMailbody, $your_name_1);
	$isSend	=	sendmail($adminMail_1,	$your_email_address_1,	$adminMailsubject, $AdminMailbody, $your_name_1);
	$isSend	=	sendmail($adminMail_2,	$your_email_address_1,	$adminMailsubject, $AdminMailbody, $your_name_1);

	

	if($isSend){

		$strThankYoumsg_1	=	$strThankYoumsg;

	}

	// Custome Mail

		$strUserMailSubject	=	'Thank you !! eluminous Technologies';
	$strUserMailBody	=	'<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border:1px solid #08293D;">
 <tr>
    <td  ><a  href="http://eluminoustechnologies.com/"><img src="http://eluminoustechnologies.com/mobile-world-congress-2017/img/eluminous-admin-logo-indiasoft.png"  alt="logo" border="0" style="display:block;width:600px;height:125px;" /></a></td>
  </tr>
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/shadow_header.png" width="515" height="19" alt="shadow" style="display:block;" /></td>
  </tr>
  <tr>
    <td style="padding:10px 20px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#000; line-height:21px;"><strong style="font-size:13px;">Dear '.strip_tags($your_name_1).',</strong><br>
      <p style="padding-top:10px; margin:0;">Thank you for your time in scheduling the appointment. We acknowledge the schedule of the meeting. Let us explore the synergies and how we can help each other to build a stronger organizations.</p>
      <p style="padding-top:10px; margin:0;">Look forward to meeting you in Moscone Center, San Francisco, California-United States of America.</p>
      <p style="padding-top:10px; margin:0;"> Regards,<br />
Priyank Purohit.</p>
      
     </td>
  </tr>
 
  <tr>
    <td valign="top" align="center"><img src="http://eluminoustechnologies.com/outsourcing/img/divider.png" width="584" height="18" alt="border" style="display:block; margin:10px 0;" /></td>
  </tr>
</table>';

     // $isSend	=	sendmail($your_email_address_1, 'eluminous_se38@eluminoustechnologies.com',	$strUserMailSubject, $strUserMailBody, 'eLuminous Technologies');
	$isSend	=	sendmail($your_email_address_1, $adminMail_1,	$strUserMailSubject, $strUserMailBody, 'eLuminous Technologies');
	

        ?>
<script type="text/javascript"> 

            $(document).ready(function(){

                 //swal("Thank you!", "Thank you for sharing your details. Our Sales Team will soon connect with you for further discussion.", "success");

				 window.location.href = 'http://eluminoustechnologies.com/thankyou/';

                 /*setTimeout(function(){

                    //window.location.href = 'http://eluminousdev.com/mobile-app-development/';

                    window.location.href = 'http://eluminoustechnologies.com/thankyou/';

                 }, 1000);*/

            });

           

        </script>
<?php

        unset($_POST['your_name_1']);

        unset($_POST['your_email_address_1']);

		unset($_REQUEST['phone_1']);

		//unset($_REQUEST['country_1']);

		unset($_REQUEST['brief_requirement_1']);

       ?>
<?php

}


?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="eLuminous Is Best Web & Mobile Apps Development Outsourcing Company Focusing On Creative, Value Added Solution, Amazing User-Experience To Enhance Your ROI.">
<meta name="keywords" itemprop="keywords" content="web development,mobile apps development,outsource web development,mobile app developer,outsource mobile app development" />
<meta name="author" content="">
<title>Mobile World Congress 2017 - eLuminous Technologes</title>
<link rel="icon" href="favicon.ico">

<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->

<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->

<link href="css/style.css" rel="stylesheet">

<!-- Custom Fonts -->

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<!--Google Analytics Code:-->

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-85705817-1', 'auto');

  ga('send', 'pageview');



</script>
<script type="text/javascript">

setTimeout(function(){var a=document.createElement("script");

var b=document.getElementsByTagName("script")[0];

a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0056/8882.js?"+Math.floor(new Date().getTime()/3600000);

a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);

</script>
</head>

<body id="page-top" class="index">

<!-- Navigation -->

<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container"> 
    
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="http://eluminoustechnologies.com/" target="_blank"><img src="img/logo.png" alt="eluminous logo"></a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="telwrap"><span class="call">Toll Free: USA : </span> <a href="tel:02030564373">+1 646 688 3509</a>
        <div class="skype"><img src="./img/skype1.png"><a href="skype:eluminoustechnologies">eluminoustechnologies</a></div>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden"> <a href="#page-top"></a> </li>
        <li class="page-scroll"> <a href="#whyus">Why Choose Us</a> </li>
        <li class="page-scroll"><a href="#venus">Services</a></li>
        <li class="page-scroll"> <a href="#portfolio">Portfolio</a> </li>
        <li class="page-scroll"> <a href="#jupiter">The Team</a> </li>
      </ul>
    </div>
    
    <!-- /.navbar-collapse --> 
    
  </div>
  
  <!-- /.container-fluid --> 
  
</nav>

<!-- Header -->

<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="intro-text"> <span class="skills">We are participating in the</span> <b><span class="mainText">Mobile World Congress 2017</span></b> <span class="skills">Meet us on September 12th to September 14th</span> <span class="skills">Moscone Center, San Francisco, California-United States of America</span> <span class="highlight skills2">Interested?</span> <span class="page-scroll"><a class="btn btn-primary" href="#themainform">Please Click Here</a></span> </div>
      </div>
    </div>
  </div>
</header>

<!-- why choose us Grid Section -->

<section id="mercury">
  <div class="container">    
    <div class="col-md-6 thelrfrm pull-right">
      <div id="themainform" class="theform">
        <div class="frmhead">
          <h2>Schedule your meeting in advance</h2>
        </div>
        <p class="frmheading"><b>You are Just 60 seconds away from your Desire !</b></p>
        <p>Book your slot Now</p>
        <form action="" method="post" name="request_callback" id="frmSchedule">
          <fieldset>
            <div class="form-group"> <span>
              <input  class="form-control" required type="text" placeholder="Name*" size="40" value="" name="your_name_1">
              </span> </div>
            <div class="form-group"> <span>
              <input  class="form-control" required type="text" placeholder="Company*" size="40" value="" name="your_company_1">
              </span> </div>
            <div class="form-group"> <span>
              <input class="form-control" required type="email" placeholder="Email*" size="40" value="" name="your_email_address_1">
              </span> </div>
            <div class="form-group"> <span> 
              
              <!--<input class="form-control" required type="text" placeholder="Country" size="40" value="" name="country_1">			--> 
              
              <!--	<select required name="country_1" required class="form-control" >

										<option value="">Select Country</option>

										<option value="">Select Country</option>

										<option value="Afganistan">Afghanistan</option>

										<option value="Albania">Albania</option>

										<option value="Algeria">Algeria</option>

										<option value="American Samoa">American Samoa</option>

										<option value="Andorra">Andorra</option>

										<option value="Angola">Angola</option>

										<option value="Anguilla">Anguilla</option>

										<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>

										<option value="Argentina">Argentina</option>

										<option value="Armenia">Armenia</option>

										<option value="Aruba">Aruba</option>

										<option value="Australia">Australia</option>

										<option value="Austria">Austria</option>

										<option value="Azerbaijan">Azerbaijan</option>

										<option value="Bahamas">Bahamas</option>

										<option value="Bahrain">Bahrain</option>

										<option value="Bangladesh">Bangladesh</option>

										<option value="Barbados">Barbados</option>

										<option value="Belarus">Belarus</option>

										<option value="Belgium">Belgium</option>

										<option value="Belize">Belize</option>

										<option value="Benin">Benin</option>

										<option value="Bermuda">Bermuda</option>

										<option value="Bhutan">Bhutan</option>

										<option value="Bolivia">Bolivia</option>

										<option value="Bonaire">Bonaire</option>

										<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>

										<option value="Botswana">Botswana</option>

										<option value="Brazil">Brazil</option>

										<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>

										<option value="Brunei">Brunei</option>

										<option value="Bulgaria">Bulgaria</option>

										<option value="Burkina Faso">Burkina Faso</option>

										<option value="Burundi">Burundi</option>

										<option value="Cambodia">Cambodia</option>

										<option value="Cameroon">Cameroon</option>

										<option value="Canada">Canada</option>

										<option value="Canary Islands">Canary Islands</option>

										<option value="Cape Verde">Cape Verde</option>

										<option value="Cayman Islands">Cayman Islands</option>

										<option value="Central African Republic">Central African Republic</option>

										<option value="Chad">Chad</option>

										<option value="Channel Islands">Channel Islands</option>

										<option value="Chile">Chile</option>

										<option value="China">China</option>

										<option value="Christmas Island">Christmas Island</option>

										<option value="Cocos Island">Cocos Island</option>

										<option value="Colombia">Colombia</option>

										<option value="Comoros">Comoros</option>

										<option value="Congo">Congo</option>

										<option value="Cook Islands">Cook Islands</option>

										<option value="Costa Rica">Costa Rica</option>

										<option value="Cote DIvoire">Cote D'Ivoire</option>

										<option value="Croatia">Croatia</option>

										<option value="Cuba">Cuba</option>

										<option value="Curaco">Curacao</option>

										<option value="Cyprus">Cyprus</option>

										<option value="Czech Republic">Czech Republic</option>

										<option value="Denmark">Denmark</option>

										<option value="Djibouti">Djibouti</option>

										<option value="Dominica">Dominica</option>

										<option value="Dominican Republic">Dominican Republic</option>

										<option value="East Timor">East Timor</option>

										<option value="Ecuador">Ecuador</option>

										<option value="Egypt">Egypt</option>

										<option value="El Salvador">El Salvador</option>

										<option value="Equatorial Guinea">Equatorial Guinea</option>

										<option value="Eritrea">Eritrea</option>

										<option value="Estonia">Estonia</option>

										<option value="Ethiopia">Ethiopia</option>

										<option value="Falkland Islands">Falkland Islands</option>

										<option value="Faroe Islands">Faroe Islands</option>

										<option value="Fiji">Fiji</option>

										<option value="Finland">Finland</option>

										<option value="France">France</option>

										<option value="French Guiana">French Guiana</option>

										<option value="French Polynesia">French Polynesia</option>

										<option value="French Southern Ter">French Southern Ter</option>

										<option value="Gabon">Gabon</option>

										<option value="Gambia">Gambia</option>

										<option value="Georgia">Georgia</option>

										<option value="Germany">Germany</option>

										<option value="Ghana">Ghana</option>

										<option value="Gibraltar">Gibraltar</option>

										<option value="Great Britain">Great Britain</option>

										<option value="Greece">Greece</option>

										<option value="Greenland">Greenland</option>

										<option value="Grenada">Grenada</option>

										<option value="Guadeloupe">Guadeloupe</option>

										<option value="Guam">Guam</option>

										<option value="Guatemala">Guatemala</option>

										<option value="Guinea">Guinea</option>

										<option value="Guyana">Guyana</option>

										<option value="Haiti">Haiti</option>

										<option value="Hawaii">Hawaii</option>

										<option value="Honduras">Honduras</option>

										<option value="Hong Kong">Hong Kong</option>

										<option value="Hungary">Hungary</option>

										<option value="Iceland">Iceland</option>

										<option value="India">India</option>

										<option value="Indonesia">Indonesia</option>

										<option value="Iran">Iran</option>

										<option value="Iraq">Iraq</option>

										<option value="Ireland">Ireland</option>

										<option value="Isle of Man">Isle of Man</option>

										<option value="Israel">Israel</option>

										<option value="Italy">Italy</option>

										<option value="Jamaica">Jamaica</option>

										<option value="Japan">Japan</option>

										<option value="Jordan">Jordan</option>

										<option value="Kazakhstan">Kazakhstan</option>

										<option value="Kenya">Kenya</option>

										<option value="Kiribati">Kiribati</option>

										<option value="Korea North">Korea North</option>

										<option value="Korea Sout">Korea South</option>

										<option value="Kuwait">Kuwait</option>

										<option value="Kyrgyzstan">Kyrgyzstan</option>

										<option value="Laos">Laos</option>

										<option value="Latvia">Latvia</option>

										<option value="Lebanon">Lebanon</option>

										<option value="Lesotho">Lesotho</option>

										<option value="Liberia">Liberia</option>

										<option value="Libya">Libya</option>

										<option value="Liechtenstein">Liechtenstein</option>

										<option value="Lithuania">Lithuania</option>

										<option value="Luxembourg">Luxembourg</option>

										<option value="Macau">Macau</option>

										<option value="Macedonia">Macedonia</option>

										<option value="Madagascar">Madagascar</option>

										<option value="Malaysia">Malaysia</option>

										<option value="Malawi">Malawi</option>

										<option value="Maldives">Maldives</option>

										<option value="Mali">Mali</option>

										<option value="Malta">Malta</option>

										<option value="Marshall Islands">Marshall Islands</option>

										<option value="Martinique">Martinique</option>

										<option value="Mauritania">Mauritania</option>

										<option value="Mauritius">Mauritius</option>

										<option value="Mayotte">Mayotte</option>

										<option value="Mexico">Mexico</option>

										<option value="Midway Islands">Midway Islands</option>

										<option value="Moldova">Moldova</option>

										<option value="Monaco">Monaco</option>

										<option value="Mongolia">Mongolia</option>

										<option value="Montserrat">Montserrat</option>

										<option value="Morocco">Morocco</option>

										<option value="Mozambique">Mozambique</option>

										<option value="Myanmar">Myanmar</option>

										<option value="Nambia">Nambia</option>

										<option value="Nauru">Nauru</option>

										<option value="Nepal">Nepal</option>

										<option value="Netherland Antilles">Netherland Antilles</option>

										<option value="Netherlands">Netherlands (Holland, Europe)</option>

										<option value="Nevis">Nevis</option>

										<option value="New Caledonia">New Caledonia</option>

										<option value="New Zealand">New Zealand</option>

										<option value="Nicaragua">Nicaragua</option>

										<option value="Niger">Niger</option>

										<option value="Nigeria">Nigeria</option>

										<option value="Niue">Niue</option>

										<option value="Norfolk Island">Norfolk Island</option>

										<option value="Norway">Norway</option>

										<option value="Oman">Oman</option>

										<option value="Pakistan">Pakistan</option>

										<option value="Palau Island">Palau Island</option>

										<option value="Palestine">Palestine</option>

										<option value="Panama">Panama</option>

										<option value="Papua New Guinea">Papua New Guinea</option>

										<option value="Paraguay">Paraguay</option>

										<option value="Peru">Peru</option>

										<option value="Phillipines">Philippines</option>

										<option value="Pitcairn Island">Pitcairn Island</option>

										<option value="Poland">Poland</option>

										<option value="Portugal">Portugal</option>

										<option value="Puerto Rico">Puerto Rico</option>

										<option value="Qatar">Qatar</option>

										<option value="Republic of Montenegro">Republic of Montenegro</option>

										<option value="Republic of Serbia">Republic of Serbia</option>

										<option value="Reunion">Reunion</option>

										<option value="Romania">Romania</option>

										<option value="Russia">Russia</option>

										<option value="Rwanda">Rwanda</option>

										<option value="St Barthelemy">St Barthelemy</option>

										<option value="St Eustatius">St Eustatius</option>

										<option value="St Helena">St Helena</option>

										<option value="St Kitts-Nevis">St Kitts-Nevis</option>

										<option value="St Lucia">St Lucia</option>

										<option value="St Maarten">St Maarten</option>

										<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>

										<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>

										<option value="Saipan">Saipan</option>

										<option value="Samoa">Samoa</option>

										<option value="Samoa American">Samoa American</option>

										<option value="San Marino">San Marino</option>

										<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>

										<option value="Saudi Arabia">Saudi Arabia</option>

										<option value="Senegal">Senegal</option>

										<option value="Serbia">Serbia</option>

										<option value="Seychelles">Seychelles</option>

										<option value="Sierra Leone">Sierra Leone</option>

										<option value="Singapore">Singapore</option>

										<option value="Slovakia">Slovakia</option>

										<option value="Slovenia">Slovenia</option>

										<option value="Solomon Islands">Solomon Islands</option>

										<option value="Somalia">Somalia</option>

										<option value="South Africa">South Africa</option>

										<option value="Spain">Spain</option>

										<option value="Sri Lanka">Sri Lanka</option>

										<option value="Sudan">Sudan</option>

										<option value="Suriname">Suriname</option>

										<option value="Swaziland">Swaziland</option>

										<option value="Sweden">Sweden</option>

										<option value="Switzerland">Switzerland</option>

										<option value="Syria">Syria</option>

										<option value="Tahiti">Tahiti</option>

										<option value="Taiwan">Taiwan</option>

										<option value="Tajikistan">Tajikistan</option>

										<option value="Tanzania">Tanzania</option>

										<option value="Thailand">Thailand</option>

										<option value="Togo">Togo</option>

										<option value="Tokelau">Tokelau</option>

										<option value="Tonga">Tonga</option>

										<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>

										<option value="Tunisia">Tunisia</option>

										<option value="Turkey">Turkey</option>

										<option value="Turkmenistan">Turkmenistan</option>

										<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>

										<option value="Tuvalu">Tuvalu</option>

										<option value="Uganda">Uganda</option>

										<option value="Ukraine">Ukraine</option>

										<option value="United Arab Erimates">United Arab Emirates</option>

										<option value="United Kingdom">United Kingdom</option>

										<option value="United States of America">United States of America</option>

										<option value="Uraguay">Uruguay</option>

										<option value="Uzbekistan">Uzbekistan</option>

										<option value="Vanuatu">Vanuatu</option>

										<option value="Vatican City State">Vatican City State</option>

										<option value="Venezuela">Venezuela</option>

										<option value="Vietnam">Vietnam</option>

										<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>

										<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>

										<option value="Wake Island">Wake Island</option>

										<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>

										<option value="Yemen">Yemen</option>

										<option value="Zaire">Zaire</option>

										<option value="Zambia">Zambia</option>

										<option value="Zimbabwe">Zimbabwe</option>

										</select>--> 
              
              </span> </div>
            <div class="form-group"> <span>
              <input class="form-control" type="text" placeholder="Contact Number" size="40" value="" name="phone_1">
              </span> </div>
            <div class="form-group"> 
			  <span>
              	<div class='input-group date' id='datetimepicker1'>
                    <!--<input class="form-control" required type="text" placeholder="Preferred Time" size="40" value="" name="Preferred_Time">-->
                    <input type='text' class="form-control" placeholder="Preferred Time" size="40" value="" name="Preferred_Time" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </span> 
            </div>
            <!--<div class="form-group"> <span>
              <input class="form-control" required type="text" placeholder="Preferred Date" size="40" value="" name="Preferred_Date">
              </span> </div>-->
            <div class="form-group"> <span>
              <input class="form-control" type="text" placeholder="Agenda" size="40" value="" name="agenda">
              </span> </div>
            
            <!-- <div class="form-group">

                                	<span><textarea class="form-control" placeholder="Brief Requirements" rows="10" cols="40" name="brief_requirement_1"></textarea></span>

                                </div>-->
            
            <input class="btn btn-primary submit-btn" type="submit" value="Submit" name="btn_request_callback">
          </fieldset>
        </form>
      </div>
    </div>
    <div class="col-md-6 thelist">
      <div class="row">
        <div class="col-sm-12 mrbot50"> <img src="img/devlopment-icon.png" alt="web development icon" width="450" class="webappIcon"></div>
        <div class="col-sm-12">
          <h2>We create value to our clients through</h2>
          <ul class="poiul mrbot30">
            <li>Customized solution that are best-fit for you.</li>
            <li>Commercially successful applications.</li>
            <li>Guaranteed on-time delivery.</li>
            <li>Committed 24/7 support.</li>
            <li>Innovative solutions as per your industry standards.</li>
            <li>Transparent Business Approach.</li>
            <li>Goal oriented & target driven.</li>
            <li>Creates a brand & recognition.</li>
            <li>Forms Engaged Customer Community.</li>
            <li>Fundamentals to Skyrocket your revenues.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="whyus">
  <div class="container">
    <h2 class="text-center">Why choose eLuminous?</h2>
    <div class="row mrbot50"> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box greenbox">
          <div class="img-container green">2000+</div>
          <h5>Websites / Web portals developed &amp; launched</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box bluebox">
          <div class="img-container blue">500+</div>
          <h5>Ecommerce websites developed &amp; launched</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box greenbox">
          <div class="img-container green">100+</div>
          <h5>Mobile Apps developed and launched</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
    </div>
    <div class="row mrbot50"> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box bluebox">
          <div class="img-container blue">14+</div>
          <h5>Years of successful Industry experience</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box greenbox">
          <div class="img-container green">30+</div>
          <h5>Industry segments served successfully </h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box bluebox">
          <div class="img-container blue">200+</div>
          <h5>Strong base of Certified Development Professionals</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
    </div>
    <div class="row"> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box greenbox">
          <div class="img-container green">L - 5<!--<i class="fa fa-trophy" style=" font-size: 60px; margin: 24px 0 0;

}"></i>--></div>
          <h5>Addherence to CMMI Level-5</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box bluebox">
          <div class="img-container blue"><i class="fa fa-star" style=" font-size: 60px; margin: 24px 0 0;

}"></i></i></div>
          <h5>Recognized by Apple in the ‘Best of 2014’ List.</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
      <!-- .grid_4 start -->
      
      <article class="col-md-4">
        <div class="process-box greenbox">
          <div class="img-container green">70%</div>
          <h5>Bussiness from recurring clients</h5>
        </div>
      </article>
      
      <!-- .GRID_4 END --> 
      
    </div>
  </div>
</section>
<section id="venus">
  <div class="container">
    <h2 class="text-center">Our Services</h2>
    <h3 class="text-center highlight">Business Intelligence Services</h3>
    <hr class="star-primary">
    <div class="col-md-3 exblock">
      <p><img src="icon/qlik-logo-2x.png"></p>
    </div>
    <div class="col-md-3 exblock">
      <p><img src="icon/Pentaho.png"></p>
    </div>
    <div class="col-md-3 exblock">
      <p><img src="icon/microsoft-bi.png"></p>
    </div>
    <div class="col-md-3 exblock">
      <p><img src="icon/tableau1.png"></p>
    </div>
    <div>
      <h3  class="text-center highlight space_line">Internet of Things</h3>
      <hr class="star-primary">
      <div class="row mrtop30">
        <div class="col-md-4 exblock">
          <h2>DOMAIN EXPERTS</h2>
          <p>We have core domain experts who are having more than 20+ years of experience.</p>
        </div>
        <div class="col-md-4 exblock">
          <h2>IOT ECO-SYSTEM</h2>
          <p>We have complete IOT eco-system based on that we provide end to end solution to the customer right from node (sensors) to Data analytics.</p>
        </div>
        <div class="col-md-4 exblock">
          <h2>IOT CONSULTANT</h2>
          <p>We have top notch IOT consultant who helps client to make future proof disruptive solutions.</p>
        </div>
      </div>
      <h3 class="text-center highlight">Web Development</h3>
      <hr class="star-primary">
      <div class="row mrtop30">
        <div class="col-md-4 exblock">
          <h2>Customised PHP-MySQL solutions</h2>
          <p>We develop &amp; design websites, portals, partner sites, responsive sites. </p>
        </div>
        <div class="col-md-4 exblock">
          <h2>E-Commerce Solutions</h2>
          <p>We have developed 100+ sites in Magneto, Woo Commerce, Wordpress, and Drupal.</p>
        </div>
        <div class="col-md-4 exblock">
          <h2>Open Source Solutions</h2>
          <p>We offer open source solutions with our Wordpress developers, Joomla developers, Magneto developers, Drupal developers etc.</p>
        </div>
      </div>
      <h3 class="text-center highlight">Mobile Apps Development</h3>
      <hr class="star-primary">
      <div class="row mrtop30">
        <div class="col-md-4 exblock">
          <h2>Experience</h2>
          <p>We have massive experience in mobile apps development in all the trending platforms and operating systems.</p>
        </div>
        <div class="col-md-4 exblock">
          <h2>Collaborative Work</h2>
          <p>Our developers work in a collaborative way with their involvement right from your concept to implementation and make it unique.</p>
        </div>
        <div class="col-md-4 exblock">
          <h2>Affordable Solution</h2>
          <p>We provide absolutely affordable and advanced android app development, iOS app development, windows app development.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="earth">
  <div class="container">
    <div class="col-sm-4 block3img"><img src="img/left.jpg"></div>
    <div class="col-sm-4 hidden-xs block3img"><img src="img/middle.jpg"></div>
    <div class="col-sm-4 hidden-xs block3img"><img src="img/right.jpg"></div>
  </div>
</section>

<!-- Portfolio Grid Section -->

<section id="portfolio">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Our Projects</h2>
        <h3 class="text-center vensub">Have a look at some of our<span class="highlight"> work in detail</span></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3 col-sm-6 portfolio-item"> <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
          <div class="caption">
            <div class="caption-content"> <i class="fa fa-search-plus fa-3x"></i> </div>
          </div>
          <img src="img/portfolio/mbt.jpg" class="img-responsive" alt="MBT"> <span>MBT</span> </a> </div>
        <div class="col-md-3 col-sm-6 portfolio-item"> <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
          <div class="caption">
            <div class="caption-content"> <i class="fa fa-search-plus fa-3x"></i> </div>
          </div>
          <img src="img/portfolio/trakInvest.png" class="img-responsive" alt="trakInvest"> <span>TrakInvest</span> </a> </div>
        <div class="col-md-3 col-sm-6 portfolio-item"> <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
          <div class="caption">
            <div class="caption-content"> <i class="fa fa-search-plus fa-3x"></i> </div>
          </div>
          <img src="img/portfolio/dosarrest.png" class="img-responsive" alt=""> <span>DOSarrest</span> </a> </div>
        <div class="col-md-3 col-sm-6 portfolio-item"> <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
          <div class="caption">
            <div class="caption-content"> <i class="fa fa-search-plus fa-3x"></i> </div>
          </div>
          <img src="img/portfolio/sunday-streams.png" class="img-responsive" alt=""> <span>Sunday Streams</span> </a> </div>
        <div class="col-md-12 text-center"><a class="viewmore" href="http://eluminoustechnologies.com/portfolio/" target="_blank">View More </a> </div>
      </div>
    </div>
  </div>
</section>
<section id="jupiter">
  <div class="container-fluid">
    <h2 class="text-center">Meet Our <span class="highlight">Team</span></h2>
    <div class="container">
      <div class="row items mrbot30">
        <div class="xpert col-md-4 col-sm-6">
          <div class="xpertwrap">
            <div class="xpertimg"><img class="img-responsive" src="img/sandeep.png"></div>
            <div class="xpertname">Sandeep Aher</div>
            <div class="xpertdesc">Founder & MD</div>
          </div>
        </div>
        <div class="xpert col-md-4 col-sm-6">
          <div class="xpertwrap">
            <div class="xpertimg"><img class="img-responsive" src="img/Hrushikesh.png"></div>
            <div class="xpertname">Hrushikesh Wakadkar</div>
            <div class="xpertdesc">Founder</div>
          </div>
        </div>
        <div class="xpert col-md-4 col-sm-6">
          <div class="xpertwrap">
            <div class="xpertimg"><img class="img-responsive" src="img/Priyank.png"></div>
            <div class="xpertname">Priyank Purohit</div>
            <div class="xpertdesc">Business Development Manager</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->

<section class="line9" id="uranus">
  <div class="container">
    <div class="col-sm-10 col-sm-offset-1 text-center">
      <h2>We offer truly value added solution in web development &amp; mobile application development to our clients </h2>
    </div>
  </div>
</section>
<section class="line10" id="neptune">
  <div class="container">
    <div class="col-md-4 col-sm-3  tfqleft hidden-xs"></div>
    <div class="col-md-4 col-sm-6 tfqmid page-scroll" ><span>Interested?</span><a class="btn btn-primary" href="#themainform">Please Click Here</a></div>
    <div class="col-md-4 col-sm-3  tfqright hidden-xs"></div>
  </div>
</section>

<!-- Footer -->

<footer class="text-center">
  <div class="footer-above">
    <div class="container">
      <div class="col-md-4 footblock">
        <div class="foottitle">
          <p class="help-block"><a data-toggle="modal" data-target="#privacyPolicy">PRIVACY POLICY</a></p>
        </div>
        <p>COPYRIGHT &copy; 2017<br>
          ELUMINOUS TECHNOLOGIES PVT. LTD.</p>
      </div>
      <div class="col-md-4 footblock">
        <div class="foottitle">LOCATION</div>
        <p><strong class="highlight">A:</strong> IT Park-29/7, Near Power House,<br>
          MIDC Ambad, Ambad Industrial <br>
          Area, Nashik, Maharashtra,<br>
          India - 422010<br>
        </p>
        <p><strong class="highlight">T:</strong> +91 0253 238 2566 <br>
          <strong class="highlight">E:</strong> <a href="mailto:sales@eluminoustechnologies.com">sales@eluminoustechnologies.com</a></p>
      </div>
      <div class="col-md-4 footblock">
        <div class="foottitle">ABOUT THE COMPANY</div>
        <p>With 14 years of experience we understand its not about the project / technology but about the Purpose.<br>
          Understanding the purpose behind your software needs makes us unique from competition.</p>
      </div>
    </div>
  </div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->

<div class="scroll-top page-scroll visible-xs visible-sm"> <a class="btn" href="#page-top"> <i class="fa fa-chevron-up"></i> </a> </div>

<!-- Portfolio Modals -->

<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-body">
            <div class="col-md-7"> <img src="img/portfolio/mbt.jpg" class="img-responsive img-centered" alt=""></div>
            <div class="col-md-5">
              <h2>MBT</h2>
              <span>Healthcare / Informative</span>
              <hr class="star-primary">
              <ul class="list-inline item-details">
                <li>Technology: <strong class="highlight">Web design, HTML5, CSS3</strong> </li>
              </ul>
              <p>We have developed this amazing website using HTML5. The website has a unique approach that understands the human benefits of health, wellness and staying on the move.</p>
              <a target="_blank" href="http://www.mbt.com/en-gb" role="button" class="btn btn-primary ">View Project</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-body">
            <div class="col-md-7"> <img src="img/portfolio/trakInvest.png" class="img-responsive img-centered" alt="trakInvest"></div>
            <div class="col-md-5">
              <h2>TrakInvest</h2>
              <span>Investment and Finance</span>
              <hr class="star-primary">
              <ul class="list-inline item-details">
                <li>Technology: <strong class="highlight">Joomla, jQuery, HTML5, CSS3</strong> </li>
              </ul>
              <p>TrakInvest is the world’s first social investment platform for equities. This portal allows you to leverage the collective knowledge of investors globally to make better and more profitable investment decisions.</p>
              <a target="_blank" href="https://www.trakinvest.com/" role="button" class="btn btn-primary ">View Project</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="modal-body">
            <div class="col-md-7"> <img src="img/portfolio/dosarrest.png" class="img-responsive img-centered" alt="dosarrest"></div>
            <div class="col-md-5">
              <h2>DOSarrest External Monitoring Service</h2>
              <span>Server Monitoring and Datacenter.</span>
              <hr class="star-primary">
              <ul class="list-inline item-details">
                <li>Technology: <strong class="highlight">iOS and Android</strong> </li>
              </ul>
              <p>This service allows you to monitor your website’s performance from 8 different networks around the globe every minute, view historical or real-time performance stats.</p>
              <a target="_blank" href="https://itunes.apple.com/us/app/dosarrest-external-onitoring/id956768144?ls=1&mt=8" role="button" class="btn btn-primary ">View Project</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl"> </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ">
          <div class="modal-body">
            <div class="col-md-7"> <img src="img/portfolio/sunday-streams.png" class="img-responsive img-centered" alt="Sunday Streams"></div>
            <div class="col-md-5">
              <h2>Sunday Streams</h2>
              <span>Live streaming service</span>
              <hr class="star-primary">
              <ul class="list-inline item-details">
                <li>Technology: <strong class="highlight">Android</strong> </li>
              </ul>
              <p>The Sunday Streams app works with broadcasts using the Sunday Streams live streaming service. With the app you can watch your church or organization's live broadcasts and on-demand videos. </p>
              <a target="_blank" href="https://play.google.com/store/apps/details?id=com.imd.sunday_stream&hl=en" role="button" class="btn btn-primary ">View Project</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery --> 

<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 

<script src="js/bootstrap.min.js"></script> 

<!-- Plugin JavaScript --> 

<script src="js/jquery.easing.min.js"></script> 
<script src="js/classie.js"></script> 
<script src="js/cbpAnimatedHeader.js"></script> 

<!-- Custom Theme JavaScript --> 

<script src="js/custom.js"></script> 
<script>

	 $(document).ready(function(){

			$(this).scrollTop(0);

		});

	 </script> 
<script type="text/javascript">
	jQuery(document).ready(function() {
		<?php
		$cookie_name 	= "ChristmasPopups";
		$cookie_value 	= true;
		if(!isset($_COOKIE[$cookie_name])) {
			?>
			setTimeout(function() {
				//jQuery('#overlay').show();
				//jQuery('#specialPageHtml').show();
			}, 7000);
			<?php
			setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/"); 
		}
		?>
		jQuery(".no").click(function(){
			jQuery('#overlay').hide('slow');
			jQuery('#specialPageHtml').hide('slow');
		})
		jQuery(".yes").click(function(){
			jQuery('.poup_fst').hide();
			jQuery('.poup_sec').show();
		})
		jQuery(".closePospup").click(function(){
			jQuery('#overlay').hide('slow');
			jQuery('#specialPageHtml').hide('slow');
		})
		jQuery("#submitPopups").click(function(){
			var strPopFname	= jQuery("#strPopFname").val().trim();
			var strPopPhone	= jQuery("#strPopPhone").val().trim();
			var strPopEmail	= jQuery("#strPopEmail").val().trim();
			var count = 0;
			if(strPopFname==""){
				count =  1;
				jQuery("#strPopFname").css("border","2px solid red");
			}else{
				jQuery("#strPopFname").css("border","none");
			}
			
			if(strPopPhone!=""){
				var filter = /^[0-9-+]+$/;
				if (!filter.test(strPopPhone)) {
					count =  1;
					jQuery("#strPopPhone").css("border","2px solid red");
				}else{
					jQuery("#strPopPhone").css("border","none");
				}
			}
	
			if(strPopEmail==""){
				count =  1;
				jQuery("#strPopEmail").css("border","2px solid red");
			}else{
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
				if (filter.test(strPopEmail)) {
					jQuery("#strPopEmail").css("border","none");
				}else {
					count = 1;
					jQuery("#strPopEmail").css("border","2px solid red");
				}
				  
				  
			}
			if(count == 0){
				jQuery("#img_loading").show("slow");
				jQuery.post("save_data.php",{
					email:strPopEmail,
					name: strPopFname,
					phone:strPopPhone
				
				},
				function(data,status){
					var arrData = new Object;
					try{ 
						var arrData = $.parseJSON(data); 
					}
					catch(ex){
						arrData.sts = 'ERR' 
					}
					jQuery("#status").html(arrData.msg);
					setTimeout(function() {
						jQuery('#overlay').hide('slow');
						jQuery('#specialPageHtml').hide('slow');
					}, 1200);
				});	
			}
			
		})
		
		
	});
	
</script>
<div id="overlay"></div>
<div id="specialPageHtml" style="display:none;">
  <style>
#overlay {
	display: none;
	position: fixed;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 150%;
	background-color: #000;
	z-index: 1001;
	-moz-opacity: 0.4;
	opacity: 0.6;
	filter: alpha(opacity=80);
}
#specialPageHtml {
	z-index: 9999999;
	display: none;
	position: fixed;
	top: 50%;
	left: 50%;
	/* bring your own prefixes */
	transform: translate(-50%, -50%);
	width: 100%;
}
.subscribe_button {
	margin: 18px;
	padding: 10px;
	width: auto !important;
}
@import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900');
@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');
/*font-family: 'Roboto Condensed', sans-serif;*/
a {
	text-decoration: none;
}
.popup-sec {
	background-color: #1887e4;
	background-image: url("img/popup-bg.png");
	background-position: right bottom;
	background-repeat: no-repeat;
	border-radius: 10px;
	font-family: "Roboto", sans-serif;
	margin: auto;
	max-width: 560px;
	padding: 26px 0 136px;
	text-align: center;
	position:relative;
}
.popup-sec h2 {
  color: #fff;
  font-size: 30px;
  font-weight: 400;
  margin-bottom: 20px;
  margin-top: 0;
  padding: 0 40px;
  text-shadow: 1px 1px 1px #385e9f;
}
.popup-sec h4{color:#000;}
.popup-sec h3 {
	color: #fff;
	font-size: 25px;
	line-height: 35px;
	margin-bottom: 30px;
	margin-top: 0;
	padding: 0 90px;
	text-transform: uppercase;
}
.popup-sec h3 span {
	color: #061244;
	font-size: 27px;
	font-weight: 900;
}
.popup-sec h5 {
	color: #fff;
	font-size: 14px;
	font-weight: 400;
	margin-top: 35px;
}
.popup-sec1 a {
	border-radius: 50px;
	display: inline-block;
	font-family: "Roboto Condensed", sans-serif;
	font-size: 30px;
	font-weight: 700;
	padding: 8px 70px;
	color: #fff;
}
.popup-sec1 a span {
	display: block;
	font-family: "Roboto", sans-serif;
	font-size: 12px;
	font-weight: 400;
}
.popup-sec1 small {
	padding: 20px;
	position: relative;
	top: -20px;
}
.yes {
	background: #f88015;
	box-shadow: 1px 4px 0 #a54e01;
}
.no {
	background: #2d2d2d;
	box-shadow: 1px 4px 0 #0d0d0d;
}
.yes:hover {
	background: #fc8d2a;
}
.no:hover {
	background: #4b4b4b;
}
.popup-sec2 [type="text"], .popup-sec2 [type="phone"], .popup-sec2 [type="email"] {
  border: medium none;
  border-radius: 5px;
  padding: 10px;
  width: 56%;
}
.popup-sec2 .col {
	margin-bottom: 13px;
}
.popup-sec2 [type="button"] {
  background: #f88015 none repeat scroll 0 0;
  border: medium none;
  border-radius: 5px;
  box-shadow: 1px 4px 0 #a54e01;
  color: #fff;
  cursor: pointer;
  font-family: "Roboto Condensed",sans-serif;
  font-size: 25px;
  font-weight: 700;
  line-height: 42px;
  margin-left: 3px;
  text-transform: uppercase;
  width: 56%;
}
.popup-sec2 [type="button"]:hover {
	background: #fc8d2a;
}
.closePospup {
  background: #000 none repeat scroll 0 0;
  border: 2px solid #fff;
  border-radius: 50px;
  color: #fff;
  cursor: pointer;
  height: 25px;
  line-height: 43px;
  padding: 2px 6px;
  position: absolute;
  right: -12px;
  top: -7px;
  width: 25px;
}
#status {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  padding-top: 10px;
}

@media (max-width: 767px) {
.popup-sec {width: 90%;padding: 26px 0 20px;background-image: url("img/popup-mobile-bg.png");max-width: 400px;}
.popup-sec h2 {font-size: 20px;}
.popup-sec2 [type="text"], .popup-sec2 [type="phone"], .popup-sec2 [type="email"] {padding: 10px 10px;width: 88% !important;}
.popup-sec2 [type="submit"] {width: 88%;}
.popup-sec h3 {font-size: 18px;line-height: 26px;padding: 0px;}
.popup-sec h3 span {font-size: 17px;}
.popup-sec1 a {font-size: 22px;padding: 12px 30px 12px;}
.popup-sec1 a span {display: none;}
.popup-sec h5 {margin-top: 24px;padding: 0 20px;}
.popup-sec2 [type="button"] {width: 87%;}
  
}

</style>
  <div class="popup-sec poup_fst">
    <h2>Hire a Dedicated Developer and Get 40 Additional Hours FREE! </h2>
    <h4>(Worth $400/ Month)</h4>
    <div class="popup-sec1">
      <h3>Free Analysis , Consulting & Documentation.</h3>
      <a class="yes" href="#">YES</a> <small>OR</small> <a class="no" href="#">NO</a>
      <h5>Note: This offer is valid for all the Web & Mobile Apps projects</h5>
    </div>
  </div>
  <br>
  <br>
  <div class="popup-sec poup_sec" style="display:none;">
    <div class="closePospup"><i class="fa fa-times" aria-hidden="true"></i></div>
    <h2>It is christmas time !</h2>
    <div class="popup-sec2">
      <p style="text-align:center;"> <img src="img/reload.gif" id="img_loading" style="display:none;"> </p>
      <form action="" method="post">
        <div class="col">
          <input name="strPopFname" id="strPopFname" type="text" placeholder="Name" required />
        </div>
        <div class="col">
          <input name="strPopPhone" id="strPopPhone" type="phone" placeholder="Phone" />
        </div>
        <div class="col">
          <input name="strPopEmail" id="strPopEmail" type="email" placeholder="Email" required/>
        </div>
        <div class="col">
          <input name="strPopBtn" type="button" value="subscribe"  id="submitPopups" />
          &nbsp;&nbsp;<br>
          <div id="status"></div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery("#get_btn").click(function(){
			var count = 0;
			var strGetYourName	=	jQuery("#strGetYourName").val().trim();
			var strGetYourEmail	=	jQuery("#strGetYourEmail").val().trim();
			var strGetYourSubject	=	jQuery("#strGetYourSubject").val().trim();
			var getintoucharea	=	jQuery("#getintoucharea").val().trim();
			if(strGetYourName == ''){
				count = 1;
				jQuery("#strGetYourName").css('border-color', 'red');
			}else{
				jQuery("#strGetYourName").css('border-color', '#e8e8e8');
			}
			if(strGetYourEmail == ''){
				count = 1;
				jQuery("#strGetYourEmail").css('border-color', 'red');
			}else{
				jQuery("#strGetYourEmail").css('border-color', '#e8e8e8');
			}
			if(strGetYourSubject == ''){
				count = 1;
				jQuery("#strGetYourSubject").css('border-color', 'red');
			}else{
				jQuery("#strGetYourSubject").css('border-color', '#e8e8e8');
			}
			if(getintoucharea == ''){
				count = 1;
				jQuery("#getintoucharea").css('border-color', 'red');
			}else{
				jQuery("#getintoucharea").css('border-color', '#e8e8e8');
			}
			if(count == 0){
				return true;
			}else{
				return false;
			}
		});
			
		jQuery( ".sticky-popup" ).addClass('right-bottom');
		var contheight = jQuery( ".popup-content" ).outerHeight()+2;      	
		jQuery( ".sticky-popup" ).css( "bottom", "-"+contheight+"px" );
		jQuery( ".sticky-popup" ).css( "visibility", "visible" );
		jQuery('.sticky-popup').addClass("open_sticky_popup");
		jQuery('.sticky-popup').addClass("popup-content-bounce-in-up");
		
		jQuery( ".popup-header" ).click(function() {
			if(jQuery('.sticky-popup').hasClass("open"))
			{
				jQuery('.sticky-popup').removeClass("open");
				jQuery( ".sticky-popup" ).css( "bottom", "-"+contheight+"px" );
			}
			else
			{
				jQuery('.sticky-popup').addClass("open");
				jQuery( ".sticky-popup" ).css( "bottom", 0 );		
			}
		  
		});		    
	});
</script> 
<script>
  $(function() {
    $('#navbar a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
	$('a[href^="#"]').on('click', function(event) {
   var target = $( $(this).attr('href') );
  
   if( target.length ) {
    event.preventDefault();
    $('html, body').animate({
     scrollTop: target.offset().top-60
    }, 400);
   }
});
$('.nav a').click(function () {
    $('.navbar-collapse').collapse('hide');
});
  });
</script>
<div class="sticky-popup right-bottom open_sticky_popup popup-content-bounce-in-up" style="bottom: -402px; visibility: visible;">
  <div class="popup-wrap">
    <div class="popup-header"><span class="popup-title">GET IN TOUCH
      <div class="popup-image"></div>
      </span></div>
    <div class="popup-content">
      <div class="popup-content-pad">
        <div role="form" class="wpcf7" id="wpcf7-f1325-o2" lang="en-US" dir="ltr">
          <div class="screen-reader-response"></div>
          <form action="" method="post" class="wpcf7-form">
            <p>
              <label> Your Name (required)<br>
                <span class="wpcf7-form-control-wrap your-name">
                <input type="text" name="strGetYourName" id="strGetYourName" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
                </span> </label>
            </p>
            <p>
              <label> Your Email (required)<br>
                <span class="wpcf7-form-control-wrap your-email">
                <input type="email" name="strGetYourEmail" id="strGetYourEmail" required value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false">
                </span> </label>
            </p>
            <p>
              <label> Subject<br>
                <span class="wpcf7-form-control-wrap your-subject">
                <input type="text" name="strGetYourSubject" id="strGetYourSubject" required value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false">
                </span> </label>
            </p>
            <p>
              <label> Your Message<br>
                <span class="wpcf7-form-control-wrap your-message">
                <textarea name="getintoucharea"  id="getintoucharea"cols="40" rows="10" required class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea>
                </span> </label>
            </p>
            <p>
              <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit btn btn-default" name="get_btn" id="get_btn" >
              <span class="ajax-loader"></span></p>
            <div class="wpcf7-response-output wpcf7-display-none"></div>
          </form>
        </div>
        <div class="swp-content-locator"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> 
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	// Datepicker
	jQuery(document).ready(function(){
		jQuery('#datetimepicker1').datetimepicker({
			//debug:true,
		});
	});	
</script>

<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	 $('#frmSchedule').validate(
	 {
	  errorElement: 'span', //default input error message container
	  errorClass: 'span-error', // default input error message class
	  focusInvalid: false, // do not focus the last invalid input
	  
	  rules: 
	   {
		your_name_1: 
		{
		 required: true,
		},
		your_company_1: 
		{
		 required: true,
		},
		your_email_address_1: 
		{
		 required: true,
		 email:true,
		}
		  },
		  
		 messages: 
	   {
		your_name_1: 
		{
		 required: "name Required",
		},
		your_company_1: 
		{
		 required: "company Required",
		},
		your_email_address_1: 
		{
		 required: "email Required",
		}
	   },
	   
	   submitHandler: function (form) 
	   {  
		form.submit(); // form validation success, call ajax form submit
	   }
	 });
 </script>

</body>
</html><?php ob_end_flush();?> 