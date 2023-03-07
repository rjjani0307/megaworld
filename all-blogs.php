<?php
 require_once 'db.php'; 
?><!DOCTYPE html>
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
        <link rel="stylesheet" id="font-awesome-style-css" href="https://www.phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
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
        <section class="about-breadcrumb">
            <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="about-l">
                                <ul class="about-link">
                                    <li class="go-home"><a href="index1.html">Home</a></li>
                                    <li class="about-p"><span>All Blogs</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb end -->
        <!-- left blog start -->
        <section class="section-tb-padding blog-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="full-blog-list-style-6" id="postContent">
            <?php 
        // Include pagination library file 
       include_once 'Pagination.php'; 
        // Set some useful configuration 
       $filename = '&filename='.basename(__FILE__, '.php');
        $baseURL = 'page.php?'.substr(strrchr(basename($_SERVER["REQUEST_URI"]), "?"), 1).$filename; 
        $limit = 1; 
        // Count of all records 
        $query   = $conn->query("SELECT COUNT(*) as rowNum FROM blog"); 
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
        $sql = "SELECT * FROM blog  LIMIT $limit";  
        $query = $conn->query("$sql"); 
        if($query->num_rows > 0){ 
        ?>
            <!-- Display posts list -->
            <?php while($row = $query->fetch_assoc()){ ?>
                            <div class="blog-start">
                                <div class="blog-image">
                                    <a href="blog-details.php?id=<?php echo $row['id']; ?>">
                                        <img src="admin/blog/<?php echo $row['image']; ?>" alt="blog-image" class="img-fluid">
                                    </a>
                                    <div class="image-link">
                                        <a href="">Online</a>
                                        <a href="">Offer</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-title">
                                        <h6><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h6>
                                    </div>
                                    <p class="blog-description"><?php  
                                           $cont = $row['content'];
                                            $result = substr("$cont", 0, 80);
                                            echo $result;
                                            ?>...</p>
                                    <div class="more-blog">
                                        <a href="blog-details.php?id=<?php echo $row['id']; ?>" class="read-link">
                                            <span>Read more</span>
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                     
                        
					      <?php  }  ?>
                        
                        <?php echo $pagination->createLinks(); ?>
						
            <!-- Display pagination links -->
           
        <?php }else{  ?>

  			 <div class="all-page">
                   <div class="page-number style-6">
					  <a>No More Products</a>   
					 </div>
			     </div>
            <?php 	 } ?></div>
                        <!-- <div class="all-page">-->
                        <!--    <span class="page-title">Showing 1 - 5 of 6 result</span>-->
                        <!--    <div class="page-number style-6">-->
                        <!--        <a href="javascript:void(0)" class="active">1</a>-->
                        <!--        <a href="javascript:void(0)">2</a>-->
                        <!--        <a href="javascript:void(0)">3</a>-->
                        <!--        <a href="javascript:void(0)">4</a>-->
                        <!--        <a href="javascript:void(0)">5</a>-->
                        <!--        <a href="javascript:void(0)"><i class="fa fa-angle-double-right"></i></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
        // Show loading overlay when ajax request starts
        $( document ).ajaxStart(function() {
            $('.loading-overlay').show();
        });
        
        // Hide loading overlay when ajax request completes
        $( document ).ajaxStop(function() {
            $('.loading-overlay').hide();
        });
        </script>
    </body>
</html>