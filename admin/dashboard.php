<?php
include "../db.php";
include "session.php";

	$_SESSION['selected_year'] = date("Y");	
	$_SESSION['selected_user_year'] = date("Y");

	if(isset($_POST['selected_year']))
	{
		$_SESSION['selected_year'] = $_POST['selected_year'];
	
	}
    if(isset($_POST['selected_user_year']))
	{
		$_SESSION['selected_user_year'] = $_POST['selected_user_year'];
	
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
            
            <?php include"side.php";  ?>
            <!-- Sidebar wrapper end -->

            <!-- Page content start  -->
            <div class="page-content">

            <?php  include"head.php";  ?>

                <!-- Page header start -->
                <div class="page-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Admin Dashboard</li>
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
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                           <a href="users.php">
                            <div class="info-stats4">
                                <div class="info-icon">
                                    <i class="icon-eye1"></i>
                                </div>
                                <div class="sale-num">
                                   <?php
									$sql="SELECT * FROM `users`";
                    				if ($result=mysqli_query($conn,$sql))
                    				  {
                    				  $rowcount=mysqli_num_rows($result);
                    				  echo "<h3>$rowcount</h3>";
                    				  mysqli_free_result($result);
                    				  }  ?>
                                    <p>Users</p>
                                </div>
                            </div></a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                             <a href="all-orders.php">
                            <div class="info-stats4">
                                <div class="info-icon">
                                    <i class="icon-shopping-cart1"></i>
                                </div>
                                <div class="sale-num">
                                    <?php
									$sql="SELECT * FROM `order`";
                    				if ($result=mysqli_query($conn,$sql))
                    				  {
                    				  $rowcount=mysqli_num_rows($result);
                    				  echo "<h3>$rowcount</h3>";
                    				  mysqli_free_result($result);
                    				  }  ?>
                                    <p>Orders</p>
                                </div>
                            </div></a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                             <a href="products.php">
                            <div class="info-stats4">
                                <div class="info-icon">
                                    <i class="icon-shopping-bag1"></i>
                                </div>
                                <div class="sale-num">
                                    <?php
									$sql="SELECT * FROM `product`";
                    				if ($result=mysqli_query($conn,$sql))
                    				  {
                    				  $rowcount=mysqli_num_rows($result);
                    				  echo "<h3>$rowcount</h3>";
                    				  mysqli_free_result($result);
                    				  }  ?>
                                    <p>Products</p>
                                </div>
                            </div></a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                             <a href="reviews.php">
                            <div class="info-stats4">
                                <div class="info-icon">
                                    <i class="icon-activity"></i>
                                </div>
                                <div class="sale-num">
                                     <?php
									$sql="SELECT * FROM `review`";
                    				if ($result=mysqli_query($conn,$sql))
                    				  {
                    				  $rowcount=mysqli_num_rows($result);
                    				  echo "<h3>$rowcount</h3>";
                    				  mysqli_free_result($result);
                    				  }  ?>
                                    <p>Reviews</p>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
								<div class="card-header">
									<div class="row gutters">
										<div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-6">
										<div class="card-title">Orders</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
									<form name="form1" method="post" action="">
											<select class="form-control selectpicker" data-width="70%" name="selected_year" onchange="doSelect(this)">
										<option value="-">Change Year</option>
												
									     <?php 	$conts="SELECT year(ord_month)
										 from `order`
										 where year(ord_month) != 'NULL'
								         group by year(ord_month)
								         order by year(ord_month)";
										 $run=mysqli_query($conn,$conts);
										 while($row=mysqli_fetch_array($run))
											 { 
											  echo '<option value="'.$row['year(ord_month)'].'">'.$row['year(ord_month)'].'</option>';
														   
											  }	
												?>
											
											</select>
										</form>
										</div>
									</div>

								
								</div>
								<div class="card-body">
									<div id="mcw-order-column-graph" class="primary-graph"></div>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
							<div class="card-header">
									<div class="row gutters">
										<div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-6">
										<div class="card-title">Users</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
									<form name="form1" method="post" action="">
											<select class="form-control selectpicker" data-width="70%" name="selected_user_year" onchange="doSelect(this)">
										<option value="-">Change Year</option>
												
									     <?php 	$conts="SELECT year(ctsp)
										 from users
										 where year(ctsp) != 'NULL'
								         group by year(ctsp)
								         order by year(ctsp)";
										 $run=mysqli_query($conn,$conts);
										 while($row=mysqli_fetch_array($run))
											 { 
											  echo '<option value="'.$row['year(ctsp)'].'">'.$row['year(ctsp)'].'</option>';
														   
											  }	
												?>
											
											</select>
										</form>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div id="user-graph"></div>
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

        <!-- Polyfill JS -->
        <script src="vendor/polyfill/polyfill.min.js"></script>

        <!-- Apex Charts -->
      <script src="vendor/apex/apexcharts.min.js"></script>
	<!--<script src="vendor/apex/examples/line/basic-line-graph.js"></script>-->
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
        <script>
            var options = {
	chart: {
		height: 350,
		type: 'bar',
	},
	plotOptions: {
		bar: {
			dataLabels: {
				position: 'top', // top, center, bottom
			},
		}
	},
	dataLabels: {
		enabled: true,
		formatter: function (val) {
			return val + " ";
		},
		offsetY: -20,
		style: {
			fontSize: '12px',
			colors: ["#2e323c"]
		}
	},
	series: [{
		name: 'Monthly Orders',
		data: [ <?php
		 if(isset($_SESSION['selected_year']))
        	{
        		$selected_year = $_SESSION['selected_year'];
        	
        	}
						  for ($i=1; $i <= 12 ; $i++){
						      
						$view="select month(ord_month) as month,year(ord_month) as year,count(*) as count from `order` WHERE year(ord_month) = '$selected_year' AND month(ord_month) = '$i' group by year(ord_month),month(ord_month) order by year(ord_month),month(ord_month)";
                            
                        $exe_view=mysqli_query($conn, $view);
                        if ($exe_view->num_rows > 0) {
                        while($result=mysqli_fetch_array($exe_view)){
                               echo  $result['count'] . ",";
                                }
                               }else{  echo "0,";  }
                            }	
							?>]
	}],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		position: 'top',
		labels: {
			offsetY: -18,
		},
		axisBorder: {
			show: false
		},
		axisTicks: {
			show: true
		},
		crosshairs: {
			fill: {
				type: 'gradient',
				gradient: {
					colorFrom: '#225de4',
					colorTo: '#81a3f0',
					stops: [0, 100],
					opacityFrom: 0.4,
					opacityTo: 0.5,
				}
			}
		},
		tooltip: {
			enabled: true,
			offsetY: -35,
		}
	},
	fill: {
		gradient: {
			shade: 'light',
			type: "horizontal",
			shadeIntensity: 0.25,
			gradientToColors: undefined,
			inverseColors: true,
			opacityFrom: 1,
			opacityTo: 1,
			stops: [50, 0, 100, 100]
		},
	},
	yaxis: {
		axisBorder: {
			show: false
		},
		axisTicks: {
			show: false,
		},
		labels: {
			show: false,
			formatter: function (val) {
				return val + " ";
			}
		}
	},
	title: {
		text: 'Monthly Orders From Mega Compu World',
		floating: true,
		offsetY: 320,
		align: 'center',
		style: {
			color: '#2e323c'
		}
	},
	colors: ['#1646b3', '#194eca', '#225de4', '#4274e8', '#628cec', '#81a3f0'],
}
var chart = new ApexCharts(
	document.querySelector("#mcw-order-column-graph"),
	options
);
chart.render();


