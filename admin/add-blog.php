
<?php
include "../db.php";
include"session.php";
if(isset($_POST['blog'])){
 $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
 $targetDir = "blog/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
if ($_POST['name'] == "" ) {
     $statusMsg = " all fields are required </br>";

    } else {
   		
	if (!empty($_FILES['file1']['name'])) {
      $p_code = uniqid();
	  $name = $_POST['name'];
	   $meta_desc = $_POST['meta_desc'];
	    $meta_key = $_POST['meta_key'];
        $content = mysqli_real_escape_string($conn, $_POST['content']); 
	        // check file exists       
      
      		$file1 = $_FILES['file1']['name'];

 				// File upload path 
            $fileName1 = basename($_FILES['file1']['name']);
            $fileType1 =  pathinfo($fileName1, PATHINFO_EXTENSION);
            $extention1 = $p_code.rand(1000, 9999).".".$fileType1;
            $targetFilePath1 = $targetDir . $extention1;
             
            if(in_array($fileType1, $allowTypes) AND move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFilePath1) ){
             	$img1 = mysqli_real_escape_string($conn, $extention1);
		       } else{
		       	$img1 = "noimg.jpg";
		       		 $statusMsg1 = " Blog Upload failed! </br>"; 
		       }
           // Insert image file name into database 
          $query = "INSERT INTO `blog`(`name`, `image`, `content`, `meta_desc`, `meta_key`) VALUES ('$name', '$img1', '$content', '$meta_desc', '$meta_key')";
		    
 			$insert= mysqli_query($conn,$query);

            if($insert){ 
            	unset($_POST);
                ?> <script>alert('Blog Added Successfully');  
              window.location = "blog.php";  </script>
                 <?php 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading Blog. </br>"; 
            } 

       	 }else{
      	$statusMsg .= "Upload Product Blog Image. </br>";
      } 
	   }
   }

  ?>
<!doctype html>
<html lang="en">
	
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="image/mcw_r.jpeg" />

		<!-- Title -->
		 <title>MCW - Mega Computer World</title>
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">
		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			
			<?php
			include "side.php";
			?>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
			<?php
			include "head.php";
			?>
				<!-- Header end -->
<!-- Page header start -->
				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						
						<li class="breadcrumb-item active">Add Blog</li>
					</ol>

					
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row justify-content-center gutters">
						<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
							<form method="POST" enctype="multipart/form-data">
								<div class="card m-0">
									<div class="card-header">
										<div class="card-title">Add Blog
									</div>
									<div class="card-body">
										<p style="color: red">
										<?php
										if (isset($statusMsg)) {
											echo $statusMsg;
										}
										if (isset($statusMsg5)) {
											echo $statusMsg5;
										}
										
										?></p>
										<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="form-group">
													<label for="Name" class="col-form-label">Blog Title
													</label>
													<input type="text" class="form-control" id="Name" placeholder="Enter Blog Title" name="name" value="<?php if (isset($_POST['name'])) {
										            	echo $_POST['name'];	} ?>">
												</div>
												<div class="form-group">
												<label for="image" class="col-form-label">Blog image  (Upload Size : 1023*521 px)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file1"  accept="image/x-png,image/gif,image/jpeg" required="">
												</div>
												<div class="form-group">
													<label for="url" class="col-form-label">Blog Content
													</label>
													<textarea class="form-control" name="content" rows="7" placeholder="Enter Blog Content"><?php if (isset($_POST['content'])) {
										            	echo $_POST['content'];	} ?></textarea>
												</div>
												<div class="form-group">
													<label for="url" class="col-form-label">Blog Meta Description
													</label>
													<textarea class="form-control" name="meta_desc" rows="7" placeholder="Enter Blog Content"><?php if (isset($_POST['meta_desc'])) {
										            	echo $_POST['meta_desc'];	} ?></textarea>
												</div>
												<div class="form-group">
													<label for="url" class="col-form-label">Blog Meta Key Words
													</label>
													<textarea class="form-control" name="meta_key" rows="7" placeholder="Enter Blog Content"><?php if (isset($_POST['meta_key'])) {
										            	echo $_POST['meta_key'];	} ?></textarea>
												</div>
												<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12"><br>
												<button type="submit" id="submit" name="blog" class="btn btn-primary float-right">Submit</button>
											</div>
										</div>
										<!-- Row end -->
										</div>
										<!-- Row end -->


									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- Row end -->

				</div>

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Polyfill JS -->
		<script src="vendor/polyfill/polyfill.min.js"></script>

		<!-- Apex Charts -->
		<script src="vendor/apex/apexcharts.min.js"></script>
		<script src="vendor/apex/admin/visitors.js"></script>
		<script src="vendor/apex/admin/deals.js"></script>
		<script src="vendor/apex/admin/income.js"></script>
		<script src="vendor/apex/admin/customers.js"></script>

		<!-- Main JS -->
		<script src="js/main.js"></script>


 <script type="text/javascript">
   function validateimg(ctrl) { 
        var fileUpload = ctrl;
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase().replace(/\s/g, ''))) {
            if (typeof (fileUpload.files) != "undefined") {
                var reader = new FileReader();
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        if (height == 521 || width == 1023) {
                            return true;
                        }else{
                            alert("Upload  photo size 1023*521 pixels.");
                            $(ctrl).val('');
                            return false;
                           
                        }
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                $(ctrl).val('');
                return false;

            }
        } else {
            alert("Please select a valid Image file.");
           $(ctrl).val('');
            return false;
        }
    }
    </script>
	</body>


</html>