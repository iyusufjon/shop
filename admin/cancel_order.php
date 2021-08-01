<?php 
require_once "db.php";

if (isset($_POST['orderId']) && $_POST['orderId']) {
	$error = 1;

	$orderId = isset($_POST['orderId']) ? $_POST['orderId'] : 0;
	$productId = isset($_POST['productId']) ? $_POST['productId'] : 0;

	$count = (isset($_POST['count']) && $_POST['count']) ? $_POST['count'] : 0;

	$order_update_sql = "UPDATE orders SET status_id=2 WHERE id=$orderId AND status_id=1";

	$valid1 = $conn->query($order_update_sql);
	$valid2 = true;

	if ($valid1 && $count) {
		$sql = "UPDATE product SET in_stock = in_stock + $count WHERE id=$productId";

		$valid2 = $conn->query($sql);
	}

	if ($valid1 == true && $valid2 == true) {
		$error = 0;
	}

	echo $error;
}
?>