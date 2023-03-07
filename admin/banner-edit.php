
<?php
include "../db.php";
include"session.php";

if(isset($_POST['banner'])){
 $targetDir = "banners/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     $p_code = uniqid();
	  $name = $_POST['name'];
	  $link = mysqli_real_escape_string($conn, $_POST['link']); 
        $id = $_POST['id'];
	   // check file exists   
	   	if (!empty($_FILES['file1']['name'])) {
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
		         $statusMsg1 = "Banner Image Upload failed! </br>"; 
		       }
		        
           // Insert image file name into database 
          $query = "UPDATE `banner` SET `name`='$name',`image`= '$img1',`link`= '$link' WHERE id = '$id'";
 			$insert= mysqli_query($conn,$query);


            if($insert){ 
            	unset($_POST);
                ?> <script>alert('Banner Updated Successfully');  
                window.location = "banners.php"; </script>
                 <?php 
            }else{ 
                $statusMsg = "Sorry, there was an error Editing banner. </br>"; 
            } 

       	 }else{
       	     // Insert image file name into database 
          $query = "UPDATE `banner` SET `name`='$name',`link`= '$link' WHERE id = '$id'";
 			$insert= mysqli_query($conn,$query);

            if($insert){ 
            	unset($_POST);
                ?> <script>alert('Banner Updated Successfully');  
                 window.location = "banners.php";  </script>
                 <?php 
            }else{ 
                $statusMsg = "Sorry, there was an error Editing banner. </br>"; 
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
    <style>
        .avatar img {
    width: auto;
    height: 80%;}
    </style>
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
			
$id=$_GET['id'];
$sql = "SELECT * FROM banner where id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
<!-- Header end -->
<!-- Page header start -->
				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						
						<li class="breadcrumb-item active">Edit Banner</li>
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
										<div class="card-title">Edit Banner
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
													<label for="Name" class="col-form-label">Banner name
													</label>
													<input type="text" class="form-control" id="Name" placeholder="Banner name" name="name" required value="<?php echo $row['name']; ?>">
												</div>
												<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
												<div class="row">
					                        	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
												<label for="image" class="col-form-label">Banner image  (Upload Size : 1920*776 px)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file1"  accept="image/x-png,image/gif,image/jpeg" >
												</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												    <div class="avatar xxxl">
											<img src="banners/<?php echo $row['image']; ?>" class="" >
										        </div>
												</div>
												</div>
												<div class="form-group">
													<label for="url" class="col-form-label">URL
													</label>
													<input type="url" class="form-control" id="url" placeholder="url" name="link" value="<?php echo $row['link']; ?>">
												</div>
												<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12"><br>
												<button type="submit" id="submit" name="banner" class="btn btn-primary float-right">Submit</button>
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
                        if (height == 776 || width == 1920) {
                            return true;
                        }else{
                            alert("Upload  photo size 1920*776 pixels.");
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