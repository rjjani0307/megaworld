<?php
include "db.php";
session_start();

  $userid = $_SESSION['mcw_id'];
  
    if(isset($_POST["edit_profile"])){  
      $firmname = $_POST["firmname"];
      $org = $_POST["org"];
      $gst = $_POST["gst"];
      $pan = $_POST["pan"];
      $cnumber = $_POST["cnumber"];
      $mobile = $_POST["mobile"];
      $email = $_POST["email"];
      $city = $_POST["city"];
      $pin = $_POST["pin"];
      $state = $_POST["state"];
      $country = $_POST["country"];
      $add1 = $_POST["add1"];
      $add2 = $_POST["add2"];
  
         $sql = "UPDATE `users` SET `name`='$firmname',`org`='$org',`gst`='$gst',`pan`='$pan',`add1`='$add1',`add2`='$add2',`city`='$city',`pin`='$pin',`state`='$state',`country`='$country',`c_number`='$cnumber',`mobile`='$mobile',`email`='$email' WHERE `user_id` = '$userid'";
          $result = mysqli_query($conn,$sql);  
         
          if($result){  
      
                ?> <script>alert('Profile Updated Successfully');
                 window.location= "edit-profile.php";</script> <?php
              }else{  
             ?> <script>alert('Try Again !');</script> <?php
          } 
         
        } 

    if(isset($_POST["edit_user"])){  
      $cname = $_POST["cname"];
      $fullname = $_POST["fullname"];
      $address = $_POST["address"];
      $omobile = $_POST["omobile"];
      $oemail = $_POST["oemail"];
  
         $sql = "UPDATE `users` SET `c_name`='$cname',`fullname`='$fullname',`address`='$address',`o_number`='$omobile',`o_email`='$oemail' WHERE `user_id` = '$userid'";
          $result = mysqli_query($conn,$sql);  
         
          if($result){  
      
                ?> <script>alert('Owner Information Updated Successfully');
                 window.location= "edit-profile.php";</script> <?php
              }else{  
             ?> <script>alert('Try Again !');</script> <?php
          } 
         
        } 

 
    $view="select * from `users` WHERE `user_id` = '$userid'";
     $exe_view=mysqli_query($conn, $view);

        while($result=mysqli_fetch_array($exe_view)){ 
            
            $prod_name = $result['name'];
            $user_org = $result['org'];
            $user_gst = $result['gst'];
            $user_pan = $result['pan']; 
            $user_add1 = $result['add1'];
            $user_add2 = $result['add2'];
            $user_city = $result['city'];
            $user_pin = $result['pin'];
            $user_state = $result['state'];
            $user_country = $result['country'];
            $user_c_number = $result['c_number'];
            $user_mobile = $result['mobile'];
            $user_email = $result['email'];
            $user_c_name = $result['c_name'];
            $user_fullname = $result['fullname'];
            $user_address = $result['address'];
            $user_o_email = $result['o_email'];
             $user_o_number = $result['o_number'];
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
        .textarea{
            width: 100%;
            font-size: 13px;
            margin-top: 10px;
            border: 1px solid #eee;
          }
    </style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
      <section class="contact section-tb-padding" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="billing-area">
                            <div class="billing-title">
                                <h4>Edit Your Profile Details</h4>
                            </div>
                            <form method="POST">
                            <div class="billing-address-1">
                                <ul class="country-info">
                                    <li class="billing-country">
                                        <label>Firm Company Name</label>
                                        <input type="text" name="firmname" placeholder="Firm Company Name" value="<?php echo $prod_name; ?>">
                                    </li>
                                     <li class="billing-country">
                                         <label>Organization </label>
                                        <select name="org" >
                                            <option value="<?php echo $user_org; ?>"><?php echo $user_org; ?> (Current)</option>
                                            <option value="Proprietorship">Proprietorship</option>
                                             <option value="Partnership">Partnership</option>
                                              <option value="LLP">LLP</option>
                                               <option value="Private Limited">Private Limited</option>
                                                <option value="Limited">Limited</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="add-name">
                                    <li class="billing-name">
                                        <label>GST Number </label>
                                        <input type="text" name="gst" placeholder="GST Number" value="<?php echo $user_gst; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>PAN Number</label>
                                        <input type="text" name="pan" placeholder="PAN Number" value="<?php echo $user_pan; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>Company Number </label>
                                        <input type="text" name="cnumber" placeholder="Company Number" value="<?php echo $user_c_number; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>Mobile Number</label>
                                        <input type="text" name="mobile" placeholder="Mobile Number" value="<?php echo $user_mobile; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Email id" value="<?php echo $user_email; ?>">
                                    </li>
                                    <li class="billing-name">
                                       <label>City </label>
                                        <input type="text" name="city" placeholder="City " value="<?php echo $user_city; ?>">
                                    </li>
                                    <li class="billing-name">
                                         <label>Pincode </label>
                                        <input type="text" name="pin" placeholder="Pincode " value="<?php echo $user_pin; ?>">
                                    </li>
                                    <li class="billing-name">
                                         <label>State </label>
                                        <input type="text" name="state" placeholder="State" value="<?php echo $user_state; ?>"  >
                                    </li>
                                    <li class="billing-name">
                                        <label>Country </label>
                                        <input type="text" name="country" placeholder="State" value="<?php echo $user_country; ?>"  >
                                    </li> 
                                    <li class="billing-name">
                                        <label>Business Address 1</label>
                                        <input type="text" name="add1" placeholder="Business Address 2" value="<?php echo $user_add1; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>Business Address 2</label>
                                        <input type="text" name="add2" placeholder="Business Address 2" value="<?php echo $user_add2; ?>">
                                    </li>
                                </ul>
          
                            <div class="next-button">
                                <button type="submit" name="edit_profile" class="btn-style1">Submit</button>
                            </div>
                          </div>
                        </form>
                            <div class="billing-title section-t-padding">
                                <h4>Owner Information</h4>
                            </div>                             
                        <form method="POST">
                            <div class="billing-address-1">
                                <ul class="add-name">
                                    <li class="billing-name">
                                        <label>Company Name</label>
                                        <input type="text" name="cname" placeholder="Company Name" value="<?php echo $user_c_name; ?>">
                                    </li> 
                                    <li class="billing-name">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" placeholder="Full name" value="<?php echo $user_fullname; ?>">
                                    </li>
                                </ul>
                                <ul class="add-name">
                                    <li class="billing-name">
                                        <label>Address</label>
                                        <input type="text" name="address" placeholder="Address" value="<?php echo $user_address; ?>">
                                    </li>
                                    <li class="billing-name">
                                        <label>Mobile Number</label>
                                        <input type="text" name="omobile" placeholder="Mobile Number" value="<?php echo $user_o_number; ?>">
                                    </li>
                                     <li class="billing-name">
                                        <label>Email Id</label>
                                        <input type="text" name="oemail" placeholder="Email Id" value="<?php echo $user_o_email; ?>">
                                    </li>
                                </ul>
                            </div>
                            <div class="next-button">
                               <button type="submit" name="edit_user" class="btn-style1">Submit</button>
                            </div>
                          </form>   
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