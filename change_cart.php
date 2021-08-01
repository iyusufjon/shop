<?php

session_start();

if (isset($_GET['product_id']) && isset($_GET['count'])) {

	$product_id = $_GET['product_id']*1;
	$count = $_GET['count']*1;

	if (isset($_SESSION['cart'][$product_id])) {
		$old_product = $_SESSION['cart'][$product_id]['count'];

		$_SESSION['cart'][$product_id]['count'] = $count;

		$_SESSION['cart']['count'] += $count - $old_product;
	}
	echo $_SESSION['cart'][$product_id]['count'];
}

?>