<?php
session_start();

// if (isset($_POST['value']['type']['color']['size'])) {
//     $_SESSION['value']['type']['color']['size'] = $quanlity;
//   else $_SESSION['value']['type']['color']['size'] = 1;
//  
$str = $_GET["product_url"]."/".$_GET["type"]."/". $_GET["color"]."/".$_GET["size"];
// echo '<br>';
$quanlity = $_GET["quanlity"];
if(!isset($_SESSION["carts"])){
	echo 1;
	$_SESSION["carts"][$str] = $quanlity;
}
else{
	// echo 2;
	if(empty($_SESSION["carts"][$str])){
		// echo 2;
		$_SESSION["carts"][$str] = $quanlity;
	}
	else{
		// echo 3;
		$_SESSION["carts"][$str] = $quanlity+$_SESSION["carts"][$str];
	} 
}	
var_dump($_SESSION["carts"]);