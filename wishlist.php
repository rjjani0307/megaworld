<?php
  include "addtocart.php";
                                                 
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
        #btn4{
      width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
        }
    </style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
           <section class="about-breadcrumb">
                <div class="about-back section-b-padding" style="background-color: #f2f2f2">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <h5 class="text-center" style="padding-top: 60px;">Your Wishlist</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb end -->
        <!-- cart start -->
        <section class="cart-page section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                                    <?php
                                    if(isset($_SESSION["add_wishlist"])){
                                        $total_quantity = 0;
                                        $total_price = 0;
                                      
                                        foreach ($_SESSION["add_wishlist"] as $item){
                                         $item_price = $item["quantity"]*$item["sell_price"];
                                        ?>
                        <div class="cart-area">
                            <div class="cart-details">
                                <div class="cart-all-pro">
                                    <div class="cart-pro">
                                        <div class="cart-pro-image">
                                            <a href="product-details.php?p_id=<?php echo $item["p_id"]; ?>"><img src="admin/products/<?php echo $item["img1"]; ?>" class="img-fluid" width="150px" style="max-width: 50%;" alt="<?php echo $item["name"]; ?>"></a>
                                        </div>
                                        <div class="pro-details">
                                            <h4><a href="product-details.php?p_id=<?php echo $item["p_id"]; ?>"><?php echo $item["name"]; ?></a></h4>
                                            <span class="pro-size"><span class="size">Quantity : </span> <?php echo $item["quantity"]; ?></span>
                                            <span class="pro-shop"></span>
                                            <span class="cart-pro-price"> <?php echo "₹ ".$item["sell_price"]; ?></span>
                                        </div>
                                    </div>
                                    <div class="qty-item">
                                        <div class="center">
                                            <a href="wishlist.php?action=add&actions=remove&quantity=1&p_id=<?php echo $item["p_id"]; ?>" class="pro-remove" style="text-decoration: none;">Add to Cart &nbsp;<i class="fa fa-shopping-bag"></i></a>
                                            <a href="wishlist.php?actions=remove&p_id=<?php echo $item["p_id"]; ?>" class="pro-remove" style="text-decoration: none;">Remove &nbsp;<i class="fa fa-remove"></i></a>
                                        </div>
                                    </div>
                                    <div class="all-pro-price">
                                        <span><?php echo "₹ ". number_format($item_price,2); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php
                                        $total_quantity += $item["quantity"];
                                        $total_price += ($item["sell_price"]*$item["quantity"]);
                                        }    ?>
                                          <?php    } else {     ?>
                                         <div class="row">
                                                      <div class="col-xs-12 col-sm-12" style=" text-align: center;">
                                                           <strong class="product-name text-center">Your Wishlist is Empty</strong>
                                                      </div>
                                                   
                                                    </div>
                                        <?php  }    ?>
                        
                    </div>
                  
                </div>
            </div>
        </section>
        <!-- cart end -->
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