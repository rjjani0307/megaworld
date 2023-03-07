
  <?php
include "../db.php";
include"session.php";
if(isset($_POST['add_product'])){
 $statusMsg =  ''; 

 	$targetDir = "products/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 

	if ($_POST['p_name'] == "" || $_POST['price'] == "" || $_POST['p_description'] == "" ) {
       $statusMsg = " all fields are required </br>";

    } else {
   		
		if (!empty($_FILES['file1']['name'])) {
	  $p_id = uniqid();
       $p_code = $_POST['p_code'];
       $pp_id = $_POST['pp_id'];
	    $p_name = $_POST['p_name'];
	     $price = $_POST['price'];
	      $m_ctg = $_POST['m_ctg'];
	       $c_ctg = $_POST['c_ctg'];
	        $s_ctg = $_POST['s_ctg'];
	        $stock = $_POST['stock'];
	         $upc = $_POST['upc'];
	        $ean = $_POST['ean'];
	        $vpn = $_POST['vpn'];
	          $ten_price = $_POST['ten_price'];
	     $fifty_price = $_POST['fifty_price'];
	         $p_description = mysqli_real_escape_string($conn, $_POST['p_description']); 
	                   
	        // check file exists       
      
      		$file1 = $_FILES['file1']['name'];

 				// File upload path 
            $fileName1 = basename($_FILES['file1']['name']);
            $fileType1 =  pathinfo($fileName1, PATHINFO_EXTENSION);
            $extention1 = $p_id.rand(1000, 9999).".".$fileType1;
            $targetFilePath1 = $targetDir . $extention1;
             
             if(in_array($fileType1, $allowTypes) AND move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFilePath1) ){
             	$img1 = mysqli_real_escape_string($conn, $extention1);
             		$statusMsg1 ="";
		       } else{
		       	$img1 = "noimg.jpg";
		       		 $statusMsg1 = "Product 1st Image Upload failed! </br>"; 
		       }
		        

      	 if (!empty($_FILES['file2']['name'])) {
      	 	$file2 = $_FILES['file2']['name'];

      	 	$fileName2 = basename($_FILES['file2']['name']);
      	 	$fileType2 =  pathinfo($fileName2, PATHINFO_EXTENSION); 
            $extention2 = $p_id.rand(1000, 9999).".".$fileType2;
            $targetFilePath2 = $targetDir . $extention2;
              $img2 = mysqli_real_escape_string($conn, $extention2);
              if(in_array($fileType2, $allowTypes) AND move_uploaded_file($_FILES["file2"]["tmp_name"], $targetFilePath2)){
              		$statusMsg2 ="";
		       } else{
		       	$img2 = "NULL";
		       		 $statusMsg2 = "Product 2nd Image Upload failed! </br>"; 
		       }
		        }else{
      	$img2 = "NULL";
      	$statusMsg2 ="";
      }

       		if (!empty($_FILES['file3']['name'])) {

       			$file3 = $_FILES['file3']['name'];
       			$fileName3 = basename($_FILES['file3']['name']); 
       			$fileType3 =  pathinfo($fileName3, PATHINFO_EXTENSION);
            $extention3 = $p_id.rand(1000, 9999).".".$fileType3;
            $targetFilePath3 = $targetDir . $extention3;
              $img3 = mysqli_real_escape_string($conn, $extention3);
              if(in_array($fileType3, $allowTypes) AND move_uploaded_file($_FILES["file3"]["tmp_name"], $targetFilePath3)){
              			$statusMsg3 ="";
		       } else{
		       	$img3 = "NULL";
		       		 $statusMsg3 = "Product 3rd Image Upload failed! </br>"; 

		       }
		        }	else{
      	$img3 = "NULL";
      	$statusMsg3 ="";
      }

   
               // Insert image file name into database 
             $query = "INSERT INTO `product`(`p_id`, `pp_id`, `p_code`, `name`, `price`, `img1`, `img2`, `img3`, `description`, `m_ctg`, `c_ctg`, `s_ctg`, `upc`, `ean`, `vpn`, `stock`, `ten_price`, `fifty_price`, `status` ) VALUES ('$p_id', '$pp_id', '$p_code', '$p_name', '$price', '$img1', '$img2', '$img3', '$p_description', '$m_ctg', '$c_ctg', '$s_ctg', '$upc', '$ean', '$vpn', '$stock', ' $ten_price', ' $fifty_price', '1')";
 			$insert= mysqli_query($conn,$query);
 			

            if($insert){ 
            	unset($_POST);
                ?> <script>alert('Product Added Successfully');  </script>
            <script>  window.location.replace(window.location.href);  </script>
                 <?php 
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your Product. </br>"; 

            } 
  if($statusMsg1 == "" || $statusMsg2 == "" || $statusMsg3 == ""){ 

               }else{ 
    $statusMsg5 = $statusMsg1.$statusMsg2.$statusMsg3.$statusMsg; 
       	 }
       	 }else{
      	$statusMsg .= "Upload Product 1st Image. </br>";
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
		<link rel="shortcut icon" href="img/mcw_logos.jpeg" />

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
        <!-- Summernote CSS -->
		<link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />
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
						
						<li class="breadcrumb-item active">Add Product</li>
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
										<div class="card-title">Add Product
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
										  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
													<label for="Name" class="col-form-label">Product Name</label>
													<input type="text" class="form-control" id="Name" placeholder="Product name" name="p_name" required value="<?php if (isset($_POST['p_name'])) {
												echo $_POST['p_name'];	} ?>">
												</div>
											 </div>
											 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
													<label for="pp_id" class="col-form-label">Product ID</label>
													<input type="text" class="form-control" id="pp_id" placeholder="Product ID" name="pp_id" required value="<?php if (isset($_POST['pp_id'])) {
												echo $_POST['pp_id'];	} ?>">
												</div>
											 </div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="code" class="col-form-label">Product Code</label>
													<input type="text" class="form-control" id="code" placeholder="Product Code" name="p_code" required value="<?php if (isset($_POST['p_code'])) {
												echo $_POST['p_code'];	} ?>">
												</div>
												
												<div class="form-group">
													<label for="image" class="col-form-label">	Product Main Image	(size : 635*810)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file1"  accept="image/x-png,image/gif,image/jpeg" required="">
												</div>
												<div class="form-group">
													<label for="image" class="col-form-label">	Product 2nd Image	(size : 635*810)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file2"  accept="image/x-png,image/gif,image/jpeg">
												</div>
												<div class="form-group">
													<label for="image" class="col-form-label">	Product 3rd Image	(size : 635*810)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file3"  accept="image/x-png,image/gif,image/jpeg">
												</div>
													<div class="form-group">
													<label for="stock" class="col-form-label">Stock</label>
													<input type="number" class="form-control" id="stock" placeholder="Stock" name="stock" min="1"  value="<?php if (isset($_POST['stock'])) {
														echo $_POST['stock'];	} ?>" required>
												</div>
												<div class="form-group">
                                                <label for="upc" class="col-form-label">UPC</label>
                                                <input type="text" class="form-control" id="upc" placeholder="UPC"
                                                    name="upc" value="<?php if (isset($_POST['upc'])) {
														echo $_POST['upc'];	} ?>" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="ten_price" class="col-form-label">10 Or More Products Price</label>
                                                <input type="number" class="form-control" id="ten_price"
                                                    placeholder="10 Or More Products Price" name="ten_price" min="1"
                                                    oninput="validity.valid||(value='');" value="<?php if (isset($_POST['ten_price'])) {
														echo $_POST['ten_price'];	} ?>" required>
                                            </div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="price" class="col-form-label">Price</label>
													<input type="number" class="form-control" id="price" placeholder="Price" name="price" min="1"  oninput="validity.valid||(value='');" value="<?php if (isset($_POST['price'])) {
														echo $_POST['price'];	} ?>" required>
												</div>
												<div class="form-group">
												<label for="p_type" class="col-form-label">Product Category 1</label>
												<select class="form-control selectpicker" name="m_ctg" id="countySel" size="1" required="">
													<option value="" selected="selected">Select  Category 1</option>
												</select>
											</div>
											<div class="form-group">
											<label for="p_group" class="col-form-label">Product Category 2</label>
											<select class="form-control selectpicker" name="c_ctg" id="stateSel" size="1" required="">
												<option value="" selected="selected">Please Category 2</option>
											</select>
											</div>	
											<div class="form-group">
											<label for="p_group" class="col-form-label">Product Category 3</label>
											<select class="form-control selectpicker" name="s_ctg" id="districtSel" size="1">
												<option value="" selected="selected">Please Category 3</option>
												</select>
											</div>
										    <div class="form-group">
                                                <label for="EAN" class="col-form-label">EAN</label>
                                                <input type="text" class="form-control" id="EAN" placeholder="EAN"
                                                    name="ean" value="<?php if (isset($_POST['ean'])) {
														echo $_POST['ean'];	} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="vpn" class="col-form-label">VPN</label>
                                                <input type="text" class="form-control" id="vpn" placeholder="VPN"
                                                    name="vpn" value="<?php if (isset($_POST['vpn'])) {
														echo $_POST['vpn'];	} ?>" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="fifty_price" class="col-form-label">50 Or More Products Price </label>
                                                <input type="number" class="form-control" id="fifty_price"
                                                    placeholder="50 Or More Products Price" name="fifty_price" min="1"
                                                    oninput="validity.valid||(value='');" value="<?php if (isset($_POST['fifty_price'])) {
														echo $_POST['fifty_price'];	} ?>" required>
                                            </div>
											</div>
										  </div>
										<!-- Row end -->
											<div class="form-group">
													<label for="description" class="col-form-label">Product Description</label>
													<textarea  class="summernote" id="description" placeholder="Product Description" rows="6" name="p_description" required=""> <?php 
													if (isset($_POST['p_description'])) {
														echo $_POST['p_description'];	} ?></textarea>
													
												</div>
	
										<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12">
												<button type="submit" id="submit" name="add_product" class="btn btn-primary float-right">Submit</button>
											</div>
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

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
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
        <!-- Summernote JS -->
		<script src="vendor/summernote/summernote-bs4.js"></script>

 <script type="text/javascript">
   function validateimg(ctrl) { 
        var fileUpload = ctrl;
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
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
                        if (height == 810 || width == 635) {
                            return true;
                        }else{
                            alert("Upload  photo size 635*810.");
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
    	<script>
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 170,
					tabsize: 2
				});
			});
		</script>
		<script>
