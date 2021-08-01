<?php
require_once "auth.php";
require_once "../db.php";

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : NULL;
$arr = [];

$sql_cart = "";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if ($cart && $customer_id) {
	foreach ($cart as $product_id => $value) {
		if ($product_id == 'count') {
			continue;
		}
		$sql_cart = "INSERT INTO orders (count, customer_id, product_id) VALUES('".$value['count']."', '".$customer_id."', '".$product_id."')";
		if ($conn->query($sql_cart) == TRUE) {
			echo "Ma'lumot qo'shildi<br>";

			unset($_SESSION['cart'][$product_id]);
		} else {
			echo "Xatolik sodir bo'ldi<br>";
		}
	}
	unset($_SESSION['cart']);
	
} else {
	 // header('Refresh: 1; URL = login.php');
	echo("<script>location.href = 'login.php';</script>");
}

?>