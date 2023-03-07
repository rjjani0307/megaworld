<?php

include "db.php";
 include "addtocart.php";
 
 if (isset($_POST['contact'])) {

  $email = $_POST['email'];
  $contact_query = "INSERT INTO `contact_us`(`name`,`email`) VALUES  ('Subscriber', '$email')";

      $contact_run= mysqli_query($conn,$contact_query);
       if($contact_run){ 
             
              ?> <script>alert('Thank You For Connecting With Us.');
              window.location.replace(window.location.href);</script> <?php 
            }else{
              ?> <script>alert('Please Try Again ! OR Change Email ID');</script> <?php
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
            .t-banner1 .home-offer-banner .o-t-banner .o-t-content a {
    margin-top: 181px;
}
        </style>
    </head>
    <body class="home-1" style="background-color: lightblue;">
        <!-- top notificationbar start -->
  
        
        <!-- header start -->
     <?php include "header.php";  ?>
        <!-- header end -->

      

        <!--home page slider start-->
        <section class="slider">
            <div class="home-slider owl-carousel owl-theme">
                 <?php 
                                $product_view="select * from `banner` WHERE status= 1 ORDER BY id desc";
                                $exe_product= mysqli_query($conn, $product_view);
                                while($rows2 = mysqli_fetch_array($exe_product))
                                                    {    ?>
                <div class="items">
                <div class="img-back" style="background-image:url(admin/banners/<?php echo $rows2['image']; ?>);">
                       <div class="h-s-content slide-c-c">
                            <!--<span>Top selling!</span>
                           <h1><?php //echo $rows2['name']; ?></h1>-->
                            <a href="<?php echo $rows2['link']; ?>" class="btn btn-style1">Shop Now</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
               
            </div>
        </section>
        <!--home page slider start-->
         <section class="h-t-products1 section-t-padding section-b-padding" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Hot Deals</h2>
                        </div>
                        <div class="trending-products owl-carousel owl-theme">
                            <?php 
                                $product_view="select * from `hot_deals` WHERE status= 1 ORDER BY id desc limit 12";
                                $exe_product= mysqli_query($conn, $product_view);
                                while($rows1 = mysqli_fetch_array($exe_product))
                                                    {    ?>
                            <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="<?php echo $rows1['url']; ?>">
                                            <img class="img-fluid" src="admin/hot_deals/<?php echo $rows1['image']; ?>" alt="<?php echo $rows1['name']; ?>">
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        <span class="p-discount">HOT</span>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="<?php echo $rows1['url']; ?>"><?php echo $rows1['name']; ?></a></h3>
                                </div>
                            </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner end -->
        <!-- Category image slide -->
        <section class="category-img1 section-t-padding section-b-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Shop by category</h2>
                        </div>
                        <div class="home-category owl-carousel owl-theme">
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Electronics" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/electronics.jpg" alt="cate-image">
                                            <span class="cat-title">Electronics</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Electronics</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Desktop" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/dasktop.jpg" alt="cate-image">
                                            <span class="cat-title">Desktop</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Desktop</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Laptop" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/laptop.png" alt="cate-image">
                                            <span class="cat-title">Laptop</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Laptop</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Display" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/display.jpg" alt="cate-image">
                                            <span class="cat-title">Display</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Display</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Peripherals" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/peripherals.jpg" alt="cate-image">
                                            <span class="cat-title">Peripherals</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Peripherals</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Scanner | Printer" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/printer.jpg" alt="cate-image">
                                            <span class="cat-title">Scanner & Printer</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Scanner & Printer</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Networking" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/networking.jpg" alt="cate-image">
                                            <span class="cat-title">Networking</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Networking</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Security" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/securitys.png" alt="cate-image">
                                            <span class="cat-title">Security</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Security</span>
                                </div>
                            </div>
                            <div class="items">
                                <div class="h-cate">
                                    <div class="c-img">
                                        <a href="category.php?cat=Software" class="home-cate-img">
                                            <img class="img-fluid" src="image/category-image/home-1/software.jpg" alt="cate-image">
                                            <span class="cat-title">Software</span>
                                        </a>
                                    </div>
                                    <span class="cat-num">Software</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category image slide -->
        <!-- Our Products Tab start -->
        <section class="our-products-tab section-tb-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                         <div class="section-title">
                            <h2>Our Trending products</h2>
                        </div>
                        <div class="tab-content pro-tab-slider">
                            <div class="tab-pane fade show active">
                                <div class="home-pro-tab swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php 
                                $product_view="select * from `product` WHERE status='1' ORDER BY id desc limit 10";
                                $exe_product= mysqli_query($conn, $product_view);
                                while($rows = mysqli_fetch_array($exe_product))
                                                    {    ?>
                                        <div class="swiper-slide">
                                            <div class="h-t-pro">
                                                <div class="tred-pro">
                                                    <div class="tr-pro-img">
                                                        <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>">
                                                            <img src="admin/products/<?php echo $rows['img1']; ?>" alt="pro-img1" class="img-fluid">
                                                            <?php
                                                            $image2 = $rows['img2'];
                                                            if($image2 == NULL){
                                                            ?>
                                                            <img src="admin/products/<?php echo $rows['img2']; ?>" alt="additional image" class="img-fluid additional-image">
                                                        <?php } ?>
                                                        </a>
                                                    </div>
                                                    <div class="Pro-lable">
                                                        <span class="p-text">New</span>
                                                    </div>
                                                    <div class="pro-icn">
                                                        <a href="index.php?actions=add&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                                        <a href="index.php?action=add&quantity=1&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                                        <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"  class="w-c-q-icn" ><i class="fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <h3><a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"><?php echo $rows['name']; ?></a></h3>
                                            
                                                   <div class="pro-price">
                                                        <span class="new-price">₹ <?php echo $rows['price']; ?> INR</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <?php } ?>
                                        
                                       
                                    </div>
                                </div>
                                <div class="swiper-buttons">
                                    <div class="content-buttons">
                                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                        <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Products Tab end -->
      
        <!-- quick veiw start -->
        <section class="quick-view">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Product quickview</h5>
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="quick-veiw-area">
                            <div class="quick-image">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="image-1">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-2">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/prro-page-image01.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-3">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image1-1.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-4">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image1.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-5">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image2.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-6">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image2-2.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-7">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image3.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                    <div class="tab-pane fade show" id="image-8">
                                        <a href="javascript:void(0)" class="long-img">
                                            <img src="image/pro-page-image/pro-page-image03.jpg" class="img-fluid" alt="image">
                                        </a>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                                    <li class="nav-item items">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img src="image/pro-page-image/image1.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img src="image/pro-page-image/image2.jpg" class="img-fluid" alt="iamge"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img src="image/pro-page-image/image3.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img src="image/pro-page-image/image4.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img src="image/pro-page-image/image5.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img src="image/pro-page-image/image6.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img src="image/pro-page-image/image8.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                    <li class="nav-item items">
                                        <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img src="image/pro-page-image/image7.jpg" class="img-fluid" alt="image"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="quick-caption">
                                <h4>Fresh organic reachter</h4>
                                <div class="quick-price">
                                    <span class="new-price">$350.00 USD</span>
                                    <span class="old-price"><del>$399.99 USD</del></span>
                                </div>
                                <div class="quick-rating">
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star c-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="pro-description">
                                    <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
                                </div>
                                <div class="pro-size">
                                    <label>Size: </label>
                                    <select>
                                        <option>1 ltr</option>
                                        <option>3 ltr</option>
                                        <option>5 ltr</option>
                                    </select>
                                </div>
                                <div class="plus-minus">
                                    <span>
                                        <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                        <input type="text" name="name" value="1">
                                        <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                    </span>
                                    <a href="cart.html" class="quick-cart"><i class="fa fa-shopping-bag"></i></a>
                                    <a href="wishlist.html" class="quick-wishlist"><i class="fa fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- quick veiw end -->
        <!-- Blog start -->
        <section class="section-tb-padding blog1">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Our Blogs</h2>
                        </div>
                        <div class="home-blog owl-carousel owl-theme">
                            <?php 
                                $review_view="select * from `blog` ORDER BY id desc limit 5";
                                $exe_review= mysqli_query($conn, $review_view);
                                while($row = mysqli_fetch_array($exe_review))
                                        //$i=1;
                                                    {    ?>
                            <div class="items">
                                <div class="blog-start">
                                    <div class="blog-image">
                                        <a href="blog-details.php?id=<?php echo $row['id']; ?>">
                                            <img src="admin/blog/<?php echo $row['image']; ?>" alt="blog-image" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-title">
                                            <h6><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h6>
                                        </div>
                                        <p class="blog-description">
                                            <?php  
                                           $cont = $row['content'];
                                            $result = substr("$cont", 0, 80);
                                            echo $result;
                                            ?>...</p>
                                        <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="read-link">
                                            <span>Read more</span>
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                        <!--div class="blog-date-comment">
                                            <span class="blog-date">8 Jan 2021</span>
                                           
                                        </div-->
                                    </div>
                                </div>
                            </div><?php }  ?>
                        </div>
                        <div class="all-blog">
                            <a href="all-blogs.php" class="btn btn-style1">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog end -->
        <!-- News Letter start -->
        <section class="news-letter1">
            <div class="section-tb-padding news-img" style="background-image: url(image/banner32.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home-news">
                                <h2>Contact Us for More Information</h2>
                                <form method="POST">
                                    <input  type="text" name="email" placeholder="Enter your email address">
                                    <button class="btn btn-style3" name="contact">Subscribe</button>
                                    <button class="btn btn-style1 news-sub" name="contact">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- News Letter end -->
        <!-- brand logo start -->
        <section class="section-tb-padding home-brand1">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="brand-carousel owl-carousel owl theme">
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/acer.png" alt="hp" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/Dell.png" alt="godrej" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/Godrej.jpg" alt="MSI" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/hp-inc.png" alt="acer" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/Iball.jpg" alt="dell" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/Logitech.png" alt="iball" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/msi.png" alt="Logitech" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/norton.png" alt="norton" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/orico.jpg" alt="zook" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/zebronics.png" alt="zebronics" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                             <div class="items">
                                <div class="brand-img">
                                    <a href="javascript:void(0)">
                                        <img src="image/brand/home-123/zook.jpg" alt="orico" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand logo end -->
         <?php include "footer.php";  ?>
        <!-- newsletter pop-up start -->
        <div class="vegist-popup animated modal fadeIn" id="myModal11" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-content">
                            <!-- popup close button start -->
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="ion-close-round"></i></a>
                            <!-- popup close button end -->
                            <!-- popup content area start -->
                            <div class="pop-up-newsletter" style="background-image: url(image/news-popup.jpg);">
                                <div class="logo-content">
                                    <a href="index1.html"><img src="image/logo1.png" alt="image" class="img-fluid"></a>
                                    <h4>Become a subscriber</h4>
                                    <span>Subscribe to get the notification of latest posts</span>
                                </div>
                                <div class="subscribe-area">
                                    <input type="text" name="comment" placeholder="Your email address">
                                    <a href="index1.html" class="btn btn-style1">Subscribe</a>
                                </div>
                            </div>
                            <!-- popup content area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter pop-up end -->
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
    </body>

</html>