var options = {
	chart: {
		height: 350,
		type: 'line',
		zoom: {
			enabled: false
		}
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		curve: 'straight',
		width: 3,
	},
	series: [{
		name: "Users",
		data: [<?php
		 if(isset($_SESSION['selected_user_year']))
            	{
            		$selected_user_year = $_SESSION['selected_user_year'];
            	
            	}
						  for ($i=1; $i <= 12 ; $i++){
						      
						$view="select month(ctsp) as month,year(ctsp) as year,count(*) as count from `users` WHERE year(ctsp) = '$selected_user_year' AND month(ctsp) = '$i' group by year(ctsp),month(ctsp) order by year(ctsp),month(ctsp)";
                            
                        $exe_view=mysqli_query($conn, $view);
                        if ($exe_view->num_rows > 0) {
                        while($result=mysqli_fetch_array($exe_view)){
                               echo  $result['count'] . ",";
                                }
                               }else{  echo "0,";  }
                            }	
							?>]
	}],
	title: {
		text: 'Users by Month',
		align: 'center'
	},
	grid: {
		row: {
			colors: ['#f5f9fe', '#ffffff'], // takes an array which will be repeated on columns
			opacity: 0.5
		},
	},
	xaxis: {
		categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
	},
	theme: {
		monochrome: {
			enabled: true,
			color: '#225de4',
			shadeIntensity: 0.1
		},
	},
	fill: {
		type: 'gradient',
		gradient: {
			shade: 'light',
			colors: ['#1646b3', '#194eca', '#225de4', '#4274e8', '#628cec', '#81a3f0'],
			shadeIntensity: 1,
			type: 'horizontal',
			opacityFrom: 1,
			opacityTo: 1,
			stops: [0, 100, 100, 100, 100]
		},
	},
	markers: {
		size: 0,
		opacity: 0.2,
		colors: ['#225de4'],
		strokeColor: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7,
		}
	},
}

var chart = new ApexCharts(
	document.querySelector("#user-graph"),
	options
);

chart.render();
        </script>
        <!-- Main JS -->
        <script src="js/main.js"></script>

    </body>
    </html>