var stateObject = {

"Electronics": {
"Home Appliances" : [],
"Kitchen Accessories" : [],
"Personal Care" : []
},

"Desktop": {
"Barebone Desktop" : [],
"CD | DVD | DVD Writer" : [],
"CPU | CPU Fan" : [],
"I/O CARD" : [],
"INTERNAL HARD DRIVE" : [
			"Desktop",
			"Pull Out",
			"Solid State Drive (SSD)",
			"Surveillance" ],
"SSD | External HDD" : [
			"External Hard Disk",
			"External SSD" ],
"SSD | HDD Casing" : [],
"UPS | UPS Batteries" : [],
"Motherboard" : [],
"Ram" : [],
"Graphic Card" : [],
"Cabinet | Cabinet Fan" : [],
"Power Supply" : []
},

"Laptop": {
"Laptop Spare" : [
			"Laptop DVD Writer",
			"Laptop On | Off Switch",
			"Laptop Speaker",
			"Laptop Keyboard",
			"DC Adapter Cable",
			"Laptop CPU Fan",
			"Laptop Display Cable",
			"Laptop Hinges",
			"Laptop Base",
			"Laptop DC jack"],
"External SSD | HDD" : [
			"External SSD",
			"External HDD"],
"SSD | HDD Casing" : [],
"Internal SSD | HDD" : [
			"Internal SSD",
			"Internal HDD" ],
"Laptop RAM" : [],
"Laptop Battery" : [],
"Laptop Adapter" : [],
"Laptop Screen" : [],
"Laptop Cooling Pad" : [],
"Laptop Accessories" : []
},

"Display": {
"LED | Monitor" : [],
"Television" : [],
"Projector | Projector Screen" : [],
"Presenter | Printer" : [],
"Wall Mount KIT | Projector Stand" : [],
"CONNECTOR | CONVERTER" : [],
"Power Cable | HDM Cable | Vga Cable" : []
},

"Peripherals": {
"Keyboard | Mouse | Gamepad" : [
			"Mouse| Mouse Pad",
			"Keyboard | Combo",
			"Gamepad" ],
"Cable | Connector" : [
			"Cable",
			"Spike",
			"USB Hub",
			"Connector" ],
"Other Products" : [
			"Calculator",
			"Cmos battery",
			"Fitness band",
			"Covid 19 medical equipments" ],
"Speaker" : [],
"Web Cam" : [],
"CD | DVD | DVD Writer" : [],
"Headphone | Earphone | Mike" : [],
"Pendrive | Memory Card | Card Reader" : [],
"Mobile Charger | Car charger | Power Bank" : []
},

"Scanner | Printer": {
"Printer | Scanner" : [],
"Barcode Scanner" : [],
"Lamination Machine" : [],
"Toner" : [],
"Ink cartridge" : [],
"Ink Bottle" : [],
"Toner Powder" : [],
"Cartridge spareparts" : [],
"Photo Paper" : [],
"Vax RIbbion" : []
},

"Networking": {
"Cable and Connector" : [
			"Adapter",
			"Lan Cable",
			"Spike",
			"Connector",],
"Router | Range Extender" : [],
"Switch" : [],
"POV switch" : [],
"USB WIFI | Bluetooth Adapter" : [],
"Fiber Accessories" : [
			"Fiber Router",
			"Fiber Coupler",
			"Fiber BIDI",
			"Fiber Patch Cord" ],
"Network Accessories" : [],
"Rack | Accessories " : [],
"Tools" : []
},

"Security": {
"HD Camera| DVR" : [],
"IP Camera| DVR" : [],
"Wifi Camera" : [],
"Biometric" : [],
"Cable" : [],
"POE Switch | Adapter" : [],
"Power Supply | Injector" : [],
"Rack & Accessories " : [],
"Surveillance Accessories" : [],
"Surveillance Harddisk" : [],
"LED | Monitor" : []
},

"Software": {
"Accounting Software" : [],
"Antivirus" : [],
"Windows | Office" : []
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
districtSel = document.getElementById("districtSel");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
districtSel.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done 
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
}
}
}
</script>
	</body>


</html>