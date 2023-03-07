<?php 
  include_once"db.php";
 include "addtocart.php";
 
  if (isset($_POST['add1'])) {
if ($_POST['name'] == "" || $_POST['email'] == "" || $_POST['review'] == "" ) 
  {          $reviewmsg = " all fields are required </br>";
  }else{
  
  $pcode = $_REQUEST['p_code'];
  $rating = $_POST['rating'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $review = $_POST['review'];
  $time = date("g:i  M j, Y");
  if ($_POST['rating'] == "") {
    $rating = "Not Rated";
  }
  $review_query = "INSERT INTO `unifiic_product_review`(`product_code`, `name`, `email`, `rating`, `review`, `time`, `status`) VALUES ('$pcode', '$name', '$email', '$rating', '$review', '$time', 'NOT APPROVED')";
      $review_run= mysqli_query($conn,$review_query);
            if($review_run){ 
              ?> <script>alert('Review Submitted Successfully');
              window.location.replace(window.location.href);</script> <?php 
            }else{
              ?> <script>alert('Please Try Again !');</script> <?php
            }
  
}
}

$pcode = $_REQUEST['p_id'];
$view="select * from `product` WHERE `p_id` = '$pcode'  AND `status` = '1'";
 $exe_view=   mysqli_query($conn, $view);
if($exe_view->num_rows == 0){ 
     header("location:index.php"); 
}
while($result=mysqli_fetch_array($exe_view))
                        {   
                            $prod_p_id = $result['p_id'];
                             $prod_pp_id = $result['pp_id'];
                          $prod_p_code = $result['p_code'];
                          $prod_p_name = $result['name'];
                        $prod_price = $result['price']; 
                        $prod_p_description = $result['description'];
                        $prod_m_ctg = $result['m_ctg'];
                        $prod_c_ctg = $result['c_ctg'];
                        $prod_s_ctg = $result['s_ctg'];
                        $prod_ten_price = $result['ten_price'];
                        $prod_fifty_price = $result['fifty_price'];
                        $image1 = $result['img1'];
                        $image2 = $result['img2'];
                        $image3 = $result['img3'];

 
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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        .pro-page .pro-image .pro-info .pro-qty .plus-minus span a {

            background-color: #ffffff;
        }
        
        .full-page-width {
    max-width: 1000px;
    overflow: auto;

}
        </style>
    </head>
    <body class="home-1">
       <?php include "header.php";  ?>
        
        <!-- product info start -->
        <section class="section-tb-padding pro-page" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 col-md-12 col-xs-12 pro-image">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 larg-image">
                                <div class="tab-content">
                                          <?php 
              if ($image1 != "NULL") {
                
                ?>
                   <div class="tab-pane fade show active" id="image-11">
                      <a href="javascript:void(0)" class="long-img">
                         <!--<figure class="zoom" onmousemove="zoom(event)" style="background-image: url(admin/products/<?php echo $image1; ?>)">-->
                           <img src="admin/products/<?php echo $image1; ?>" class="img-fluid" style="max-width: 71%;" alt="<?php echo $prod_p_name; ?>">
                         <!--</figure>-->
                       </a>
                   </div>
              <?php
              }
            
              if ($image2 != "NULL") {
                
                ?>
                   <div class="tab-pane fade show" id="image-22">
                      <a href="javascript:void(0)" class="long-img">
                        <!--<figure class="zoom" onmousemove="zoom(event)" style="background-image: url(admin/products/<?php echo $image2; ?>)">-->
                           <img src="admin/products/<?php echo $image2; ?>" class="img-fluid" alt="<?php echo $prod_p_name; ?>">
                         <!--</figure>-->
                       </a>
                    </div>
              <?php
              }
            if ($image3 != "NULL") {
                
                ?>  <div class="tab-pane fade show" id="image-33">
                       <a href="javascript:void(0)" class="long-img">
                         <!--<figure class="zoom" onmousemove="zoom(event)" style="background-image: url(admin/products/<?php echo $image3; ?>)">-->
                           <img src="admin/products/<?php echo $image3; ?>" class="img-fluid" alt="<?php echo $prod_p_name; ?>">
                         <!--</figure>-->
                      </a>
                     </div>
              <?php
              }
              ?>
                                </div>
                                <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme">
                 <?php 
              if ($image1 != "NULL") {
                
                ?>
                   <li class="nav-item items">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#image-11"><img src="admin/products/<?php echo $image1; ?>" class="img-fluid" alt="<?php echo $prod_p_name; ?>"></a>
                                    </li>
              <?php
              }
            
              if ($image2 != "NULL") {
                
                ?>
                    <li class="nav-item items">
                 <a class="nav-link" data-bs-toggle="tab" href="#image-22"><img src="admin/products/<?php echo $image2; ?>" class="img-fluid" alt="<?php echo $prod_p_name; ?>"></a>
                                    </li>
              <?php
              }
            if ($image3 != "NULL") {
                
                ?>
                   <li class="nav-item items">
                  <a class="nav-link" data-bs-toggle="tab" href="#image-33"><img src="admin/products/<?php echo $image3; ?>" class="img-fluid" alt="<?php echo $prod_p_name; ?>"></a>
                                    </li>
              <?php
              }
                ?>

                                </ul>
                            </div>
                        <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info">
                                <h4 style="text-transform: uppercase;"><?php echo $prod_p_name; ?></h4>
                               
                                <div class="pro-availabale">
                                     <span class="available">Product Code :</span>
                                    <span class="pro-instock"><?php echo $prod_p_code; ?></span>
                                </div>
                                <div class="pro-availabale">
                                     <span class="available" style="min-width: 78px;">Product ID :</span>
                                    <span class="pro-instock"><?php echo $prod_pp_id; ?></span>
                                </div>
                                <div class="pro-price">
                                    <span class="new-price">₹ &nbsp;  <?php echo $prod_price; ?> INR</span>
                                </div> 
                                 <?php  if (isset($_SESSION['mcw_useremail'])) {  ?>
                                    <div class="pro-availabale">
                                         <span class="pro-instock">10 Or More Products Rs.<?php echo $prod_ten_price; ?></span></br>
                                        <span class="pro-instock">50 Or More Products Rs.<?php echo $prod_fifty_price; ?></span>
                                    </div> 
                                        <?php }  ?> 
                                <!--<div class="rating">-->
                                <!--    <i class="fa fa-star d-star"></i>-->
                                <!--    <i class="fa fa-star d-star"></i>-->
                                <!--    <i class="fa fa-star d-star"></i>-->
                                <!--    <i class="fa fa-star d-star"></i>-->
                                <!--    <i class="fa fa-star-o"></i>-->
                                <!--</div>-->
                                <span class="pro-details"> <span class="pro-number"></span></span>
                                <form method="post" class="product-form" action="product-details.php?action=add&p_id=<?php echo $prod_p_id; ?>" style="margin-bottom: 40px">
                                <div class="pro-qty">
                                    <span class="qty">Quantity:</span>
                                    <div class="plus-minus">
                                        <span>
                                            <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                            <input type="number" id="qty" name="quantity" value="1" size="2" min="1" max="99" oninput="validity.valid||(value='');" required>
                                            <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                        </span>
                                    </div>
                                </div>          
                                <div class="pro-btn">
                                    <button type="submit" name="" class="btn btn-style1"><i class="fa fa-shopping-bag"></i> Add to cart</button>
                                </div>
                               </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product info end -->
        <!-- product page tab start -->
        <section class="section-b-padding pro-page-content" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="pro-page-tab">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-1">
                                    <div class="tab-1content">
                                         <div class="full-page-width">
                                       <?php echo $prod_p_description; ?>
                                    </div>
                                  </div>
                                </div>
                                <!--div class="tab-pane fade show" id="tab-2">
                                    <h4 class="reviews-title">Customer reviews</h4>
                                    <div class="customer-reviews t-desk-2">
                                        <!--span class="p-rating">
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                            <i class="fa fa-star e-star"></i>
                                        </span>
                                        <p class="review-desck"></p>
                                        <a href="#add-review" data-bs-toggle="collapse">Write a review</a>
                                        <a style="color: red;"><?php if (isset($reviewmsg)) { echo $reviewmsg;  } ?></a>
                                    </div>
                                 <div class="review-form collapse" id="add-review">
                                        <h4>Write a review</h4>
                                        <form method="POST" action="">
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Enter your name" required="">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Enter your Email" required="">
                                            <label>Rating</label>
                                          <br><label style="width: 100%; margin-top: 2px;">
                                             <fieldset class="rating" >
    <input type="radio" id="star5" name="rating" value="5" required="" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4.5"/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
    </fieldset><br></label>
                                    <input type="hidden" name="p_name" value="<?php echo $prod_p_name; ?>">
                                            <label>Add comments</label>
                                            <textarea  name="review" required="" placeholder="Write your review"></textarea>
                                            <button type="Submit" class="btn btn-style1" name="add">Add Review</button>
                                        </form>
                                    </div>

                                    <?php
                                    $pcode = $_REQUEST['product'];
                                    $review_view="select * from `review` WHERE `product_code` = '$pcode' AND `status` = 'APPROVED'";
                                     $exe_review= mysqli_query($conn, $review_view);
                                    if ( $exe_review) {
                                        
                                    while($row = mysqli_fetch_array($exe_review)){    ?>
                                        <div class="customer-reviews">
                                           <span class="p-rating">
                                 <?php    $rate = $row['rating']; echo '('.$rate.')'; 
                                         for ( $i = 1; $i <= 5; $i++ ) {
                      if ( round( $rate - .25 ) >= $i ) {
                          echo "<i class='fa fa-star e-star'></i>"; //fas fa-star for v5
                      } elseif ( round( $rate + .25 ) >= $i ) {
                          echo "<i class='fa fa-star-half-o  e-star'></i>"; //fas fa-star-half-alt for v5
                      } else {
                          echo "<i class='fa fa-star-o  e-star'></i>"; //far fa-star for v5
                      }
                       }  ?>
                                     <span class="reviews-editor">    <time><?php  echo $row['time']; ?></time></span>
                                  </span>
                      
                              <h4 class="review-head"><?php echo $row['name']; ?></h4>
                           
                           <p class="reviews-editor"><?php echo nl2br($row['review']); ?></p>
                          
                        </div>
                      
                    <?php  }}else {  ?>

                    <div class="customer-reviews">
                      <h4 class="review-head">No REVIEWS</h4>
                       </div>
                    <?php }  ?>
                                </div>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
        </section>        <!-- product page tab end -->
        <!-- releted product start -->
        <section class="section-b-padding pro-releted" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>Related Products</h2>
                        </div>
                        <div class="releted-products owl-carousel owl-theme">
                           <?php 
                           $pcode = $_REQUEST['p_id'];
                                $product_view="SELECT * FROM `product` WHERE c_ctg = '$prod_c_ctg' AND p_id != '$pcode' AND status='1' ORDER BY id DESC LIMIT 7";
                                $exe_product= mysqli_query($conn, $product_view);
                                while($rows = mysqli_fetch_array($exe_product)){    ?>
                           <div class="items">
                                <div class="tred-pro">
                                    <div class="tr-pro-img">
                                        <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>">
                                            <img class="img-fluid" src="admin/products/<?php echo $rows['img1']; ?>" alt="pro-img1">
                                            <?php
                                                            $image2 = $rows['img2'];
                                                            if($image2 != 'NULL'){
                                                            ?>
                                            <img class="img-fluid additional-image" src="admin/products/<?php echo $rows['img2']; ?>" alt="additional image">
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="Pro-lable">
                                        <span class="p-text">New</span>
                                    </div>
                                    <div class="pro-icn">
                                        <a href="product-details.php?actions=add&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                        <a href="product-details.php?action=add&quantity=1&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                        <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="caption">
                                    <h3><a href="product-details.php?actions=add&p_id=<?php echo $rows['p_id']; ?>"><?php echo $rows['name']; ?></a></h3>
                                    <!--<div class="rating">-->
                                    <!--    <i class="fa fa-star c-star"></i>-->
                                    <!--    <i class="fa fa-star c-star"></i>-->
                                    <!--    <i class="fa fa-star c-star"></i>-->
                                    <!--    <i class="fa fa-star-o"></i>-->
                                    <!--    <i class="fa fa-star-o"></i>-->
                                    <!--</div>-->
                                    <div class="pro-price">
                                        <span class="new-price">₹ <?php echo $rows['price']; ?> INR</span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- releted product end -->
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
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
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
    <!-- footer start -->
    <?php include "footer.php";  ?>
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