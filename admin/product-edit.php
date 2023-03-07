
<?php
include "../db.php";
include"session.php";

if(isset($_POST['edit_product'])){
 $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
 $targetDir = "products/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 

    //echo $_POST['name']."<br>";
    //echo $_POST['price']."<br>";
    //echo $_POST['p_code']."<br>";
    //echo $_POST['m_ctg']."<br>";
    //echo $_POST['c_ctg']."<br>";
    //echo $_POST['p_description']."<br>";
if ($_POST['name'] == "" || $_POST['price'] == "" || $_POST['p_code'] == "" || $_POST['m_ctg'] == "" || $_POST['p_description'] == "") {
          $statusMsg = " all fields are required </br>";
  

   		}else {
   		$p_id = $_POST['p_id'];
   		$pp_id = $_POST['pp_id'];
 	   $p_code = $_POST['p_code'];
	    $name = $_POST['name'];
	     $price = $_POST['price'];
	      $m_ctg = $_POST['m_ctg'];
	       $c_ctg = $_POST['c_ctg'];
	        $s_ctg = $_POST['s_ctg'];
	         $p_description = mysqli_real_escape_string($conn, $_POST['p_description']);  
	          $image1 = $_POST['image1'];
               	$image2 = $_POST['image2'];
                   $image3 = $_POST['image3'];
                    $stock = $_POST['stock'];     
                      $upc = $_POST['upc'];
                    $ean = $_POST['ean'];
                    $vpn = $_POST['vpn'];
                   $ten_price = $_POST['ten_price'];
	               $fifty_price = $_POST['fifty_price'];
	        // check file exists       
      if (!empty($_FILES['file1']['name'])) {
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
		       	$img1 = $image1;
		       		 $statusMsg1 = "Product 1st Image Upload failed! </br>"; 
		       }
		        }else{
      	$img1 = $image1;
      	$statusMsg1 ="";
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
		       	$img2 = $image2;
		       		 $statusMsg2 = "Product 2nd Image Upload failed! </br>"; 
		       }
		        }else{
      	$img2 = $image2;
      	$statusMsg2 ="";
      }

       		if (!empty($_FILES['file3']['name'])) {

       			$file3 = $_FILES['file3']['name'];
       			$fileName3 = basename($_FILES['file3']['name']); 
       			$fileType3 =  pathinfo($fileName3, PATHINFO_EXTENSION);
            $extention3 = $p_id.rand(1000, 9999).".".$fileType3;
            $targetFilePath3 = $targetDir . $extention3;
              $img3 = mysqli_real_escape_string($conn, $extention3);
              if( in_array($fileType3, $allowTypes) AND move_uploaded_file($_FILES["file3"]["tmp_name"], $targetFilePath3)){
              			$statusMsg3 ="";
		       } else{
		       	$img3 = $image3;
		       		 $statusMsg3 = "Product 3rd Image Upload failed! </br>"; 

		       }
		        }	else{
      	$img3 = $image3;
      	$statusMsg3 ="";
      }
 			// Insert image file name into database 
   			$query = "UPDATE `product` SET `p_code`='$p_code',`pp_id`='$pp_id',`name`='$name',`price`='$price',`img1`='$img1',`img2`='$img2',`img3`='$img3',`description`='$p_description',`m_ctg`='$m_ctg',`c_ctg`='$c_ctg',`s_ctg`= '$s_ctg',`upc`='$upc',`ean`='$ean',`vpn`='$vpn',`stock`= '$stock',`ten_price`='$ten_price',`fifty_price`='$fifty_price' WHERE p_id = '$p_id'";
 			$insert= mysqli_query($conn,$query);

            if($insert){ 
                ?> <script>alert('Product Updated Successfully');
                 window.location = "products.php"; </script><?php
            }else{ 
                $statusMsg = "Sorry, there was an error Updating your Product. </br>"; 

            } 
 if($statusMsg1 == "" || $statusMsg2 == "" || $statusMsg3 =="" || $statusMsg4 == ""){

               }else{ 
    $statusMsg5 = $statusMsg1.$statusMsg2.$statusMsg3.$statusMsg4.$statusMsg; 
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

	$product = $_GET['product'];
$sql = "SELECT * FROM product where p_id='$product'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
				<!-- Header end -->
				<!-- Page header start -->
				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						
						<li class="breadcrumb-item active">Edit Product</li>
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
										<div class="card-title">Edit Product
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
													<input type="text" class="form-control" id="Name" placeholder="Product name" name="name" required value="<?php if (isset($row['name'])) {
												echo $row['name'];	} ?>">
												</div>
											 </div>
											 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
													<label for="pp_id" class="col-form-label">Product ID</label>
													<input type="text" class="form-control" id="pp_id" placeholder="Product ID" name="pp_id" required value="<?php if (isset($row['pp_id'])) {
												echo $row['pp_id'];	} ?>">
												</div>
											 </div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="code" class="col-form-label">Product Code</label>
													<input type="text" class="form-control" id="code" placeholder="Product Code" name="p_code" required value="<?php if (isset($row['p_code'])) {
												echo $row['p_code'];	} ?>" required>
												</div>
													<input type="hidden" name="p_id" required value="<?php if (isset($row['p_id'])) {
												echo $row['p_id'];	} ?>">
												<div class="form-group">
													<label for="image" class="col-form-label">	Product Main Image	(size : 635*810)</label>
    													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file1"  accept="image/x-png,image/gif,image/jpeg" >
													<input type="hidden" name="image1" value="<?php echo $row['img1']; ?>">
												</div>
												<div class="form-group">
													<label for="image" class="col-form-label">	Product 2nd Image	(size : 635*810)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file2"  accept="image/x-png,image/gif,image/jpeg">
													<input type="hidden" name="image2" value="<?php echo $row['img2']; ?>">
												</div>
												<div class="form-group">
													<label for="image" class="col-form-label">	Product 3rd Image	(size : 635*810)</label>
													<input type="file" class="form-control" onchange="validateimg(this)" id="image" placeholder="Product images" name="file3"  accept="image/x-png,image/gif,image/jpeg">
													<input type="hidden" name="image3" value="<?php echo $row['img3']; ?>" >
												</div>
													<div class="form-group">
													<label for="stock" class="col-form-label">Stock</label>
													<input type="number" class="form-control" id="stock" placeholder="Stock" name="stock" min="1"  value="<?php if (isset($row['stock'])) {
														echo $row['stock'];	} ?>" required>
												</div>
													<div class="form-group">
                                                <label for="upc" class="col-form-label">UPC</label>
                                                <input type="text" class="form-control" id="upc" placeholder="UPC"
                                                    name="upc" value="<?php if (isset($row['upc'])) {
														echo $row['upc'];	} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ten_price" class="col-form-label">10 Or More Products Price</label>
                                                <input type="number" class="form-control" id="ten_price"
                                                    placeholder="10 Or More Products Price" name="ten_price" min="1"
                                                    oninput="validity.valid||(value='');" value="<?php if (isset($row['ten_price'])) {
														echo $row['ten_price'];	} ?>" required>
                                            </div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="price" class="col-form-label">Price</label>
													<input type="number" class="form-control" id="price" placeholder="Price" name="price" min="1"  oninput="validity.valid||(value='');" value="<?php if (isset($row['price'])) {
														echo $row['price'];	} ?>" required>
												</div>
												<div class="form-group">
												<label for="p_type" class="col-form-label">Product Category 1</label>
												<select class="form-control selectpicker m_ctg" name="m_ctg" id="countySel" size="1" required>
													<?php if(isset($row['m_ctg'])) { ?>
													<option value="<?php echo $row['m_ctg'];  ?>" selected="selected"><?php echo $row['m_ctg'];  ?></option>	
													  <?php	}else{  ?>
														<option value="" selected="selected">Select  Category 1</option>
													 <?php  } ?>
												</select>
											</div>
											<div class="form-group">
											<label for="p_group" class="col-form-label">Product Category 2</label>
											<select class="form-control selectpicker c_ctg" name="c_ctg" id="stateSel" size="1" required>
												<?php if(isset($row['c_ctg'])) { ?>
													<option value="<?php echo $row['c_ctg'];  ?>" selected="selected"><?php echo $row['c_ctg'];  ?></option>	
													  <?php	}else{  ?>
														<option value="" selected="selected">Select  Category 2</option>
													 <?php  } ?>
											</select>
											</div>	
											<div class="form-group">
											<label for="p_group" class="col-form-label">Product Category 3</label>
											<select class="form-control selectpicker s_ctg" name="s_ctg" id="districtSel" size="1">
												<?php if(isset($row['s_ctg'])) { ?>
													<option value="<?php echo $row['s_ctg'];  ?>" selected="selected"><?php echo $row['s_ctg'];  ?></option>	
													  <?php	}else{  ?>
														<option value="" selected="selected">Select  Category 3</option>
													 <?php  } ?>
												</select>
											</div>
											<div class="form-group">
                                                <label for="EAN" class="col-form-label">EAN</label>
                                                <input type="text" class="form-control" id="EAN" placeholder="EAN"
                                                    name="ean" value="<?php if (isset($row['ean'])) {
														echo $row['ean'];	} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="vpn" class="col-form-label">VPN</label>
                                                <input type="text" class="form-control" id="vpn" placeholder="VPN"
                                                    name="vpn" value="<?php if (isset($row['vpn'])) {
														echo $row['vpn'];	} ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fifty_price" class="col-form-label">50 Or More Products Price </label>
                                                <input type="number" class="form-control" id="fifty_price"
                                                    placeholder="50 Or More Products Price" name="fifty_price" min="1"
                                                    oninput="validity.valid||(value='');" value="<?php if (isset($row['fifty_price'])) {
														echo $row['fifty_price'];	} ?>" required>
                                            </div>
											</div>
										  </div>
										<!-- Row end -->
											<div class="form-group">
													<label for="description" class="col-form-label">Product Description</label>
													<textarea  class="summernote" id="description" placeholder="Product Description" rows="6" name="p_description" required> <?php 
													if (isset($row['description'])) {
														echo $row['description'];	} ?></textarea>
													
												</div>
	
										<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12">
											<button type="submit" id="submit" name="edit_product" class="btn btn-primary float-right">Submit</button>
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
		<!--<script src="vendor/apex/apexcharts.min.js"></script>-->
		<!--<script src="vendor/apex/admin/visitors.js"></script>-->
		<!--<script src="vendor/apex/admin/deals.js"></script>-->
		<!--<script src="vendor/apex/admin/income.js"></script>-->
		<!--<script src="vendor/apex/admin/customers.js"></script>-->

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
		  
		     $('.m_ctg').click(function(e) {
                $('.c_ctg').val(' ');
                $('.s_ctg').val(' ');
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

"Scanner and Printer": {
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
"Rack | Accessories " : [],
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