<?php 
include "../db.php";
include"session.php";
    if(isset($_POST["delete"])){
    $id = $_POST["ids"];

	$qry="DELETE FROM  product  WHERE p_id = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
             <script> alert('product Deleted successfully');
             window.location.replace(window.location.href); </script> <?php
         } else{
	  
          ?>   <script>alert('Please Try Again');
          window.location.replace(window.location.href);</script> <?php
        }
    }
    
      if(isset($_POST["active"])){
    $id = $_POST["ids"];

	$qry="UPDATE `product` SET `status`='1' WHERE p_id = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
    <script> alert('Product Actived successfully');
    window.location.replace(window.location.href); </script> <?php
         } } 
         
    
    if(isset($_POST["deactive"])){
    $id = $_POST["ids"];
	$qry="UPDATE `product` SET `status`='0'  WHERE p_id = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
     <script> alert('Product Deactived successfully');
     window.location.replace(window.location.href); </script> <?php
         } }      
    ?>
    <!doctype html>
    <html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="image/mcw_r.jpeg" />

		<!-- Title -->
		 <title>MCW - Mega Computer World</title>
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">
		<!-- Main css -->
		<link rel="stylesheet" href="css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->
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

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
					<?php
			include "head.php";
			?>
				<!-- Header end -->

				<!-- Page header start -->
				
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Products</li>
					</ol>
                    <ul class="app-actions">
							<a href="add-product.php" class="btn btn-secondary">+ Add Product</a>
					</ul>
					
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<div class="table-container">
								<div class="t-header"></div>
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>Id</th>
												<th>Code</th>
											   <th>Name</th>
											  <th>Image</th>
											  <th>Price</th>
											  <th>Category 1</th>
											  <th>Category 2</th>
											  <th>Category 3</th>
											  <th>Stock</th>
											  <th>Action</th>	
											  <th>Manage</th>
											</tr>
										</thead>
										<tbody>
										<?php 
								$review_view="select * from `product` ORDER BY id desc";
							 	$exe_review= mysqli_query($conn, $review_view);
								while($row = mysqli_fetch_array($exe_review))
							                        { 	 ?>
											<tr>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['p_code']; ?></td>
											  <td><?php echo $row['name']; ?></td>
											  <td><img src="products/<?php echo $row['img1']; ?>" class="flag-img" alt="<?php echo $row['name']; ?>"></td>
											  <td><?php echo $row['price']; ?></td>
											   <td><?php echo $row['m_ctg']; ?></td>
											   <td><?php echo $row['c_ctg']; ?></td>
											   <td><?php echo $row['s_ctg']; ?></td>
											    <td><?php echo $row['stock']; ?></td>
											   <form method="post" action="">
                							<input type="hidden" name="ids" value="<?php echo $row['p_id'];?>">
										       <td>
        				                		<div class="td-actions">
        				                	     <a href="product-edit.php?product=<?php echo $row['p_id'];?>"  class="icon blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Product">
        				                	     <i class="icon-save"></i></a>
        				                	     <button id="btn" type="submit" name="delete" data-toggle="tooltip" data-placement="top" title="" onClick="return confirm('Are you sure you want to delete ?')" data-original-title="Delete Product"><i class="icon-cancel"></i></button>      
											</div>
										    </form>
									    	</td>
									    		<td> <form method="post" action="">
                							<input type="hidden" name="ids" value="<?php echo $row['p_id'];?>">
                							<?php
									    		        if($row['status'] == '1'){  ?>
									    		     <button type="submit" name="deactive" class="btn btn-danger">Deactive</button>
									    		      <?php  }else{    ?>
									    		       <button type="submit" name="active" class="btn btn-success">Active</button>
									    		     <?php  } ?>
									    		    </form></td>
											</tr>
												<?php }  ?>
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


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Data Tables -->
		<script src="vendor/datatables/dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>
		 <script>
    //     $(document).ready(function() {
    // $('.custom-table').DataTable( {
    //      "pageLength": 50
         
    //   } );
    // } );
        </script>
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