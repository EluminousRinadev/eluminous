<?php
session_start();

$base_url="https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';

	if ($_REQUEST['authentication'] == 'homeFormSubmissionDetails') {
			
		$companyName 		=  $_REQUEST['companyName'];
		$name 				=  $_REQUEST['name'];
		$email 				=  $_REQUEST['email'];
		$mobile 			=  $_REQUEST['mobile'];
		$projectDetails 	=  $_REQUEST['projectDetails'];
		$projectType 		=  $_REQUEST['projectType'];
		$reasonContact 		=  $_REQUEST['reasonContact'];
		$hearAboutUs 		=  $_REQUEST['hearAboutUs'];


		$_SESSION['name'] = $name ;


		// Mail body
		$subject = 'Received New Enquiry from '.$name;	// Your Email Subject.
		/*$message .= '<span style="display:block;color:#000;"> Hi Admin, </span>';
		$message .= '<span style="display:block;color:#000;">Below is the user detail </span>';
		$message .= '<table border="0" cellspacing="0" cellpadding="0" style="border-color: #ffffff;font-size: 12px;width:100%;"><tbody><tr><td style="padding: 4px 8px;border: 1px solid #efefef;">Name </td><td style="padding: 4px 8px;border: 1px solid #efefef;">'.$name.'</td></tr>';
		$message .= '<tr><td style="padding: 4px 8px;border: 1px solid #efefef;">Email </td><td style="padding: 4px 8px;border: 1px solid #efefef;">'.$email.'</td></tr>';
		$message .= '<tr><td style="padding: 4px 8px;border: 1px solid #efefef;">Mobile</td><td style="padding: 4px 8px;border: 1px solid #efefef;">'.$mobile.'</td></tr>';
		$message .= '<tr><td style="padding: 4px 8px;border: 1px solid #efefef;">Project Details</td><td style="padding: 4px 8px;border: 1px solid #efefef;">'.$projectDetails.'</td></tr> </tbody></table>';

	 	
		$top = '<p style="text-align:center;margin:0px;padding:23px 10px;background:#2196f3;color:white;font-size:28px;width:500px">'.$subject.'</p>';
		$bottom = '<p style="width:500px;text-align:center;margin-top:10px;padding:15px;background-color:#efefef;font-size: 24px;">Thank You</p>';
		$messageFormate = '<p style="text-align:left;margin:0px;padding:23px 10px;background: #fff0;color:black;font-size:14px;border:  1px solid #efefef;">'.//$message.'</p>';
		 

		 
		$mailSubject = '<body style="font-family: Arial, Helvetica, arial, Segoe UI,Tahoma, Verdana, Geneva, sans-serif; background-color:#fff;"><table style="width:580px;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td><table style="width:100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td><table style="width:100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td height="90"><img src="'.$base_url.'/mailer_data/eluminous-pvt-ltd_black.png" alt="eluminous-pvt-ltd_black" width="200" style="display: block;"></td><td width="50%" style="text-align: right; font-weight:normal;"><span style="font-size:16px; color:#333;font-family:Segoe UI,Tahoma arial;font-weight: bold;">+91 253 238 2566 <br><a style="color: #2196f3;text-decoration:none; "href="mailto:sales@eluminoustechnologies.com"> sales@eluminoustechnologies.com</a></span></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td><table style="width:100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td height="0">&nbsp;</td></tr><tr><td><span style="font-size:16px;line-height:20px;color:#333;font-family:Segoe UI,Tahoma">';

		$mailSubject .= ' '.$messageFormate .'<tr style="border-top: 1px solid #dcdcdc;padding-top: 10px;display: block; text-align: center;"><td style="text-align: center;width:100%; display: block;" ><span style="font-size:16px;line-height:38px;color:#333;font-family:Segoe UI,Tahoma; font-weight: 500; text-transform: capitalize;"> Be In Touch</span><br><a style="display: inline-block; margin-right:10px;" href="https://www.facebook.com/eluminoustech"><img src="'.$base_url.'/mailer_data/connect-fb.png" alt="eluminous-pvt-ltd_black" width="39" height="39"></a>
		<a style="display: inline-block; margin-right:10px;" href="https://www.youtube.com/channel/UCfqg8756psg4hflU027Iu9g">
		<img src="'.$base_url.'/mailer_data/youtube-logotype.png" alt="eluminous-pvt-ltd_black" width="38" height="39">
		</a>
		<a style="display: inline-block; margin-right:10px;" href="https://twitter.com/eluminoustech"><img src="'.$base_url.'/mailer_data/connect-twitter.png" alt="eluminous-pvt-ltd_black" width="37" height="39"></a><a style="display: inline-block; margin-right:10px;" href="https://www.linkedin.com/company/eluminous-technologies"><img src="'.$base_url.'/mailer_data/connect-linkedin.png" alt="eluminous-pvt-ltd_black" width="38" height="39"></a><a style="display: inline-block; margin-right:10px;" href="skype:eluminoustechnologies?chat"><img src="'.$base_url.'/mailer_data/skype.png" alt="eluminous-pvt-ltd_black" width="38" height="39"></a><br> <br></td></tr></tbody></table></td></tr><tr><td><table style="width:100%; text-align: center; margin-top: 10px; padding:15px;background-color: #efefef;" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td valign="middle" height="38"><span style="font-size:14px;color:#757575;font-family:Segoe UI,Tahoma; text-align="center"><a href="https://eluminoustechnologies.com/" style="color: #444444;text-decoration:none;font-size: 15px;">eLuminous technologies </a> © 2019 All Rights Reserved</span></td></tr></tbody></table></td></tr></tbody></table></body>'; */


		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		// Additional headers
		//$headers .= 'To: eLuminous <biz@eluminoustechnologies.com>' . "\r\n";
		$headers .= 'From: eLuminous Technologies Pvt Ltd Nashik <biz@eluminoustechnologies.com>' . "\r\n";
		//$headers .= 'Bcc: gauri@eluminoustechnologies.com' . "\r\n";
		$headers .= 'Bcc: priyank_purohit@eluminoustechnologies.com' . "\r\n";
		$headers .= 'Bcc: eluminous.sse24@gmail.com ' . "\r\n";
		
		// Mail to ETech
		 mail("gauri@eluminoustechnologies.com", $subject.' New', "This is test mail only", $headers);
		
		// Mail to Visitor/User
		// mail($email, $subject.' New', $mailSubject, $headers);
	}
	
?>