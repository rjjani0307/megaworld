<?php
include "db.php";
 include "addtocart.php";
session_start();

     if(isset($_SESSION['Filter'])){ $filter = $_SESSION['Filter']; }else{ $filter = " "; }
    
    $whr = ""; $a = ""; $b = ""; $c = ""; $d = ""; $e = "";

         
    if(isset($_POST["select"])){  $_SESSION["Filter"] = $_POST["select"]; 
     ?>    <script>  window.location.replace(window.location.href); </script> <?php }
     
     if(isset($_SESSION["Filter"])){
      $filt = $_SESSION["Filter"];
        if($filt == 'AZ'){
            $filt = 'ORDER BY name ASC'; 
            $a = 'selected';
        }elseif($filt == 'ZA'){
             $filt = 'ORDER BY name DESC';
             $b = 'selected';
        }elseif($filt == 'LH'){
             $filt = 'ORDER BY price ASC';
             $c = 'selected';
        }elseif($filt == 'HL'){
             $filt = 'ORDER BY price DESC';
             $d = 'selected';
        }else{
            $filt = 'ORDER BY id DESC';
            $e = 'selected';
        }    
      }else{
            $filt = 'ORDER BY id DESC';
            $e = 'selected';
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
        .grid-list-area .grid-pro ul.grid-product li.grid-items {
    width: calc(20.00% - -23px);
        }
    
    </style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
     <!-- grid-list start -->
    <section class="section-b-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="grid-list-area">
                        <div class="grid-list-select">
                            <ul class="grid-list">
                             <li><h5>Search Resulst For... "<?php echo $_REQUEST['live_search'];  ?>"</h5></li>   
                            </ul>
                            <ul class="grid-list-selector">
                                <li>
                                <form method="post" action="">  
                                 <label>Sort by</label>
							   	 <select class="selectpicker" name="select" onchange="doSelect(this)">
									<option value=" " <?php echo $e; ?>>Featured</option>
									<option value="AZ" <?php echo $a; ?>>A-Z</option>
									<option value="ZA" <?php echo $b; ?>>Z-A</option>
									<option value="LH" <?php echo $c; ?>>Price, low to high</option>
									<option value="HL" <?php echo $d; ?>>Price, high to low</option>
								</select>
							   </form>
                                </li>
                            </ul>
                        </div>
                    
                        
          <?php 
           if(isset($_REQUEST['live_search'])){
         $live_search = $_REQUEST['live_search'];
       }
         $query = "SELECT * FROM product WHERE  status='1' AND name LIKE '{$live_search}%' OR id LIKE '{$live_search}%' $filt LIMIT 100";
         //echo $query;
          $result = mysqli_query($conn, $query);
          $product =mysqli_num_rows($result);
           if ($product > 0) {  ?>
                 <div class="grid-pro">
                 <ul class="grid-product">
           <?php   while ($rows = mysqli_fetch_array($result)) {     ?>
            
                                <li class="grid-items">
                                    <div class="tred-pro">
                                        <div class="tr-pro-img">
                                            <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>">
                                                <img class="img-fluid" src="admin/products/<?php echo $rows['img1']; ?>" alt="pro-img1">
                                                         <?php
                                                            $image2 = $rows['img2'];
                                                            if($image2 != 'NULL'){
                                                            ?>
                                                <img class="img-fluid additional-image" src="admin/products/<?php echo $rows['img2']; ?>" alt="additional image" alt="additional image">
                                           <?php } ?>
                                            </a>
                                        </div>

                                        <div class="pro-icn">
                                            <a href="search.php?actions=add&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                            <a href="search.php?action=add&quantity=1&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                            <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"  class="w-c-q-icn"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h3><a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"><?php echo $rows['name']; ?></a></h3>
                                        <div class="pro-price">
                                            <span class="new-price">₹ <?php echo $rows['price']; ?> INR</span>
                                        </div>
                                    </div>
                                </li>
                          <?php  }  ?>
                           </ul>
                         </div>
                     <div class="list-all-page">
                   <span class="page-title"><?php echo $product; ?> Products  Found.</span>
					 </div>
                  <?php }else{  ?>
  		    	 <div class="list-all-page">
                   <span class="page-title" style="text-align:center;">No Results Found</span>
					 </div>
                 <?php 	 } ?>
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
	<script type="text/javascript">
        function doSelect(el){
        sel = el.options[el.selectedIndex].value;
        	if(sel == "-"){
        		alert("Please choose an option");
        	}
        	else{
        		el.form.submit();
        	}
        }
    </script>
</body>
</html>