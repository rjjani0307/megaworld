<?php
include "db.php";
session_start();

$pcode = $_REQUEST['id'];
$view="select * from `blog` WHERE `id` = '$pcode'";
 $exe_view=   mysqli_query($conn, $view);

while($result=mysqli_fetch_array($exe_view))
                        {   
                          $blog_name = $result['name'];
                        $blog_image = $result['image'];
                        $blog_content = $result['content'];
                       $meta_desc = $result['meta_desc'];
                       $meta_key = $result['meta_key'];
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
     <meta name="description" content="<?php echo $meta_desc; ?>"/>
        <meta name="keywords" content=<?php echo $meta_key; ?>""/>
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
        
        <!-- breadcrumb start -->
        <section class="about-breadcrumb">
            <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="about-l">
                                <ul class="about-link">
                                    <li class="go-home"><a href="index.php">Home</a></li>
                                    <li class="about-p"><span>Blog</span></li>
                                    <li class="about-p"><span><?php echo $blog_name; ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb end -->
        <!-- blog start -->
        <section class="section-tb-padding blog-page">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="style-2-full-blog-area">
                            <div class="single-image">
                                <a href="blog-style-2-details.html">
                                    <img src="admin/blog/<?php echo $blog_image; ?>" class="img-fluid" alt="image">
                                </a>
                            </div>
                            <div class="row">
                                <div class="col single-blog-content">
                                    <div class="single-b-title">
                                        <h4><?php echo $blog_name; ?></h4>
                                    </div>
                                    <!--div class="date-edit-comments">
                                        <div class="blog-info-wrap">
                                            <span class="blog-data date">
                                                <i class="icon-clock"></i>
                                                <span class="blog-d-n-c">Feb 10, 2021</span>
                                            </span>
                                            <span class="blog-data blog-edit">
                                                <i class="icon-user"></i>
                                                <span class="blog-d-n-c">By <span class="editor">Andrew louise</span></span>
                                            </span>
                                            <span class="blog-data comments">
                                                <i class="icon-bubble"></i>
                                                <span class="blog-d-n-c">4 <span class="add-comments">comments</span></span>
                                            </span>
                                        </div>
                                    </div-->
                                    <div class="blog-description">
                                     <?php echo $blog_content; ?>
                                    </div>
                                    <!--
                                    <div class="blog-info">
                                        <i class="fa fa-quote-left"></i>
                                        <h6>Andrew louise</h6>
                                    </div>
                                    <div class="b-link">
                                        <a href="blog.html">Garlic</a>
                                        <a href="blog.html">Tost</a>
                                    </div>
                                    <div class="blog-social">
                                        <a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:void(0)" class="twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:void(0)" class="insta"><i class="fa fa-instagram"></i></a>
                                        <a href="javascript:void(0)" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                    <div class="blog-comments">
                                        <h4><span>5</span> Comments</h4>
                                        <div class="blog-comment-info">
                                            <ul class="comments-arae">
                                                <li class="comments-man">JM</li>
                                                <li class="comments-content">
                                                    <span class="comments-result">What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting...</span>
                                                    <span class="comment-name"><i>By <span class="comments-title">Jenim</span></i></span>
                                                    <span class="comments-result c-date">jan 20, 2021 <a href="javascript:void(0)" class="Reply">Reply</a></span>
                                                </li>
                                            </ul>
                                            <ul class="comments-arae comment-reply">
                                                <li class="comments-man">JE</li>
                                                <li class="comments-content">
                                                    <span class="comments-result">What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum...</span>
                                                    <span class="comment-name"><i>By <span class="comments-title">Jenis</span></i></span>
                                                    <span class="comments-result c-date">jan 15, 2021 <a href="javascript:void(0)" class="Reply">Reply</a></span>
                                                </li>
                                            </ul>
                                            <ul class="comments-arae comment-reply">
                                                <li class="comments-man">JE</li>
                                                <li class="comments-content">
                                                    <span class="comments-result">What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting...</span>
                                                    <span class="comment-name"><i>By <span class="comments-title">Jenis</span></i></span>
                                                    <span class="comments-result c-date">jan 15, 2021 <a href="javascript:void(0)" class="Reply">Reply</a></span>
                                                </li>
                                            </ul>
                                            <ul class="comments-arae all-reply">
                                                <li class="comments-man">DV</li>
                                                <li class="comments-content">
                                                    <span class="comments-result">What is Lorem Ipsum Lorem Ipsum is simply dummy text industry Lorem Ipsum...</span>
                                                    <span class="comment-name"><i>By <span class="comments-title">Devid</span></i></span>
                                                    <span class="comments-result c-date">jan 01, 2021 <a href="javascript:void(0)" class="Reply">Reply</a></span>
                                                </li>
                                            </ul>
                                            <ul class="comments-arae comment-reply">
                                                <li class="comments-man">KR</li>
                                                <li class="comments-content">
                                                    <span class="comments-result">What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum...</span>
                                                    <span class="comment-name"><i>By <span class="comments-title">Kartik</span></i></span>
                                                    <span class="comments-result c-date">jan 11, 2021 <a href="javascript:void(0)" class="Reply">Reply</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comments-form">
                                        <h4>Leave a comments</h4>
                                        <form>
                                            <label>Name*</label>
                                            <input type="text" name="name" placeholder="Name">
                                            <label>Email*</label>
                                            <input type="text" name="email" placeholder="Email">
                                            <label>Comments*</label>
                                            <textarea placeholder="Comments"></textarea>
                                        </form>
                                        <a href="blog-style-2-3-grid.html" class="btn-style1">Post comment</a>
                                    </div> -->
                                </div>
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