<?php
session_start();


if(!isset($_SESSION['mcw_email']))
{
header("location:index.php");
}

?>