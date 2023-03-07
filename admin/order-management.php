<?php
include "../db.php";
include "session.php";

if(isset($_POST["select"])){
$prom=$_POST["select"];
$order_number = $_POST["order_number"];

$status_update = "UPDATE `order` SET `status`='$prom' WHERE order_number = '$order_number'";
$exec= mysqli_query($conn,$status_update);
                 if ($exec) { 
                     
          ?>    <script>  window.location.replace(window.location.href); </script> <?php
                
        }else{
          ?>   <script>alert('Please Try Again');	</script> <?php
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
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/mcw_logos.jpeg" />

		<!-- Title -->
		 <title>MCW - Mega Computer World</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">
		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
		<link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
            <?php include"side.php";  ?>
            <!-- Sidebar wrapper end -->

            <!-- Page content start  -->
            <div class="page-content">

            <?php  include"head.php";  ?>

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Order Management</li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>	
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-export"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="table-container">
								<div class="t-header">Order Management</div>
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
											    <th>ID</th>
												<th>Order Date</th>
												<th>Order Number</th>
												<th>Product Code</th>
												<th>Product Name</th>
												<th>Quantity</th>
												<th>Total</th>
												<th>Order Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
						                        $view="select * from `order` ORDER BY id desc";
						                        $exe_view=mysqli_query($conn, $view);
						                        while($result=mysqli_fetch_array($exe_view)){
						                  ?>
											<tr>
										    <td><?php echo $result['id'];?></td>
										  <td><?php echo $result['ord_date'];?></td>
										  <td><?php echo $result['order_number'];?></td>
										  <td><?php echo str_replace(',', ',<br>', $result['product_code']);?></td>
										  <td><?php echo str_replace(',', ',<br>', $result['product_name']);?></td>
										  <td><?php echo str_replace(',', ',<br>', $result['quantity']);?></td>
										  <td><?php echo $result['total_amount'];?></td>
										  <td><?php echo $result['status'];?></td>
											 <td>
											<form name="form1" method="post" action="">
											 <input type="hidden" name="order_number" value="<?php echo $result['order_number'];?>">
											<select class="form-control selectpicker" data-width="70%" name="select" onchange="doSelect(this)">
												<option value="-">Select Order Status</option>
												<option value="ordered">Ordered</option>
												<option value="deliverd">Deliverd</option>
											</select>
										    </form>
										</td>
											</tr>
									    <?php   }  ?>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
					<!-- Row end -->

				</div>
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->
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
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>

		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Data Tables -->
		<script src="vendor/datatables/dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>
		
		<!-- Custom Data tables -->
		<script src="vendor/datatables/custom/custom-datatables.js"></script>
		<script src="vendor/datatables/custom/fixedHeader.js"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="vendor/datatables/buttons.min.js"></script>
		<script src="vendor/datatables/jszip.min.js"></script>
		<script src="vendor/datatables/pdfmake.min.js"></script>
		<script src="vendor/datatables/vfs_fonts.js"></script>
		<script src="vendor/datatables/html5.min.js"></script>
		<script src="vendor/datatables/buttons.print.min.js"></script>

		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>
</html>