<?php
include "db.php";
 include "addtocart.php";
session_start();
     if(isset($_SESSION['Filter'])){ $filter = $_SESSION['Filter']; }else{ $filter = " "; }
    
    $whr = " "; $a = ""; $b = ""; $c = ""; $d = ""; $e = "";
    if(isset($_REQUEST['cat'])){
         $cat = $_REQUEST['cat'];
       
         $view="select DISTINCT two from category WHERE one = '$cat'";   
         
          if(isset($_REQUEST['catm'])){
                 $catm = $_REQUEST['catm'];
                 $view="select DISTINCT  three from category WHERE two = '$catm'"; 
         }
            if(isset($_REQUEST['cats'])){
                     $cats = $_REQUEST['cats'];
                     $view="select DISTINCT  three from category WHERE three = '$cats'";     
                
            }
         }
         
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <style>
        .grid-list-area .grid-pro ul.grid-product li.grid-items {
    width: calc(20.00% - -15px);
        }
    .slick-list {
        	max-width: 100%;
        	margin: 0 auto;
        	padding: 10px 0;
        }
        .slick-list .slick-slide {
        	font-size: 30px;
        	text-align: center;
        	padding: 20px 10px;
        	line-height: 2;
        	font-weight: 700;
        }
        .slick-list .slick-slide:nth-child(even) {
        	background-color: #ddd;
        }
        .slick-list .slick-slide:nth-child(odd) {
        	background-color: #ccc;
        }
        .slick-arrow {
        	z-index: 1;
        	width: 40px;
        	height: 40px;
        }
        
        .slick-arrow:before {
        	font-size: 30px;
        }
        .slick-next {
        	right: 0;
        }
        .slick-prev {
        	left: 0;
        }
        
        .btn-wrap {
        	text-align: center;
        	width: 100%;
        }
        #slid{
            font-size: 13px;
            font-weight: 200;
            line-height: 18px;
        }
        .list-all-page .page-number {
            margin-top: 45px;
        }
        @media (max-width: 991px) {
        	 .slick-list{
        			width: auto !important;
        	}
        }
    </style>
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        
      <section class="breadcrumb-tb-padding" style="background-color: #f2f2f2">
        <div class="container">
            <div class="row">
                <div class="col"> 
                    <div class="track-area">
                           <div class="track-price">
                            <ul class="track-order">
                                <li>
                            <h6><?php  
                            if(isset($_REQUEST['cat'])){
                                 echo '<a href="category.php?cat='.$_REQUEST['cat'] . '">'.$_REQUEST['cat'] . '</a> &nbsp; > &nbsp;';
                             }  ?> <?php  
                            if(isset($_REQUEST['cat']) && !empty($_REQUEST['catm'])){
                                 echo '<a href="category.php?cat='.$_REQUEST['cat'].'&catm='.$_REQUEST['catm'].'">'.$_REQUEST['catm'].'</a>';
                             }  ?>  <?php  
                            if(isset($_REQUEST['catm']) && isset($_REQUEST['cat']) && !empty($_REQUEST['cats'])){
                                        echo '&nbsp; > &nbsp; <a href="category.php?cat='.$_REQUEST['cat'].'&catm='.$_REQUEST['catm'].'&cats='.$_REQUEST['cats'].'">' . $_REQUEST['cats'].'</a>';
                                         $whr = "WHERE m_ctg = '" . $cat . "' AND c_ctg = '" . $catm. "' AND s_ctg = '" . $cats . "'";
                                     }   ?></h6>
                                </li>
                            </ul>
                        </div>
                       
                            <?php
                             
                        if(isset($_REQUEST['cat']) && !isset($_REQUEST['catm'])){
                                $whr = "WHERE m_ctg = '" . $cat . "'";
                               
                          $view="select DISTINCT two from category WHERE one = '$cat'";
                           $querys = $conn->query("$view"); 
                              if($querys->num_rows > 0){  ?>
                                 <div class="slick-list">  <?php
                              while($results=mysqli_fetch_array($querys)){ ?>
                                <div>
                                <a id="slid" href="category.php?cat=<?php echo $_REQUEST['cat']; ?>&catm=<?php echo $results['two']; ?>">
                                        <?php echo $results['two']; ?></a>
                                </div>
                                <?php } ?> </div> <?php    }  } 
                                 
                                if(isset($_REQUEST['catm']) && isset($_REQUEST['cat']) && empty($_REQUEST['cats'])){ 
                                  $catm = $_REQUEST['catm'];
                                  $whr = "WHERE m_ctg = '" . $cat . "' AND c_ctg = '" . $catm . "'";
                                  
                                 $sql="select DISTINCT three from category WHERE two = '$catm'";  
                                 $query = $conn->query("$sql"); 
                                 if($query->num_rows > 1){
                                 ?> 
                                <div class="slick-list">  <?php
                               
                                while($results=mysqli_fetch_array($query)){  
                                   ?>
                                <div>
                                 <a id="slid" href="category.php?cat=<?php echo $_REQUEST['cat']; ?>&catm=<?php echo $_REQUEST['catm']; ?>&cats=<?php echo $results['three']; ?>">
                                        <?php echo $results['three']; ?></a>
                                </div>
                                <?php }   ?> </div> <?php   }     }   ?>
                    </div>
                </div>
            </div>
        </section>
     <!-- grid-list start -->
    <section class="section-b-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12 section-t-padding">
                            <div class="all-filter">
                                <div class="categories-page-filter">
                                    <h4 class="filter-title">Categories</h4>
                                    <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories </span><i class="fa fa-angle-down"></i></a>
                                    <ul class="all-option collapse" id="category-filter" style="height: 100%;">
                                         <?php
                             
                        if(isset($_REQUEST['cat'])){
                              //  $whr = "WHERE m_ctg = '" . $cat . "'";
                               
                          $view="select DISTINCT two from category WHERE one = '$cat'";
                           $querys = $conn->query("$view"); 
                              if($querys->num_rows > 0){  ?>
                                  <?php
                              while($results=mysqli_fetch_array($querys)){ 
                              $cth = $results['two'];
                              $result = $conn->query("select * from product where m_ctg='$cat' AND c_ctg='$cth' AND status='1'");
                                $count=$result->num_rows;
                               
                                ?>
                                <li class="grid-list-option">
                                <a href="category.php?cat=<?php echo $_REQUEST['cat']; ?>&catm=<?php echo $results['two']; ?>">
                                        <?php echo $results['two']; ?></a><span class="grid-items">(<?php echo "$count";  ?>)</span></li>
                                
                                <?php } ?>  <?php    }  } ?>
                                       
                                    </ul>
                                </div>
                               
                                        <?php if(isset($_REQUEST['catm']) && isset($_REQUEST['cat']) && empty($_REQUEST['cats'])){ 
                                  $catm = $_REQUEST['catm'];
                                  $whr = "WHERE m_ctg = '" . $cat . "' AND c_ctg = '" . $catm . "'";
                                  
                                 $sql="select DISTINCT three from category WHERE two = '$catm'";  
                                 $query = $conn->query("$sql"); 
                                 if($query->num_rows > 1){
                                 ?> 
                                  <div class="categories-page-filter section-t-padding">
                                    <h4 class="filter-title">Sub Categories</h4>
                                    <a href="#tags-filter" data-bs-toggle="collapse" class="filter-link"><span>Sub Categories </span><i class="fa fa-angle-down"></i></a>
                                        <ul class="all-option collapse" id="tags-filter" style="height: 100%;">
                                 <?php
                               
                                while($results=mysqli_fetch_array($query)){ 
                                     $cths = $results['three'];
                              $resulta = $conn->query("select * from product where m_ctg='$cat' AND c_ctg='$catm' AND s_ctg='$cths' AND status='1'");
                                $counta=$resulta->num_rows;
                                   ?>
                                         <li class="grid-list-option">
                                <a href="category.php?cat=<?php echo $_REQUEST['cat']; ?>&catm=<?php echo $_REQUEST['catm']; ?>&cats=<?php echo $results['three']; ?>">
                                        <?php echo $results['three']; ?></a><span class="grid-items">(<?php echo "$counta";  ?>)</span></li>
                                <?php }   ?>
                                </ul>
                                </div>
                                <?php   }     }   ?>
                                    
                               
                            </div>
                        </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="grid-list-area">
                        <div class="grid-list-select">
                            <ul class="grid-list">
                                
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
                        </div></div>
                        <div class="grid-list-area" id="postContent">
                        <div class="grid-pro">
                      <ul class="grid-product">
          <?php 
        // Include pagination library file 
       include_once 'Pagination.php'; 
        // Set some useful configuration 
       $filename = '&filename='.basename(__FILE__, '.php');
        $baseURL = 'prod_page.php?'.substr(strrchr(basename($_SERVER["REQUEST_URI"]), "?"), 1).$filename; 
        $limit = 12; 
        // Count of all records 
        $query   = $conn->query("SELECT COUNT(*) as rowNum FROM product $whr  AND status='1' $filt"); 
        $result  = $query->fetch_assoc(); 
        $rowCount= $result['rowNum']; 
         
         
        // Initialize pagination class 
        $pagConfig = array( 
            'baseURL' => $baseURL, 
            'totalRows' => $rowCount, 
            'perPage' => $limit, 
            'contentDiv' => 'postContent' 
        ); 
        $pagination =  new Pagination($pagConfig); 
        // Fetch records based on the limit 
        $sql = "SELECT * FROM product " . $whr . " AND status='1' $filt LIMIT $limit";  
        
        $query = $conn->query("$sql"); 
        if($query->num_rows > 0){ 
        ?>
            <!-- Display posts list -->
            <?php while($rows = $query->fetch_assoc()){ ?>
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
                                            <a href="category.php?actions=add&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-heart"></i></a>
                                            <a href="category.php?action=add&quantity=1&p_id=<?php echo $rows['p_id']; ?>" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                            <a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"  class="w-c-q-icn"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>Product ID : <?php echo $rows['id']; ?></p>
                                        <h3><a href="product-details.php?p_id=<?php echo $rows['p_id']; ?>"><?php echo $rows['name']; ?></a></h3>
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
                                </li>
                            
                                 <?php  }  
                         echo "</ul></div>";?>
                        <?php echo $pagination->createLinks(); ?>
						
            <!-- Display pagination links -->
           
        <?php }else{  ?>
                 </div> 
  		    	 <div class="list-all-page">
                   <span class="page-title">No More Products</span>
					 </div>
            <?php 	 } ?>
                         

                </div>
            </div>
        </div>
    </section>
    <!-- grid-list start -->
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      
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
         
        $(document).ready(function () {
    	$(".slick-list").slick({
    		slidesToShow: 4,
    		slidesToScroll: 1,
    		arrows: true,
    		infinite: false,
    		autoplay: false
    	});
    	$(".prev-btn").click(function () {
    		$(".slick-list").slick("slickPrev");
    	});
    
    	$(".next-btn").click(function () {
    		$(".slick-list").slick("slickNext");
    	});
    	$(".prev-btn").addClass("slick-disabled");
    	$(".slick-list").on("afterChange", function () {
    		if ($(".slick-prev").hasClass("slick-disabled")) {
    			$(".prev-btn").addClass("slick-disabled");
    		} else {
    			$(".prev-btn").removeClass("slick-disabled");
    		}
    		if ($(".slick-next").hasClass("slick-disabled")) {
    			$(".next-btn").addClass("slick-disabled");
    		} else {
    			$(".next-btn").removeClass("slick-disabled");
    		}
    	});
    });
    </script>
</body>
</html>