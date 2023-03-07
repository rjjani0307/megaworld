<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_REQUEST["quantity"])) {
			
		
		$productByp_id = $db_handle->runQuery("SELECT * FROM product WHERE p_id='" . $_GET["p_id"] . "'");
		$itemArray = array($productByp_id[0]["p_id"]=>array('name'=>$productByp_id[0]["name"], 'p_id'=>$productByp_id[0]["p_id"], 'quantity'=>$_REQUEST["quantity"], 'sell_price'=>$productByp_id[0]["price"], 'img1'=>$productByp_id[0]["img1"], 'p_code'=>$productByp_id[0]["p_code"]));
			
			if(!empty($_SESSION["cart_item"])) {
				
				if(in_array($productByp_id[0]["p_id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByp_id[0]["p_id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$main_qty = $_SESSION["cart_item"][$k]["quantity"];
								$new_qty =  $_REQUEST["quantity"];
								$totl_qty = $main_qty + $new_qty;
								
								if (isset($_POST["decqty"])) {
									$_SESSION["cart_item"][$k]["quantity"] -= $_REQUEST["quantity"];
									if ($_SESSION["cart_item"][$k]["quantity"] <= 0) {
										 header("Location: ".$_SERVER['PHP_SELF']."?action=remove&p_id=".$_GET["p_id"]."&size=".$_REQUEST["size"]);
										 	exit();
									}else{
										header('location:'.$_SERVER['REQUEST_URI'].'');
									}
								}else{
									if ( $totl_qty < 100) {
								$_SESSION["cart_item"][$k]["quantity"] += $_REQUEST["quantity"];
								 ?>  <script>window.history.back(-1);</script>  <?php
								//header('location:'.basename($_SERVER['PHP_SELF']).'?p_id='.$_GET["p_id"]);
								}else{	echo "<script>alert('Maximum 99 Quantity is Allowed');</script>";
								
									}
							}
						}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					 ?>  <script>window.history.back(-1);</script>  <?php
				}
				
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["p_id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
      }
    }


  // add wishlist
  $quantity = "1";
if(!empty($_GET["actions"])) {
switch($_GET["actions"]) {
	case "add":

			$productByCode_wish = $db_handle->runQuery("SELECT * FROM product WHERE p_id='" . $_GET["p_id"] . "'");
			$itemArray_wish = array($productByCode_wish[0]["p_id"]=>array('name'=>$productByCode_wish[0]["name"], 'p_id'=>$productByCode_wish[0]["p_id"], 'quantity'=>$quantity, 'sell_price'=>$productByCode_wish[0]["price"], 'img1'=>$productByCode_wish[0]["img1"]));
			
			if(!empty($_SESSION["add_wishlist"])) {
				if(in_array($productByCode_wish[0]["p_id"],array_keys($_SESSION["add_wishlist"]))) {
					foreach($_SESSION["add_wishlist"] as $k => $v) {
							if($productByCode_wish[0]["p_id"] == $k) {
								// if(empty($_SESSION["add_wishlist"][$k]["quantity"])) {
								// 	$_SESSION["add_wishlist"][$k]["quantity"] = 0;
								// }
								$_SESSION["add_wishlist"][$k]["quantity"] = 1;
								 ?>  <script>window.history.back(-1);</script>  <?php
							}
					}
				} else {
					$_SESSION["add_wishlist"] = array_merge($_SESSION["add_wishlist"],$itemArray_wish);
					 ?>  <script>window.history.back(-1);</script>  <?php
				}
			} else {
				$_SESSION["add_wishlist"] = $itemArray_wish;
				 ?>  <script>window.history.back(-1);</script>  <?php
			}
		
	break;
	case "remove":
		if(!empty($_SESSION["add_wishlist"])) {
			foreach($_SESSION["add_wishlist"] as $k => $v) {
					if($_GET["p_id"] == $k)
						unset($_SESSION["add_wishlist"][$k]);				
					if(empty($_SESSION["add_wishlist"]))
						unset($_SESSION["add_wishlist"]);
						 ?>  <script>window.history.back(-1);</script>  <?php
			}
		}
	break;
	case "empty":
		unset($_SESSION["add_wishlist"]);
		 ?>  <script>window.history.back(-1);</script>  <?php
	break;	
		}
	}
?>