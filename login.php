<?php
include "db.php";
session_start();

if(isset($_POST["login_mcw"]))   
{  
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "Select * from users where o_email = '" . $email . "' and pwd = '" . $password . "' and status = 1";
  $result = mysqli_query($conn,$sql);  
 $user = mysqli_fetch_array($result); 
  if($user)   
  {   
      $_SESSION["mcw_useremail"] = $email;
      $_SESSION["mcw_username"] = $user['fullname'];
     $_SESSION["mcw_id"] = $user['user_id'];
       $_SESSION["mcw_mobile"] = $user['mobile'];
      $_SESSION["mcw_pan"] = $user['pan'];
      $_SESSION["mcw_gst"] = $user['gst'];
      $_SESSION["mcw_address"] = $user['add1'];
      $_SESSION["mcw_pin"] = $user['pin'];
      $_SESSION["mcw_city"] = $user['city'];
      

   if(!empty($_POST["remember"]))   
   {  
      setcookie ("mcw_emailid",$email,time()+ (10 * 365 * 24 * 60 * 60));  
      setcookie ("mcw_passwordid",$password,time()+ (10 * 365 * 24 * 60 * 60)); 
   }  
   else  
   {  
    if(isset($_COOKIE["mcw_emailid"]))   
    {  
     setcookie ("mcw_emailid","");  
    }  
    if(isset($_COOKIE["mcw_passwordid"]))   
    {  
     setcookie ("mcw_passwordid","");  
    }  
   }  
   header("location:index.php"); 
  }  
  else  
  {  
   $message = "Invalid Login";  
  } 
 
} 

     //forgot password 

  if(isset($_POST['forget_pwd'])){
    
  $forgot_email = $_POST["forgot_email"];
    $sql = "Select o_email,pwd,fullname from users where o_email = '" . $forgot_email . "'";
      $result = mysqli_query($conn,$sql);  
         $user = mysqli_fetch_array($result); 
  if($user)   
  {  
      $email = $user['o_email'];
      $name = $user['fullname'];
      $pwd = uniqid();
      
      $query = "UPDATE `users` SET `pwd`= '$pwd' WHERE o_email = '" . $email . "'";
     $exec= mysqli_query($conn,$query);
  if ($exec) {
  
        
      $actual_link = "https://www.megacompuworld.in/login.php";
      $toEmail = $email;
      $subject = "Forget Password Email";
      $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width">
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <title></title>
  <!--[if !mso]><!-->
  <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <!--<![endif]-->
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
    }

    table,
    td,
    tr {
      vertical-align: top;
      border-collapse: collapse;
    }

    * {
      line-height: inherit;
    }

    a[x-apple-data-detectors=true] {
      color: inherit !important;
      text-decoration: none !important;
    }
  </style>
  <style type="text/css" id="media-query">
    @media (max-width: 670px) {

      .block-grid,
      .col {
        min-width: 320px !important;
        max-width: 100% !important;
        display: block !important;
      }

      .block-grid {
        width: 100% !important;
      }

      .col {
        width: 100% !important;
      }

      .col_cont {
        margin: 0 auto;
      }

      img.fullwidth,
      img.fullwidthOnMobile {
        width: 100% !important;
      }

      .no-stack .col {
        min-width: 0 !important;
        display: table-cell !important;
      }

      .no-stack.two-up .col {
        width: 50% !important;
      }

      .no-stack .col.num2 {
        width: 16.6% !important;
      }

      .no-stack .col.num3 {
        width: 25% !important;
      }

      .no-stack .col.num4 {
        width: 33% !important;
      }

      .no-stack .col.num5 {
        width: 41.6% !important;
      }

      .no-stack .col.num6 {
        width: 50% !important;
      }

      .no-stack .col.num7 {
        width: 58.3% !important;
      }

      .no-stack .col.num8 {
        width: 66.6% !important;
      }

      .no-stack .col.num9 {
        width: 75% !important;
      }

      .no-stack .col.num10 {
        width: 83.3% !important;
      }

      .video-block {
        max-width: none !important;
      }

      .mobile_hide {
        min-height: 0px;
        max-height: 0px;
        max-width: 0px;
        display: none;
        overflow: hidden;
        font-size: 0px;
      }

      .desktop_hide {
        display: block !important;
        max-height: none !important;
      }

      .img-container.big img {
        width: auto !important;
      }
    }
  </style>
  <style type="text/css" id="icon-media-query">
    @media (max-width: 670px) {
      .icons-inner {
        text-align: center;
      }

      .icons-inner td {
        margin: 0 auto;
      }
    }
  </style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #000000;">
  <!--[if IE]><div class="ie-browser"><![endif]-->
  <table class="nl-container" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #000000; width: 100%;" cellpadding="0" cellspacing="0" role="presentation" width="100%" bgcolor="#000000" valign="top">
    <tbody>
      <tr style="vertical-align: top;" valign="top">
        <td style="word-break: break-word; vertical-align: top;" valign="top">
          <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#000000"><![endif]-->
          <div style="background-color:#f3e6f8;">
            <div class="block-grid " style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3e6f8;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:transparent;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <div class="img-container center fixedwidth" align="center" style="padding-right: 0px;padding-left: 0px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
                        <div style="font-size:1px;line-height:15px">&nbsp;</div><img class="center fixedwidth" align="center" border="0" src="http://megacompuworld.in/image/logo_email.png" alt="your logo" title="your logo" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 130px; max-width: 100%; display: block;" width="130">
                        <div style="font-size:1px;line-height:25px">&nbsp;</div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#f3e6f8;">
            <div class="block-grid " style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #f1d0ff;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:#f1d0ff;background-image:url(https://d1oco4z2z1fhwp.cloudfront.net/templates/default/2971/bg-white-rombo.png);background-position:top left;background-repeat:no-repeat">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3e6f8;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:#f1d0ff"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:#f1d0ff;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:45px; padding-bottom:0px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" align="center" role="presentation" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="img-container center fixedwidth" align="center" style="padding-right: 20px;padding-left: 20px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 20px;" align="center"><![endif]-->
                        <div style="font-size:1px;line-height:20px">&nbsp;</div><img class="center fixedwidth" align="center" border="0" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/2971/lock4.png" alt="Forgot your password?" title="Forgot your password?" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 325px; max-width: 100%; display: block;" width="325">
                        <div style="font-size:1px;line-height:20px">&nbsp;</div>
                        <!--[if mso]></td></tr></table><![endif]-->
                      </div>
                      <table cellpadding="0" cellspacing="0" role="presentation" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
                        <tr style="vertical-align: top;" valign="top">
                          <td style="word-break: break-word; vertical-align: top; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; padding-top: 35px; text-align: center; width: 100%;" width="100%" align="center" valign="top">
                            <h1 style="color:#8412c0;direction:ltr;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:28px;font-weight:normal;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0;"><strong>Forgot your password?</strong></h1>
                          </td>
                        </tr>
                      </table>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 45px; padding-left: 45px; padding-top: 10px; padding-bottom: 0px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:"Cabin" Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:45px;padding-bottom:0px;padding-left:45px;">
                        <div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 18px;">

                          <p style="margin: 0; text-align: center; line-height: 1.5; word-break: break-word; font-size: 18px; mso-line-height-alt: 27px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 18px; color: #aa67cf;">Dear,   <b> '. $name .'</b> </span></p>   
                          <p style="margin: 0; text-align: center; line-height: 1.5; word-break: break-word; font-size: 18px; mso-line-height-alt: 27px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 18px; color: #aa67cf;">We received a request to reset your password.</span></p>
                          <p style="margin: 0; text-align: center; line-height: 1.5; word-break: break-word; font-size: 18px; mso-line-height-alt: 27px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 18px; color: #aa67cf;">Your New Password Is : <b> '. $pwd .'</b></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="80%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #E1B4FC; width: 80%;" align="center" role="presentation" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 45px; padding-left: 45px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:45px;padding-bottom:10px;padding-left:45px;">
                        <div class="txtTinyMce-wrapper" style="line-height: 1.5; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; color: #393d47; mso-line-height-alt: 18px;">
                          <p style="text-align: center;margin: 0; line-height: 1.5; word-break: break-word; font-size: 13px; mso-line-height-alt: 20px; mso-ansi-font-size: 14px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 13px; color: #8412c0; mso-ansi-font-size: 14px;">Just click the button below adn login with new password :</span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <div class="button-container" align="center" style="padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://www.example.com" style="height:40.5pt;width:165.75pt;v-text-anchor:middle;" arcsize="0%" strokeweight="0.75pt" strokecolor="#8412c0" fillcolor="#8412c0"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Arial, sans-serif; font-size:14px"><![endif]-->
                        <a href="' . $actual_link . '" target="_blank" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #8412c0; border-radius: 0px; -webkit-border-radius: 0px; -moz-border-radius: 0px; width: auto; width: auto; border-top: 1px solid #8412c0; border-right: 1px solid #8412c0; border-bottom: 1px solid #8412c0; border-left: 1px solid #8412c0; padding-top: 10px; padding-bottom: 10px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;"><span style="padding-left:40px;padding-right:40px;font-size:14px;display:inline-block;letter-spacing:undefined;"><span style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><span style="font-size: 14px; line-height: 28px;" data-mce-style="font-size: 14px; line-height: 28px;">LOGIN</span></span></span></a>
                        <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                      </div>
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 15px; font-family: Arial, sans-serif"><![endif]-->
                    
                      <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 20px; font-family: Arial, sans-serif"><![endif]-->
                      <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:20px;padding-left:10px;">
                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                          <p style="margin: 0; font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><span style="color: #8a3b8f;">&nbsp;</span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
          <div style="background-color:#f3e6f8;">
            <div class="block-grid " style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">
              <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3e6f8;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:650px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="650" style="background-color:transparent;width:650px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:10px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                  <div class="col_cont" style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
                      <!--<![endif]-->
                      <table class="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" role="presentation" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
                              <table class="divider_content" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;" align="center" role="presentation" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                                            <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                          <p style="margin: 0; text-align: center; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin-top: 0; margin-bottom: 0;">&nbsp;</p>
                          <p style="margin: 0; line-height: 1.2; word-break: break-word; text-align: center; font-size: 14px; mso-line-height-alt: 17px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 14px;"><span style="color: #8a3b8f;">B/1, Basement, APM shopping complex, Opposite SUN N STEP CLUB, near Sattadhar Char Rasta, Ahmedabad APM complex, - 380061. &nbsp;megacompuworld@gmail.com / (+91)&nbsp; 8160582238</span></span></p>
                        </div>
                      </div>
                      <!--[if mso]></td></tr></table><![endif]-->
                      <table class="social_icons" cellpadding="0" cellspacing="0" width="100%" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top">
                        <tbody>
                          <tr style="vertical-align: top;" valign="top">
                            <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                              <table class="social_table" align="center" cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                                <tbody>
                                  <tr style="vertical-align: top; display: inline-block; text-align: center;" align="center" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-color/facebook@2x.png" alt="Facebook" title="facebook" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 2.5px; padding-left: 2.5px;" valign="top"><a href="https://instagram.com/" target="_blank"><img width="32" height="32" src="https://d2fi4ri5dhpqd1.cloudfront.net/public/resources/social-networks-icon-sets/t-only-logo-color/instagram@2x.png" alt="Instagram" title="Instagram" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;"></a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                  </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
              </div>
            </div>
          </div>
        
          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </td>
      </tr>
    </tbody>
  </table>
  <!--[if (IE)]></div><![endif]-->
</body>

</html>';
            $headers .= 'From: <info@megacompuworld.in>' . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      if(mail($toEmail, $subject, $content, $headers)) {  } 

      ?> <script>alert('Forget Password Mail Sent Please Check Your Email');
          window.location="login.php";</script> <?php
  
      unset($_POST);
  }
 }
 else{   
       ?>   <script>alert('Email ID Incorrect');
        window.location="login.php";</script>   <?php
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
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
    <!-- breadcrumb start -->
        <section class="section-b-padding" style="background-color: #f2f2f2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="login-area">
                        <div class="login-box">
                            <h1>Login</h1>
                            <form action="" method ="POST">
                                
                  <label for="email">Email Address</label>
                   <input type="email" placeholder="Username or email address" name="email" class="input"  value="<?php if(isset($_COOKIE["mcw_emailid"])) { echo $_COOKIE["mcw_emailid"]; } ?>" required />
             
                   <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="input"  value="<?php if(isset($_COOKIE["mcw_passwordid"])) { echo $_COOKIE["mcw_passwordid"]; } ?>" required />   

               <?php if(isset($message)){ echo "<span style='color: red;'>".$message."</span>"; }  ?>


               <input type="checkbox" name="remember" style="width: 10%;" id="remember" <?php 
               if(isset($_COOKIE["mcw_emailid"])) { ?> checked <?php } ?>>
               <label for="remember">&nbsp; Remember Me</label>
               <br><br>
                <button type="submit" class="btn-style1" name="login_mcw" >Sign in</button>
                                
                                
                                <a href="javascript:void(0)"  class="re-password" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot your password ?</a>
                            </form>
                        </div>
                        <div class="login-account">
                            <h4>Don't have an account?</h4>
                            <a href="register.php" class="ceate-a">Create account</a>
                            <div class="login-info">
                                <a href="terms-conditions.php" class="terms-link"><span>*</span> Terms & conditions.</a>
                                <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="privacy-policy.php">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login end -->
      <section class="quick-view">
        <div class="modal fade vegist-popup" id="forgotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-content">
                            <!-- popup close button start -->
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="ion-close-round"></i></a>
                            <!-- popup close button end -->
                            <!-- popup content area start -->
                            <div class="pop-up-newsletter" style="background-image: url(image/news-popup.jpg5);">
                                <div class="logo-content">
                                    <a href="index.php"><img src="image/mcw_r.jpeg" alt="image" class="img-fluid"></a>
                                    <h4>Forgot Password</h4>
                                    <span>Enter Email to get the new password</span>
                                </div>
                                <form action="" method="POST">
                                <div class="subscribe-area">
                                    <input type="email" name="forgot_email" placeholder="Enter your email address" required="">
                                    <button type="submit" style="margin-top: 20px" name="forget_pwd" class="btn btn-style1">Reset</button>
                                </div>
                              </form>
                            </div>
                            <!-- popup content area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer start -->
    <?php include "footer.php";  ?>
   
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
</body>
</html>