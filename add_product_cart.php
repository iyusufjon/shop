<?php
session_start();

if (isset($_GET['product_id']) && $_GET['product_id']) {
	$product_id = $_GET['product_id'];

	if (isset($_SESSION['cart'][$product_id])) {
		$_SESSION['cart']['count'] += 1;
		$_SESSION['cart'][$product_id]['count'] += 1;

		// unset($_SESSION['cart'][$product_id]);
	} else {
		$_SESSION['cart']['count'] += 1;
		$_SESSION['cart'][$product_id]['count'] = 1;
		// $_SESSION['cart']['count'] += 1;
	}
	
	echo $_SESSION['cart']['count'];
}

?>