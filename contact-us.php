<?php 
  include_once"db.php";
  session_start();
  
  if (isset($_POST['contact'])) {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = mysqli_real_escape_string($conn, $_POST['message']); 
  $contact_query = "INSERT INTO `contact_us`(`name`, `phone`, `email`, `message`) VALUES  ('$name', '$phone', '$email', '$message')";

      $contact_run= mysqli_query($conn,$contact_query);
       if($contact_run){ 
             
       /* $toEmail = 'info@domain.com';
        $subject = "Contact Details From Mega Compu World";
        $content = '<h2>Contact Details </h2><br><br>
        
                    <h5>Name    :  <b>  '. $name .' </b></h5>
                    <h5>Phone   :  <b>  '. $phone .'  </b></h5>
                    <h5> Email   :  <b>  '. $email .'  </b></h5>
                     <h5>Message :   <b> '. $message .' </b></h5>
                    ';   
         $headers .= 'From: <info@domain.com>' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
     if(mail($toEmail, $subject, $content, $headers)) {    }*/ 

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
</head>
<body class="home-1">
  <?php include "header.php";  ?>
        

        <!-- map area start -->
        <section class="contact section-tb-padding" style="background-color: #f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="map-area">
                            <div class="map-title">
                                <h1>Contact us</h1>
                            </div>
                            
                            <div class="map-details section-b-padding">
                                <div class="contact-info">
                                    <div class="contact-details">
                                        <h4>Drop us message</h4>
                                        <form method="POST" action="">
                                            <label>Your name</label>
                                            <input type="text" name="name" placeholder="Enter your name">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Enter your email address">
                                            <label>Phone</label>
                                            <input type="text" name="phone" placeholder="Enter your phone number">
                                            <label>Message</label>
                                            <textarea rows="3" name="message" placeholder="Your message hare..."></textarea>
                                            <button name="contact" class="btn-style1"  style="margin-top: 20px">Submit <i class="ti-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="information">
                                        <h4>Get in touch</h4>
                                        <p class="info-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum earum eveniet dolorum suscipit nesciunt incidunt animi repudiandae ab at, tenetur distinctio voluptate vel illo similique.</p>
                                        <div class="contact-in">
                                            <ul class="info-details">
                                                <li><i class="fa fa-street-view"></i></li>
                                                <li>
                                                    <h4>Address</h4>
                                                    <p>B/1, Basement shopping, APM complex,<br>
                                                      Opposite SUN N STEP CLUB,<br>
                                                      near Sattadhar Char Rasta,<br>
                                                      Ahmedabad - 380061.</p>
                                                </li>
                                            </ul>
                                            <ul class="info-details" style="margin-top: 20px">
                                                <li><i class="fa fa-phone"></i></li>
                                                <li>
                                                    <h4>Phone</h4>
                                                    <a href="tel:+91 8160582238">+91 8160582238</a><br>
                                                  
                                                </li>
                                            </ul>
                                            <ul class="info-details" style="margin-top: 20px">
                                                <li><i class="fa fa-envelope"></i></li>
                                                <li>
                                             <h4>Email</h4>
                                            <a href="mailto:megacompuworld1@gmail.com">megacompuworld1@gmail.com</a>
                                            </br>
                                            <a href="mailto:mega.compuworld@yahoo.com">mega.compuworld@yahoo.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39199.65818332559!2d72.49099825901969!3d23.06704959473711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83f49dfc461d%3A0xc73086816fcca2a3!2sMega%20compu%20world%20pvt%20ltd!5e0!3m2!1sen!2sin!4v1650374110771!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- footer start -->
    <?php include "footer.php";  ?>
    <!-- footer copyright end -->
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