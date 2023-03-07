<?php
session_start();


if(!isset($_SESSION['mcw_useremail']))
{
header("location:index.php");
}

?>