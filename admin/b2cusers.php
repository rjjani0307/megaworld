<?php
include "../db.php";
include "session.php";

 if(isset($_POST["delete"])){
    $id = $_POST["ids"];

	$qry="DELETE FROM  `b2cusers`  WHERE id = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
             <script> alert('User Deleted successfully');
             window.location.replace(window.location.href); </script> <?php
         } else{
	  
          ?>   <script>alert('Please Try Again');
          window.location.replace(window.location.href);</script> <?php
        }
    }
    
      if(isset($_POST["active"])){
    $id = $_POST["ids"];    

	$qry="UPDATE `b2cusers` SET `status`='1' WHERE `id` = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
    <script> alert('User Actived successfully');
    window.location.replace(window.location.href); </script> <?php
         } } 
         
         
        if(isset($_POST["deactive"])){
    $id = $_POST["ids"];
	$qry="UPDATE `b2cusers` SET `status`='0'  WHERE `id` = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
     <script> alert('User Deactived successfully');
     window.location.replace(window.location.href); </script> <?php
         } }  
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
         <style>
        .table .flag-img {
    width: auto;
    height: 60px;
        }
        #btn{
    margin: 0 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    color: #ffffff;
    background: #ee6300;
    border: none;
}
    </style>
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
						<li class="breadcrumb-item active">All B2C Users</li>
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
								<div class="t-header">Registered B2C Users</div>
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
											    <th>User  id</th>
												<th>Name</th>
												<th>Email id</th>
												<th>Contact Number</th>
												<th>Pan</th>
												<th>Address</th>
												<th>City</th>
												<th>Action</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
										<?php
						                        $view="select * from b2cusers ORDER BY id desc";
						                        $exe_view=mysqli_query($conn, $view);

						                        while($result=mysqli_fetch_array($exe_view)){
						                  ?>
											<tr>
											  <td><?php echo $result['user_id'];?></td>
											  <td><?php echo $result['fullname'];?></td>
											  <td><?php echo $result['o_email'];?></td>
											  <td><?php echo $result['o_number'];?></td>
											  <td><?php echo $result['pan'];?></td>
											  <td><?php echo $result['address'];?></td>
											  <td><?php echo $result['city'];?></td>
											  <td> <form method="post" action="">
                							<input type="hidden" name="ids" value="<?php echo $result['id'];?>">
                							<?php
									    		        if($result['status'] == '1'){  ?>
									    		     <button type="submit" name="deactive" class="btn btn-danger">Deactive</button>
									    		      <?php  }else{    ?>
									    		       <button type="submit" name="active" class="btn btn-success">Active</button>
									    		     <?php  } ?>
									    		    </form></td>
											
											<form method="post" action="">
                							<input type="hidden" name="ids" value="<?php echo $result['id'];?>">
										       <td>
        				                		<div class="td-actions">
        				                	     <!--<a href="product-edit.php?product=<?php echo $result['id'];?>" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Product">-->
        				                	     <!--<i class="mdi mdi-pen"></i></a>-->
        				                	    <button id="btn" type="submit" name="delete" data-toggle="tooltip" data-placement="top" title="" onClick="return confirm('Are you sure you want to delete ?')" data-original-title="Delete User"><i class="icon-cancel"></i></button>         
											</div>
										    </form>
									    <?php   }  ?></tr>
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