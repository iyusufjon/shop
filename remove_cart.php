<?php
session_start();

if (isset($_GET['product_id']) && isset($_GET['count'])) {
	$product_id = $_GET['product_id'];
	$product_count = $_GET['count'];

	if (isset($_SESSION['cart'][$product_id])) {
		$_SESSION['cart']['count'] -= $product_count;
		
		unset($_SESSION['cart'][$product_id]);
	}
	
	echo true;
}

?>