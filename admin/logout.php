 
<?php
session_start();
unset($_SESSION["mcw_email"]);
unset($_SESSION["mcw_name"]);
unset($_SESSION["mcw_position"]);
unset($_SESSION["selected_year"]);
unset($_SESSION["selected_user_year"]);


header("location:index.php");
?>
 