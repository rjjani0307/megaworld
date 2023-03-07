<?php 
include "../db.php";
include"session.php";
    if(isset($_POST["delete"])){
    $id = $_POST["ids"];

	$qry="DELETE FROM  blog  WHERE id = '$id'";
  	$exec= mysqli_query($conn,$qry);
    if ($exec) {  
    ?>  
             <script> alert('Blog Deleted successfully');
             window.location.replace(window.location.href); </script> <?php
         } else{
	  
          ?>   <script>alert('Please Try Again');
          window.location.replace(window.location.href);</script> <?php
        }
    }
    
        
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="img/mcw_logos.jpeg" />

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
						<li class="breadcrumb-item active">Blog</li>
					</ol>
                    <ul class="app-actions">
							<a href="add-blog.php" class="btn btn-secondary">+ Add Blog	</a>
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
											   <th>Name</th>
											  <th>Image</th>
											  <th>Content</th>
											  <th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
								$review_view="select * from `blog` ORDER BY id desc";
							 	$exe_review= mysqli_query($conn, $review_view);
								while($row = mysqli_fetch_array($exe_review))
							                        { 	 ?>
											<tr>
											  <td><?php echo $row['name']; ?></td>
											  <td><img src="blog/<?php echo $row['image']; ?>" class="flag-img" alt="<?php echo $row['name']; ?>"></td>
											   <td><?php echo $row['content']; ?></td>
											   <form method="post" action="">
                							<input type="hidden" name="ids" value="<?php echo $row['id'];?>">
										       <td>
        				                		<div class="td-actions">
        				                	     <a href="blog-edit.php?id=<?php echo $row['id'];?>"  class="icon blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Blog">
        				                	     <i class="icon-save"></i></a>
        				                	     <button id="btn" type="submit" name="delete" data-toggle="tooltip" data-placement="top" title="" onClick="return confirm('Are you sure you want to delete ?')" data-original-title="Delete Blog"><i class="icon-cancel"></i></button>      
											</div>
										    </form>
									    	</td>
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