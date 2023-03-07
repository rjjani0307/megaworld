<?php
  include "addtocart.php";
  include "db.php";

if (!isset($_SESSION['mcw_useremail'])) { header("location:login.php");  }


if (isset($_GET["order_number"])) {

  $sql = "SELECT * FROM `order` where order_number ='" . $_GET["order_number"] . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

 
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
      
       <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-area">
                        <div class="order-price">
                            <ul class="total-order">
                                <li>
                                    <span class="order-no">Order no. <?php echo $row['order_number']; ?></span>
                                    <span class="order-date"><?php echo $row['ord_date']; ?></span>
                                </li>
                                <li>
                                    <span class="total-price">Order total</span>
                                    <span class="amount"> <?php if (isset($row['total_amount'])){echo "₹ ".number_format($row['total_amount'], 2); }else {echo "₹ 0.00";}?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-details">
                            <span class="text-success order-i"><i class="fa fa-check-circle"></i></span>
                            <h4>Thank you for order</h4>
                            <span class="order-s">Your order will ship within few days</span>
                            <!--<a href="tracking.html" class="tracking-link btn btn-style1">Tracking details</a>-->
                        </div>
                        <div class="order-delivery">
                            <ul class="delivery-payment">
                                <li class="delivery">
                                    <h5>Delivery address</h5>
                                    <p><?php echo $row['user_name']; ?></p>
                                    <span class="order-span"><?php echo nl2br($row['address']); ?></span>
                                    <span class="order-span"><?php echo $row['city'] . " - " . $row['zip']; ?></span>
                                    <span class="order-span">Email : <?php echo $row['email']; ?></span>
                                    <span class="order-span">Mobile No : <?php echo $row['number']; ?></span>
                                </li>
                                <li class="pay">
                                    <h5>Payment summary</h5>
                                    <!--<p class="transition">Transaction No : 66282856617</p>-->
                                    <span class="order-span p-label">
                                        <span class="n-price">Price</span>
                                        <span class="o-price"> <?php if (isset($row['total_amount'])){
                                        $total_price = $row['total_amount'];
                                        $total_price = $total_price-60;

                                        echo "₹ ".number_format($total_price, 2); }else {echo "₹ 0.00";}?></span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">Shipping charge</span>
                                        <span class="o-price">₹ <?php echo $row['ship']; ?></span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">Order Total</span>
                                        <span class="o-price"> <?php if (isset($row['total_amount'])){echo "₹ ".number_format($row['total_amount'], 2); }else {echo "₹ 0.00";}?></span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <section class="cart-page section-b-padding" style="border-top: 1px solid #eee;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
              <?php 
                      $product_name =  explode(',', $row['product_name']);
                       $quantity =  explode(',', $row['quantity']);
                        $product_code =  explode(',', $row['product_code']);
                         $img1 =  explode(',', $row['product_img']);
                            $price =  explode(',', $row['price']);
                         foreach( $product_code as $index => $product_code ) {  ?>
                        <div class="cart-area">
                            <div class="cart-details">
                                <div class="cart-all-pro">
                                    <div class="cart-pro">
                                        <div class="cart-pro-image">
                                            <a><img src="admin/products/<?php echo $img1[$index]; ?>" class="img-fluid" width="70px" alt="<?php echo $product_name[$index]; ?>"></a>
                                        </div>
                                        <div class="pro-details">
                                            <h4><a><?php echo $product_name[$index]; ?></a></h4>
                                            <span class="pro-size">Product Code : <?php echo $product_code; ?></span>
                                            <span class="pro-shop">Quantity : <?php echo $quantity[$index]; ?></span>
                                            <span class="cart-pro-price"> <?php  ?></span>
                                        </div>
                                    </div>
                                    <div class="all-pro-price">
                                        <span><?php echo "₹ ". number_format($price[$index],2); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php     }    ?>
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
<?php  }else{

      header("location:index.php");

} ?>