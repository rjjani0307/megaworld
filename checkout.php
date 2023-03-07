<?php
  include "addtocart.php";
  include "db.php";

 if (!isset($_SESSION['mcw_useremail'])) { header("location:login.php");  }
 if (!isset($_SESSION["cart_item"])) { header("location:index.php");  }
 
  if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    $product_name = ""; $product_code = ""; $product_qty = ""; 
    $product_price = ""; $product_img = ""; $product_id = "";
    
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["sell_price"];
        $pname  = $item['name'];
        $p_id  = $item['p_code'];
        $quantity  = $item['quantity'];
        $sell_price  = $item['sell_price'];
        $img1  = $item['img1'];
        $product_name .= ",".$pname;
        $product_id .= ",".$p_id;
        $product_qty .= ",".$quantity;
        $product_price .= ",".$item_price;
        $product_img .= ",".$img1;
        $total_quantity += $item["quantity"];
        $total_price += ($item["sell_price"]*$item["quantity"]);
    }
 
}   

 if(isset($_POST['checkout'])){
// Required field names
$required = array('name', 'email', 'phone', 'city', 'address', 'zip','scity','saddress','szip','refrence');
    
// Loop over field names, make sure each one exists and is not empty
$err = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $err = true;
  }
}

if ($err) {
 $error = "All Fields  Are Required";
} else {
         $today = date("Ymd");
         $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
         $order_number = $today . $rand;
         $product_name = substr($product_name, 1);
         $product_id = substr($product_id, 1);
         $product_img = substr($product_img, 1);
         $product_qty = substr($product_qty, 1);
         $product_price = substr($product_price, 1); 
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $refrence = $_POST['refrence'];
         $city = $_POST['city'];
         $address = $_POST['address'];
         $zip = $_POST['zip'];
         $scity = $_POST['scity'];
         $saddress = $_POST['saddress'];
         $szip = $_POST['szip'];
         $total_price = $_POST['order_final_total'];
         $ship = $_POST['ship'];

     $query = "INSERT INTO `order`(`order_number`, `refrence`, `product_code`, `product_img`, `product_name`, `quantity`, `total_qty`, `price`, `ship`, `total_amount`, `user_id`, `user_name`, `email`, `number`, `city`, `address`, `zip`, `status`, `ord_date`, `ord_month`) VALUES ('$order_number', '$refrence', '$product_id','$product_img','$product_name','$product_qty','$total_quantity','$product_price', '$ship', '$total_price','".$_SESSION['mcw_id']."', '$name','$email','$phone','$scity','$saddress','$szip','ordered' , '".date("d-m-Y")."', '".date("Y-m-d")."')";
              $insert= mysqli_query($conn,$query);
        
     if($insert){ 
         
               foreach ($_SESSION["cart_item"] as $item){
                     $item_price = $item["quantity"]*$item["sell_price"];
                    $itemdata .= '
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3f7f2;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="66.66666666666667%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-left:35px;padding-right:20px;padding-top:15px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #3a4848; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 30px;"><span style="font-size:20px;color:#44b4b8;">' . $item["name"] . '</span></p>
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 22.5px;"><span style="font-size:15px;">' . $item["p_id"] . '</span></p>
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 18px;"> </p>
</div>
</div>
</td>
</tr>
</table>
</td>
<td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-left:35px;padding-right:20px;padding-top:20px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Oswald", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #3a4848; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 24px;"><span style="font-size:16px;">X ' . $item["quantity"] . '</span></p>
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 24px;"><span style="font-size:16px;">' . $sell_price . '</span></p>
<p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 18px;"> </p>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3f7f2;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="divider_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:10px;">
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #DFDFDF;"><span> </span></td>
</tr>
</table>
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
</table>';                        
           }
           
     $total_price = "₹ ". number_format($total_price,2);
        $toEmail = $email;
        $subject = "Your Order Confirmed ";
        $content = '
        <!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<title></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css"/>
<!--<![endif]-->
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

		.menu_block.desktop_hide .menu-links span {
			mso-hide: all;
		}

		@media (max-width:700px) {
			.desktop_hide table.icons-inner {
				display: inline-block !important;
			}

			.icons-inner {
				text-align: center;
			}

			.icons-inner td {
				margin: 0 auto;
			}

			.image_block img.big,
			.row-content {
				width: 100% !important;
			}

			.menu-checkbox[type=checkbox]~.menu-links {
				display: none !important;
				padding: 5px 0;
			}

			.menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-open,
			.menu-checkbox[type=checkbox]~.menu-links span.sep {
				display: none !important;
			}

			.menu-checkbox[type=checkbox]:checked~.menu-links,
			.menu-checkbox[type=checkbox]~.menu-trigger {
				display: block !important;
				max-width: none !important;
				max-height: none !important;
				font-size: inherit !important;
			}

			.menu-checkbox[type=checkbox]~.menu-links>a,
			.menu-checkbox[type=checkbox]~.menu-links>span.label {
				display: block !important;
				text-align: center;
			}

			.menu-checkbox[type=checkbox]:checked~.menu-trigger .menu-close {
				display: block !important;
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

		#menu012:checked~.menu-links {
			background-color: #3fb9bc !important;
		}

		#menu012:checked~.menu-links a,
		#menu012:checked~.menu-links span {
			color: #ffffff !important;
		}
	</style>
</head>
<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="padding-bottom:20px;padding-top:30px;width:100%;padding-right:0px;padding-left:0px;">
<div style="line-height:10px"><a href="https://megacompuworld.in/" style="outline:none" tabindex="-1" target="_blank"><img alt="Logo" src="http://megacompuworld.in/image/logo_email.png" style="display: block; height: auto; border: 0; width: 100px; max-width: 100%;" title="Logo" width="187"/></a></div>
</td>
</tr>
</table>
</td>
<td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
<div class="spacer_block" style="height:5px;line-height:5px;font-size:1px;"> </div>
<div class="spacer_block mobile_hide" style="height:55px;line-height:55px;font-size:1px;"> </div>
<table border="0" cellpadding="0" cellspacing="0" class="menu_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="color:#000000;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:14px;padding-bottom:10px;padding-top:15px;text-align:right;">
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="text-align:right;font-size:0px;">
<!--[if !mso]><!--><input class="menu-checkbox" id="menu012" style="display:none !important;max-height:0;visibility:hidden;" type="checkbox"/>
<!--<![endif]-->
<div class="menu-trigger" style="display:none;max-height:0px;max-width:0px;font-size:0px;overflow:hidden;"><label class="menu-label" for="menu012" style="height: 36px; width: 36px; display: inline-block; cursor: pointer; mso-hide: all; user-select: none; align: right; text-align: center; color: #ffffff; text-decoration: none; background-color: #3fb9bc; border-radius: 50%;"><span class="menu-open" style="mso-hide:all;font-size:26px;line-height:36px;">☰</span><span class="menu-close" style="display:none;mso-hide:all;font-size:26px;line-height:36px;">✕</span></label></div>
<div class="menu-links">
<!--[if mso]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" style="">
<tr>
<td style="padding-top:20px;padding-right:20px;padding-bottom:15px;padding-left:20px">
<![endif]--><span class="label" style="padding-top:20px;padding-bottom:15px;padding-left:20px;padding-right:20px;display:inline;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:14px;color:false;letter-spacing:normal;">BOARD</span>
<!--[if mso]></td><td><![endif]--><span class="sep" style="font-size:14px;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;color:#000000;">-</span>
<!--[if mso]></td><![endif]-->
<!--[if mso]></td><td style="padding-top:20px;padding-right:20px;padding-bottom:15px;padding-left:20px"><![endif]--><span class="label" style="padding-top:20px;padding-bottom:15px;padding-left:20px;padding-right:20px;display:inline;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:14px;color:false;letter-spacing:normal;">JOBS</span>
<!--[if mso]></td><td><![endif]--><span class="sep" style="font-size:14px;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;color:#000000;">-</span>
<!--[if mso]></td><![endif]-->
<!--[if mso]></td><td style="padding-top:20px;padding-right:20px;padding-bottom:15px;padding-left:20px"><![endif]--><span class="label" style="padding-top:20px;padding-bottom:15px;padding-left:20px;padding-right:20px;display:inline;font-family:"Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif;font-size:14px;color:false;letter-spacing:normal;">CONTACTS</span>
<!--[if mso]></td></tr></table><![endif]-->
</div>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e8f4dc;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top; background-color: #e8f4dc; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="Alternate text" class="big" src="https://megacompuworld.in/image/mail/job.png" style="display: block; height: auto; border: 0; width: 640px; max-width: 100%;" title="Alternate text" width="640"/></div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:5px;padding-left:20px;padding-right:10px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #3fb9bc; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:50px;"><strong>Thank You For Your Order</strong></span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:30px;padding-left:15px;padding-right:15px;padding-top:15px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;">We Will Ship Your Order Soon and Send You an Email.</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="Alternate text" class="big" src="https://megacompuworld.in/image/mail/top.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Alternate text" width="680"/></div>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #e8f4dc;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top; background-color: #ffffff; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-left: 25px; padding-right: 25px; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #3fb9bc; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px;"><span style="font-size:22px;color:#3fb9bc;">Items Overview :</span></p>
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

' . $itemdata . '

<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-13" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f3f7f2;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 35px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="Alternate text" class="big" src="https://megacompuworld.in/image/mail/bottom.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Alternate text" width="680"/></div>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-14" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 35px; padding-bottom: 15px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td>
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #3fb9bc; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:34px;"><strong>Order Details</strong></span></p>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-15" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #232132; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:18px;"><strong>Order ID</strong></span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #808080; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="font-size:14px;">' . $order_number . '
</span></p>
</div>
</div>
</td>
</tr>
</table>
</td>
<td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">

<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #232132; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:18px;"><strong>Order Date</strong></span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #808080; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="font-size:14px;">' . $today . '
</span></p>
</div>
</div>
</td>
</tr>
</table>
</td>
<td class="column column-3" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="33.333333333333336%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #232132; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:18px;"><strong>Order Total</strong></span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:15px;padding-left:10px;padding-right:10px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #808080; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="font-size:14px;">' . $total_price . '
</span></p>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-16" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<div class="spacer_block" style="height:25px;line-height:25px;font-size:1px;"> </div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-17" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="Image" class="big" src="https://megacompuworld.in/image/mail/blue-top.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Image" width="680"/></div>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-18" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #3fb9bc; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;">
<div style="font-family: sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Oswald, Arial, Helvetica Neue, Helvetica, sans-serif;">
<p style="margin: 0; font-size: 14px; text-align: center;"><span style="font-size:28px;color:#ffffff;">Shipping Address</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #e8f4dc; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;color:#e8f4dc;">' . $name . '</span></p>
</div>
</div>
</td>
</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
<tr>
<td style="padding-bottom:10px;padding-left:10px;padding-right:10px;">
<div style="font-family: Arial, sans-serif">
<div class="txtTinyMce-wrapper" style="font-size: 12px; font-family: "Roboto Slab", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 18px; color: #808080; line-height: 1.5;">
<p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="font-size:14px;color:#ffffff;">' . $address . '</span></p>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-19" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td style="width:100%;padding-right:0px;padding-left:0px;">
<div align="center" style="line-height:10px"><img alt="Image" class="big" src="https://megacompuworld.in/image/mail/blue-bottom.png" style="display: block; height: auto; border: 0; width: 680px; max-width: 100%;" title="Image" width="680"/></div>
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
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-20" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tbody>
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;" width="680">
<tbody>
<tr>
<td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
<table border="0" cellpadding="10" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
<tr>
<td>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="184px">
<tr>
<td style="padding:0 7px 0 7px;"><a href="http://www.example.com/" target="_blank"><img alt="Facebook" height="32" src="https://megacompuworld.in/image/mail/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
<td style="padding:0 7px 0 7px;"><a href="http://www.example.com/" target="_blank"><img alt="Twitter" height="32" src="https://megacompuworld.in/image/mail/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
<td style="padding:0 7px 0 7px;"><a href="http://www.example.com/" target="_blank"><img alt="LinkedIn" height="32" src="https://megacompuworld.in/image/mail/linkedin2x.png" style="display: block; height: auto; border: 0;" title="LinkedIn" width="32"/></a></td>
<td style="padding:0 7px 0 7px;"><a href="http://www.example.com/" target="_blank"><img alt="YouTube" height="32" src="https://megacompuworld.in/image/mail/youtube2x.png" style="display: block; height: auto; border: 0;" title="YouTube" width="32"/></a></td>
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
</html>
        ';
        $headers .= 'From: <info@megacompuworld.in>' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      if(mail($toEmail, $subject, $content, $headers)) {
        
         unset($_SESSION["cart_item"]);
        unset($_SESSION['user_id']);
     
         header("Location: order-complete.php?order_number=".$order_number);exit(); } }
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
       @media (max-width: 850px){
            .img{
                    max-width: 319px !important;
            }
        }
    </style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
  <!-- breadcrumb start -->
        <section class="about-breadcrumb">
            <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="about-l">
                                <ul class="about-link">
                                    <li class="go-home"><a href="index1.html">Home</a></li>
                                    <li class="about-p"><span>Your checkout</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb end -->
        <!-- checkout page start -->
        <section class="section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="checkout-area">
                            <div class="billing-area">
                                <form method="POST" action="">
                                    <h2>Billing details</h2>
                                    <div class="billing-form">
                                        <p><?php if(isset($error)) {
                                               echo '<p style="color:red;">'. $error .'</p>';
                                              }?></p>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Full name</label>
                                                <input type="text" name="name" value="<?php  if(isset($_SESSION['mcw_username'])) { echo $_SESSION['mcw_username'];  } ?>" placeholder="First name">
                                            </li>
                                        </ul>
                                         <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Email address</label>
                                                <input type="text" name="email" value="<?php  if(isset($_SESSION['mcw_useremail'])) { echo $_SESSION['mcw_useremail'];  } ?>" placeholder="Email address">
                                            </li>
                                             </ul>
                                         <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Phone</label>
                                                <input type="text" value="<?php  if(isset($_SESSION['mcw_mobile'])) { echo $_SESSION['mcw_mobile'];  } ?>" name="phone" placeholder="Phone">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Refrence Number (If Pay With OR Code)</label>
                                                <input type="text" name="refrence" value="<?php  if(isset($_POST['refrence'])) { echo $_POST['refrence'];  } ?>" placeholder="Refrence number" required>
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Town / City</label>
                                                <input type="text" name="city" value="<?php  if(isset($_SESSION['mcw_city'])) { echo $_SESSION['mcw_city'];  } ?>" placeholder="Town / City">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="comment-area">
                                                <label>Address</label>
                                                <textarea name="address" rows="2" placeholder="Address" cols="80" style="width: 100%;"><?php  if(isset($_SESSION['mcw_address'])) { echo $_SESSION['mcw_address'];  } ?></textarea>
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Postcode / ZIP</label>
                                                <input type="text" name="zip" value="<?php  if(isset($_SESSION['mcw_pin'])) { echo $_SESSION['mcw_pin'];  } ?>" placeholder="Town / City">
                                            </li>
                                        </ul>
                                       <ul class="shipping-form">
                                           <br>
                                           <h2>Shipping details</h2>
                                            <br><li class="check-box">
                                                <input type="checkbox"  name="billingtoo" onclick="FillBilling(this.form)">
                                                <label for="billingtoo">Ship to a different address?</label>
                                            </li> </ul>
                                             <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Town / City</label>
                                                <input type="text" name="scity" placeholder="Shipping Town / City">
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="comment-area">
                                                <label>Address</label>
                                                <textarea name="saddress" rows="2" placeholder="Shipping Address" cols="80" style="width: 100%;"></textarea>
                                            </li>
                                        </ul>
                                        <ul class="billing-ul">
                                            <li class="billing-li">
                                                <label>Postcode / ZIP</label>
                                                <input type="text" name="szip" placeholder="Shipping Postcode / ZIP">
                                            </li>
                                        </ul>
                                    </div>
                                
                            </div>
                             <?php
                                    if(isset($_SESSION["cart_item"])){
                                        $total_quantity = 0;
                                        $total_price = 0;  

                                  ?>
                            <div class="order-area">
                                 <div class="check-pro">
                                    <h2>Payment Options</h2>
                                    <ul class="check-ul">
                                      <li class="">
                                   <span><input type="checkbox" name="check"  id="chkPassport"  onclick="onlyOne(this)" >
                                     <label for="qr"> Pay by QR Code</label></span>
                                    </li> 
                                        <li class="" id="AddPassport">
                                   <span><input type="checkbox" name="check" id="cod" onclick="pay(this.form)" required>
                                     <label for="cod">COD Payment</label></span>
                                    </li>
                                     
                                    <li id="dvPassport" style="display: none">
                                    <div class="check-pro-img">
                                    <img src="image/qr/payment.jpeg" class="img" alt="image" style="max-width: 404px;">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="check-pro">
                                    <h2>In your cart (<?php echo $total_quantitys; ?>)</h2>
                                    <ul class="check-ul">
                                         <?php      foreach ($_SESSION["cart_item"] as $item){
                                         $item_price = $item["quantity"]*$item["sell_price"];
                                        ?>
                                        <li>
                                            <div class="check-pro-img">
                                                <a href="product-details.php?p_id=<?php echo $item["p_id"]; ?>"><img src="admin/products/<?php echo $item["img1"]; ?>" class="img-fluid" alt="image"></a>
                                            </div>
                                            <div class="check-content">
                                                <a href="product-details.php?p_id=<?php echo $item["p_id"]; ?>"><?php echo $item["name"]; ?></a>
                                                <span class="check-code-blod"> Quantity : <span><?php echo $item["quantity"]; ?></span></span>
                                                <span class="check-price"><?php echo "₹ ". number_format($item_price,2); ?></span>
                                            </div>
                                        </li>
                                         <?php   
                                           $total_quantity += $item["quantity"];
                                        $total_price += ($item["sell_price"]*$item["quantity"]);
                                            }    ?>
                                          <?php    } else {     ?>
                                         <div class="row">
                                                      <div class="col-xs-12 col-sm-12">
                                                           <strong class="product-name text-center">Your Cart is Empty</strong>
                                                      </div>
                                                   
                                                    </div>
                                        <?php  }    ?>
                                    </ul>
                                </div>
                                <h2>Your order</h2>
                                <ul class="order-history">
                                    <li class="order-details">
                                       
                                        <span>CART SUBTOTAL :</span>
                                        <span><?php if (isset($total_price)){echo "₹ ".number_format($total_price, 2); }else {echo "₹ 0.00";}?></span>
                                    </li>
                                    <li class="order-details">
                                        <!--<span>SHIPPING :</span>-->
                                        <span style="text-align: left;font-size: small;">
                                        <input type="radio" name="ship" value="00.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">Self Pick Up</br>- <b>0 Rs</b></label></br>                                            
                                        <input type="radio" name="ship" value="30.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">Courier charges within Gujarat</br>- <b>30Rs</b> per kg</label></br>
                                        <input type="radio" name="ship" value="110.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">Transport charges within Gujarat</br>- <b>110Rs</b> per Box upto 20kg</label></br>
                                        <input type="radio" name="ship" value="100.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">Courier charges Outside Gujarat</br>- By Air- <b>100rs</b> per kg</label></br>
                                        <input type="radio" name="ship" checked value="60.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">By Road</br>- <b>60rs</b> per kg</label></br>
                                        <input type="radio" name="ship" value="300.00" onClick="refreshTotalCharge(this.value);"><label style="margin: 7px 10px;">Transport charges Outside Gujarat</br>- <b>300rs</b> per box upto 20kg</label></br>
                                       
                                        </span>
                                    </li>
                                   
                                    <li class="order-details">
                                        <span>ORDER TOTAL :</span>
                                        <span id="totalCharge"><?php if (isset($total_price)){echo "₹ ".number_format($total_price, 2); }else {echo "₹ 0.00";}?></span>
                                        <input type="hidden" name="order_final_total" value="" id="totals">
                                        <input type="hidden" name="ship" value="" id="ship">
                                    </li>
                                    <!--<li class="order-details">-->
                                    <!--    <span>Total:</span>-->
                                    <!--    <span>$323.00</span>-->
                                    <!--</li>-->
                                </ul>
                                <div class="checkout-btn">
                                    <button type="submit" name="checkout" class="btn-style1">Place order</button>
                                </div>
                            </div>
                        </div>
                      </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
    
    window.onload = function() {
              refreshTotalCharge(60.00);  
            };

  function refreshTotalCharge(value){

    const total = <?php echo $total_price; ?>;
    // sessionStorage.setItem('session_name', 'session_value'); 
     document.getElementById("ship").value= parseInt(value);
    document.getElementById("totals").value= parseFloat(total + parseInt(value)).toFixed( 2 );
    document.getElementById("totalCharge").innerHTML= "₹ "+ parseFloat(total + parseInt(value)).toFixed( 2 );
  }
  </script>
      <script>
        $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                $("#AddPassport").hide();
                
            } else {
                $("#dvPassport").hide();
                $("#AddPassport").show();
                document.getElementById("cod").disabled = false;
            }
        });
    });
    function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
        document.getElementById("cod").disabled = true;

    })
    }
</script>
</body>
</html>