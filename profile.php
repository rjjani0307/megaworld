<?php
include "db.php";
session_start();

  
   if (!isset($_SESSION['mcw_useremail'])) { header("location:login.php");  }

    $user_id = $_SESSION["mcw_id"];
  
     //reset password 

      if(isset($_POST['reset_pwd'])){
        
      $user_id = $_SESSION["mcw_id"];
      $pwd = $_POST["pwd"];
      $cpwd = $_POST["cpwd"];
      
         if ($pwd == $cpwd && !empty($pwd) && !empty($cpwd)) {
         $query = "UPDATE `users` SET `pwd`= '$pwd' WHERE user_id = '" . $user_id . "'";
          $exec= mysqli_query($conn,$query);
            if ($exec) {

            ?> <script>alert('Password Updated ');
          window.location="profile.php";</script> <?php
            
             unset($_POST);
        }else{   
                 ?>   <script>alert('Try again !');
                      window.location="profile.php";</script>   <?php
             }
         }else{   
                 ?>   <script>alert('Passwords are not same / Try Again ! ');</script>   <?php
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
        
        <!-- faq's collapse start -->
        <section class="shipping-area section-tb-padding" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="account-title">
                            <h1>Welcome,  <?php echo $_SESSION['mcw_username']; ?></h1>
                        </div>
                        <div class="account-area">
                            <div class="account">
                                <h4>My account</h4>
                                <ul class="page-name">
                                    <li class="register-id"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#resetModal">Change Password</a></li>
                                    <li class="register-id"><a href="edit-profile.php">Edit Profile</a></li>
                                    <!--<li class="register-id"><a href=""  class="w-c-q-icn" ><i class="fa fa-eye"></i></a></li>-->
                                </ul>
                            </div>
                            <div class="account-detail">
                                <h4>Account details</h4>
                                <ul class="a-details">
                                    <li>PAN: <?php echo $_SESSION['mcw_pan']; ?></li>
                                    <li>GST: <?php echo $_SESSION['mcw_gst']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-details">
                             <?php 
              $view="SELECT * FROM `order` WHERE user_id = '$user_id' ORDER BY id desc";
              $exe_view=mysqli_query($conn, $view);
               if ($exe_view->num_rows > 0){
                   ?>
     <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="">
                        <div class="profile-wishlist">
                            
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-item" style="border-bottom:none;">
                                        <span class="wishlist-head">Order history :</span>
                                        <!--<span class="wishlist-items">3 item</span>-->
                                    </div>
                                </div>
                            </div>
                            <?php
                      while($row=mysqli_fetch_array($exe_view))
                        {     
                            $pname = explode(',', $row['product_name']);
                            $pimg  = explode(',', $row['product_img']);
                             $pid  = explode(',', $row['product_code']);
                             $pr_id = array_shift($pid);
                     ?>
                             
                            <div class="wishlist-area">
                                <div class="wishlist-details">
                                    <div class="wishlist-all-pro">
                                        <div class="wishlist-pro">
                                            <div class="wishlist-pro-image">
                                                <a href="product-details.php?p_id=<?php echo $pr_id; ?>"><img src="admin/products/<?php echo array_shift($pimg); ?>" class="" alt="image" width="100px"></a>
                                            </div>
                                            <div class="pro-details">
                                            <h4><a href="product-details.php?p_id=<?php echo $pr_id; ?>"><?php echo array_shift($pname); ?></a></h4>
                                                <span class="all-size">Date: <span class="pro-size"></i><?php echo $row['ord_date']; ?></span></span>
                                                <span class="wishlist-text"><?php echo nl2br($row['address']); ?></span><br>
                                                <span class="wishlist-text"><?php echo $row['city'] . ' - ' . $row['zip']; ?></span>
                                            </div>
                                        </div>
                                        <div class="qty-item">
                                            <a href="order-details.php?ord_no=<?php echo $row['order_number']; ?>" class="add-wishlist"><?php echo $row['order_number']; ?></a>
                                            <a href="order-details.php?ord_no=<?php echo $row['order_number']; ?>" class="add-wishlist">Order Details</a>
                                        </div>
                                        
                                        <div class="all-pro-price">
                                            <span class="new-price"><?php echo  "₹ ". number_format($row['total_amount'],2); ?></span>
                                            <span class="old-price"><?php echo $row['status']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
             <?php   } 
              }else{   echo "<p>You haven't placed any orders yet.</p>";  } 
              ?>                
                       
                 </div>    
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq's collapse end -->
         <section class="quick-view">
            <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="quick-veiw-area">
                         <div class="billing-area">
                             <form method="POST" action="">
                            <div class="billing-address-1" style="border: none;">                           
                                <ul class="add-name">
                                    <li class="billing-name" style="width: 100%;">
                                        <label>New Password</label>
                                        <input type="text" id="new_pwd" name="pwd" placeholder="enter new password" required>
                                    </li>
                                    <li class="billing-name" style="width: 100%;">
                                        <label>Confirm Password</label>
                                        <input type="text" id="re_pwd" name="cpwd" placeholder="enter confirm password" required>
                                        <span id='message'></span>
                                    </li>
                                     <li class="billing-name">
                                    <button type="submit" class="btn-style1" name="reset_pwd">Reset</button>
                                    </li>
                                </ul>
                            </div>
                           </form>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script>
      // Password Matching
      $('#new_pwd, #re_pwd').on('keyup', function () {
        if ($('#new_pwd').val() == $('#re_pwd').val()) {
            $('#message').html('Password Are Matched').css('color', 'green');
        } else 
            $('#message').html('Passwords Are Not Matching').css('color', 'red');
        });
      </script>
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