

<?php

// Create connection
$conn = new mysqli('mysql.hostinger.in', 'u748500248_mcw','u748500248_Mcw','u748500248_mcw');
$con = mysqli_connect('mysql.hostinger.in', 'u748500248_mcw','u748500248_Mcw');
mysqli_select_db($con, 'u748500248_mcw');


//$conn = new mysqli('localhost', 'root','','mcw');
//$con = mysqli_connect('localhost', 'root','');
//mysqli_select_db($con, 'mcw');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>