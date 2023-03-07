<?php
include "db.php";
session_start();

if(isset($_POST["register"]))   
{  
 
  $name = $_POST["name"];

  $pan = $_POST["pan"];
  $add1 = $_POST["add1"];
  $add2 = $_POST["add2"];
  $city = $_POST["city"];
  $pin = $_POST["pin"];
  $state = $_POST["state"];
  $country = $_POST["country"];
  $mobile = $_POST["mobile"];
  $email = $_POST["email"];
  $c_name = $_POST["c_name"]; 
  $fullname = $_POST["fullname"];
  $address = $_POST["address"];
  $o_number = $_POST["o_number"];
  $o_email = $_POST["o_email"];
  $pwd = $_POST["pwd"];
  $c_pwd = $_POST["c_pwd"];

    $username = strstr($_POST['name'], ' ', true);
    $user_id = strtoupper($username . rand(10000,99999));

     if($pwd == $pwd) {

         $query = " INSERT INTO `b2cusers`(`user_id`, `name`, `pan`, `add1`, `add2`, `city`, `pin`, `state`, `country`, `mobile`, `email`, `c_name`, `fullname`, `address`, `o_number`, `o_email`, `pwd`) VALUES ('$user_id', '$name', '$pan', '$add1', '$add2', '$city', '$pin', '$state', '$country', '$mobile', '$email', '$c_name', '$fullname', '$address', '$o_number', '$o_email', '$pwd')";
       
        $exec= mysqli_query($conn,$query);
        if ($exec) {

          $actual_link = "http://www.megacompuworld.in/login.php";
          $toEmail = $o_email .",mega.compuworld@yahoo.com";
          $subject = " User Registration Email";
          $content = ' <!DOCTYPE html>

<html lang="en" xmlns:o=" urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		.desktop_hide,
		.desktop_hide table {
			mso-hide: all;
			display: none;
			max-height: 0px;
			overflow: hidden;
		}

		@media (max-width:620px) {
			.desktop_hide table.icons-inner {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.fullMobileWidth,
			.image_block img.big,
			.row-content {
				width: 100% !important;
			}

			.mobile_hide {
				display: none;
			}

			.stack .column {
				width: 100%;
				display: block;
			}

			.mobile_hide {
				min-height: 0;
				max-height: 0;
				max-width: 0;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide,
			.desktop_hide table {
				display: table !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffca23;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-repeat: no-repeat; background-position: center top; color: #000000; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:35px;padding-left:30px;padding-right:30px;padding-top:35px;width:100%;">
<div align="center" style="line-height:10px"><img alt="Books Plus" src="http://megacompuworld.in/image/logo_email.png" style="display: block; height: auto; border: 0; width: 150px; max-width: 100%;" title="Books Plus" width="150"/></div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img class="fullMobileWidth" src="images/top-rounded.png" style="display: block; height: auto; border: 0; width: 600px; max-width: 100%;" width="600"/></div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #132437;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top; color: #000000; background-color: #ffffff; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 10px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;width:100%;">
<div align="center" style="line-height:10px"><img alt="book shelf" class="big" src="images/wel.png" style="display: block; height: auto; border: 0; width: 200px; max-width: 100%;" title="book shelf" width="540"/></div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ff7d14; background-image: url("images/orange-gradient-wide.png"); background-repeat: no-repeat;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-top:25px;text-align:center;width:100%;">
<h1 style="margin: 0; color: #555555; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 36px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Welcome to MegaCompu World</strong></h1>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:20px;padding-left:30px;padding-right:30px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 14px; mso-line-height-alt: 25.2px; color: #737487; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 32.4px;"><span style="font-size:18px;">To cope up with dynamically changing business environment we are constantly trying to adapt so as to provide our partners with the best business experience. Considering this, we have added our business into online portal which is going to be very resourceful and transparent business platform.</span></p>
</div>
</div>
</td>
</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:40px;width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="line" class="big" src="images/divider.png" style="display: block; height: auto; border: 0; width: 541px; max-width: 100%;" title="line" width="541"/></div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
 
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ff7d14;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-top:25px;text-align:center;width:100%;">
<h2 style="margin: 0; color: #555555; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 24px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>' . $name . '</strong></h2>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:20px;padding-left:30px;padding-right:30px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 14px; mso-line-height-alt: 25.2px; color: #737487; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 32.4px;"><span style="font-size:18px;">
Email : ' . $o_email . '<br>Password : ' . $pwd . '</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:35px;padding-top:10px;width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img class="big" src="images/divider.png" style="display: block; height: auto; border: 0; width: 541px; max-width: 100%;" width="541"/></div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:30px;padding-left:15px;padding-right:15px;padding-top:20px;text-align:center;">
<div align="center">
<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://www.example.com" style="height:52px;width:199px;v-text-anchor:middle;" arcsize="8%" stroke="false" fillcolor="#ff7d14"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px"><![endif]--><a href="https://www.example.com" style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#ff7d14;border-radius:4px;width:auto;border-top:1px solid #ff7d14;font-weight:undefined;border-right:1px solid #ff7d14;border-bottom:1px solid #ff7d14;border-left:1px solid #ff7d14;padding-top:10px;padding-bottom:10px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;" target="_blank"><span style="padding-left:60px;padding-right:60px;font-size:16px;display:inline-block;letter-spacing:normal;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">Login</span></span></a>
<!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td>
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 14px; mso-line-height-alt: 25.2px; color: #07113e; line-height: 1.8; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 32.4px;"><span style="font-size:18px;">Follow us</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:15px;padding-left:15px;padding-right:15px;padding-top:10px;text-align:center;">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="138px">
<tr>
<td style="padding:0 7px 0 7px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="images/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
<td style="padding:0 7px 0 7px;"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
<td style="padding:0 7px 0 7px;"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="images/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ff7d14;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top; color: #000000; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img class="fullMobileWidth" src="images/bottom-rounded.png" style="display: block; height: auto; border: 0; width: 600px; max-width: 100%;" width="600"/></div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-left:5px;padding-right:5px;padding-top:30px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #262b30; line-height: 1.2;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:12px;">© 2020 Mega Compu World | B/1, Basement, APM shopping complex,
Opposite SUN N STEP CLUB,
near Sattadhar Char Rasta,
Ahmedabad - 380061.</span></p>
</div>
</div>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 600px;" width="600">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="icons_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
<table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="vertical-align: middle; text-align: center;">

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table><!-- End -->
</body>
</html>';
         $headers .= 'From: <mega.compuworld@yahoo.com>' . "\r\n";
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        if(mail($toEmail, $subject, $content, $headers)) {
                                                     
             ?> <script>alert('User Registered Successfully');
                // window.location= "login.php";</script> <?php 
                echo $toEmail;
         }else{  
             $error = "Email is Alredy Registered !"; 
              } }
                }else{
                   $error = "<br>Password & Confirm Password Are Not Same !"; 
                     }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
     <title>MCW - Mega Computer World</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="spacingtech_webify">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/favicon" href="image/mcw_r.jpeg">
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- simple-line icon -->
    <link rel="stylesheet" type="text/css" href="css/simple-line-icons.css">
    <!-- font-awesome icon -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
    <!-- ion icon -->
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <!-- owl slider -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!-- swiper -->
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <!-- animation -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style>
    .error{
        outline: 1px solid red;
    }
    .canceled {
      color: red;
    }
</style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#myForm input[type="text"], input[type="email"], input[type="number"], input[type="password"], textarea, select').blur(function(){
        if(!$(this).val()){
            $(this).addClass("error");
        } else{
            $(this).removeClass("error");
        }
    });
});
</script>
      <section class="contact section-tb-padding" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="map-area">
                           <div class="map-title">
                                <h1>Registration</h1>
                                 <h1><a href="register.php" style="font-size: small;">Are you B2B ? Register Here</a></h1>
                            </div>
                           
                            <div class="map-details">
                                <div class="contact-info" style="width: 100%;">
                                    <div class="text-danger"><?php if(isset($error)) { echo $error; } ?></div>
                                    <div class="contact-details">
                                        <h4>Firm/Company information</h4>
                                        <form method="POST" action="" id="myForm">
                                            <div class="row">
                                             <div class="col-md-6">
                                            <label>Firm Company Name <span class="canceled">*</span></label>
                                                 <input type="text" name="name" placeholder="Firm Company name" required=""/>
                                            
                                            <label>PAN Number  <span class="canceled">*</span></label>
                                                 <input type="text" name="pan" placeholder="PAN Number" required="">
                                            <label>Address 1  <span class="canceled">*</span></label>
                                                 <textarea name="add1" rows="3" placeholder="Business Address 1" required=""></textarea>
                                            <label>Address 2 <span class="canceled">*</span></label>
                                                 <textarea name="add2" rows="3" placeholder="Business Address 2" required=""></textarea>
                                            <label>City <span class="canceled">*</span></label>
                                                 <input type="text" name="city" placeholder="City" required="">
                                            <label>Pincode <span class="canceled">*</span></label>
                                                 <input type="text" name="pin" placeholder="Pincode" required="">
                                            <label>State <span class="canceled">*</span></label>
                                                 <input type="text" name="state" placeholder="State" required="">
                                            <label>Country <span class="canceled">*</span></label>
                                                  <input type="text" name="country" placeholder="Country" required="">
                                            </div>
                                            <div class="col-md-6">
                                          
                                            <label>Mobile Number <span class="canceled">*</span></label>
                                                 <input type="number" name="mobile" placeholder="Mobile Number" required="">
                                            <label>Email ID <span class="canceled">*</span></label>
                                                 <input type="email" name="email" placeholder="Email ID" required="">

                                            <h4 style="margin-top: 35px">Owner Information</h4>
                                            <label>Company Name</label>
                                                 <input type="text" name="c_name" placeholder="Company Name">
                                            <label>Full Name <span class="canceled">*</span></label>
                                                 <input type="text" name="fullname" placeholder="Full Name" required="">
                                            <label>Address <span class="canceled">*</span></label>
                                                 <textarea name="address" rows="2" placeholder="Address" required=""></textarea>
                                            <label>Mobile Number <span class="canceled">*</span></label>
                                                 <input type="text" name="o_number" placeholder="Mobile Number" required="">
                                            <label>Email Id <span class="canceled">*</span> </label>
                                                 <input type="email" name="o_email" placeholder="Email Id" required="">
                                            <label>New Password <span class="canceled">*</span></label>
                                                 <input type="password" name="pwd" id="new_pwd" placeholder="New password" required="">
                                            <label>Confirm Password <span class="canceled">*</span></label>
                                                 <input type="text" name="c_pwd" id="re_pwd" placeholder="Confirm password" required="">
                                                 <span id='message'></span>
                                             </div>  
                                              </div>
                                            <button type="Submit" name="register" class="btn-style1" style="margin-top: 20px; float: right;">Submit <i class="ti-arrow-right"></i></button>  
                                         </form>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- login end -->
    <!-- footer start -->
    <?php include "footer.php";  ?>
    <!-- footer copyright end -->
    <!-- back to top start -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>
    <!-- jquery -->
    <script src="js/modernizr-2.8.3.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- popper -->
    <script src="js/popper.min.js"></script>
    <!-- fontawesome -->
    <script src="js/fontawesome.min.js"></script>
    <!-- owl carousal -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper -->
    <script src="js/swiper.min.js"></script>
    <!-- custom -->
    <script src="js/custom.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  // Password Matching
  $('#new_pwd, #re_pwd').on('keyup', function () {
    if ($('#new_pwd').val() == '' && $('#re_pwd').val() == '') { 
       $('#message').html('Fill Passwords Fields').css('color', 'red');
    } else
    if ($('#new_pwd').val() == $('#re_pwd').val() && $('#new_pwd').val() != '' && $('#re_pwd').val() != '') {
        $('#message').html('Password Are Matched').css('color', 'green');
    } else 
        $('#message').html('Passwords Are Not Matching').css('color', 'red');
    });
  </script>
</body>
</html>