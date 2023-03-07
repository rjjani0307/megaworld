<?php
session_start();
unset($_SESSION["mcw_useremail"]);
unset($_SESSION["mcw_username"]);
unset($_SESSION["Filter"]);
unset($_SESSION["mcw_id"]);
unset($_SESSION["mcw_mobile"]);
unset($_SESSION["mcw_address"]);
unset($_SESSION["mcw_pin"]);
unset($_SESSION["mcw_city"]);
unset($_SESSION["mcw_pan"]);
unset($_SESSION["mcw_gst"]);


header("location:index.php");
?>
 