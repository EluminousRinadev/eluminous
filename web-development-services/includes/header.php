<?php
ob_start();
session_start();
$_SESSION['REQUEST_URI'] = $_SERVER['REQUEST_URI'];

function getVisIpAddr()
{
    $vis_ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $vis_ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $vis_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $vis_ip = $_SERVER['REMOTE_ADDR'];
    }
}

// Use JSON encoded string and converts 
// it into a PHP variable 
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ipdat
));

$countryName = $ipdat->geoplugin_countryName;
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<!-- remove cache  -->
    <title> Web Design and Development Company UK - eLuminous Technologies</title>
    <meta name="description" content="eLuminous offers expert dedicated Laravel developers develops world-class IT web solutions as per your business needs,which increases profit margin ratio">
    <meta name="keywords" content="hire laravel developer, hire offshore laravel developer ,laravel web application development company ,top laravel development companies,laravel development company usa">
    <meta name="author" content="eLuminous Technologies">
    <link rel="icon" href="images/favicon.ico">
    <link rel="canonical" href="" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="assets/owlcarousel/owl.carousel.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- <link rel="stylesheet" href="assets/wow/animate.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- country code -->
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"
    />
    <!-- <link rel="stylesheet" href="build/css/demo.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/j-quary.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Mediaquery CSS -->
    <link rel="stylesheet" href="css/mediaquery.css">
    <!-- country code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124927455-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-124927455-1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-55PLZGM');</script>

</head>
<body>
    <div id="main-head"></div>
    <!-- Header Start -->
   <header>
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap align-items-center wrapper">
                <a class="logo scroll_form" href="#contact-form-top">
                    <img src="images/eluminous-logo.png" alt="eLuminous Logo" />
                </a>
                <ul class="contact_info">
                    <li class="red_btn call_contact">                        
                        <a href="tel:+919823074884 " class="call_contact ">
                            <span class="call_icons icons"><img src="images/icons/flag-2.jpg" alt="Call Icon" /></span>
                            +1 718 838 9981 
                        </a>
                    </li>
                </ul>
            </div>
        </div>        
    </header>
   <!-- Header End -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55PLZGM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- Header Start -->