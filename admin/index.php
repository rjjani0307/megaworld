<?php
include "../db.php";

session_start();
if(isset($_SESSION["email"]))
{
 header("location:dashboard.php");
}
if(isset($_POST["login"]))   
{  

  $email = $_POST["email"];
  $password = $_POST["password"];


  $sql = "Select * from admin where email = '" . $email . "' and password = '" . $password . "'";

  $result = mysqli_query($conn,$sql);  
 $user = mysqli_fetch_array($result); 
  if($user)   
  {  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("login_email",$email,time()+ (10 * 365 * 24 * 60 * 60));  
    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["mcw_email"] = $email;
    $_SESSION["mcw_name"] = $user['name'];
     $_SESSION["mcw_position"] = $user['position'];
    
   }  
   else  
   {  
   	$_SESSION["mcw_email"] = $email;
    $_SESSION["mcw_name"] = $user['name'];
     $_SESSION["mcw_position"] = $user['position'];

    if(isset($_COOKIE["mcw_login_email"]))   
    {  
     setcookie ("mcw_login_email","");  
    }  
    if(isset($_COOKIE["mcw_password"]))   
    {  
     setcookie ("mcw_password","");  
    }  
   }  
   header("location:dashboard.php"); 
  }  
  else  
  {  
   $message = "Invalid Login";  
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
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<form method="POST" action="">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="img/mcw_name.jpeg" alt="MCW Admin Login" />
								</a>
								<h5>Login</h5>
								<div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div> 
						  <div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Email Address"  value="<?php if(isset($_COOKIE["login_email"])) { echo $_COOKIE["login_email"]; } ?>" required />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" name="password" required />
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input"  name="remember" id="remember" <?php if(isset($_COOKIE["login_email"])) { ?> checked <?php } ?>>
							<label class="custom-control-label" for="remember">Save credentials.</label>
						</div>
						<hr>
						<button type="submit" name="login"  class="btn btn-primary">Login</button>

							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- Container end -->
	</body>
</html>
