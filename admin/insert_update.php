<?php
require_once "../db.php";

if ( isset($_POST['region']) and isset($_POST['city']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['phone']) and isset($_POST['product']) and isset($_POST['count'])) {
	if (empty($_POST['region']) or empty($_POST['city']) or empty($_POST['firstname']) or empty($_POST['lastname']) or empty($_POST['phone']) or empty($_POST['product']) or empty($_POST['count'])) {
		echo("Kerakli maydonlar to'ldirilmadi!");
	} else {
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		$region_id = $_POST['region'];
		$city_id = $_POST['city'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$product_id = $_POST['product'];
		$count = $_POST['count'];
		$customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : NULL;
		$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : NULL;
		$old_count = isset($_POST['old_count']) ? $_POST['old_count'] : NULL;



		if ($id) { // update
			$delta_count = $old_count - $count; 
			// Mijoz qo'shish
			$customer_update = "UPDATE customer SET region_id=".$region_id.", city_id=".$city_id.", first_Name='".$firstname."', last_Name='".$lastname."', phone='".$phone."' WHERE id = $customer_id";
			
			if ($conn->query($customer_update) === TRUE) {
			} else {
			    echo "Mijoz kiritishda xatolik: " . $conn->error;
			}
			
			// Order qo'shish

			$order_update = "UPDATE orders SET count=$count, customer_id=$customer_id, product_id=$product_id WHERE id=$id";

			if ($conn->query($order_update) === TRUE) {
			    $minus_product = "UPDATE `product` SET `in_stock` = in_stock + " . $delta_count . " WHERE id = $product_id";
			    $conn->query($minus_product);

			} else {
			    echo "Order kiritishda xatolik: " . $conn->error;
			}
		} else { // insert
			// Mijoz qo'shish
			$customer_insert = "INSERT INTO customer (region_id, city_id, first_Name, last_Name, phone)
			VALUES (".$region_id.", ".$city_id.", '".$firstname."', '".$lastname."', '".$phone."');";

			if ($conn->query($customer_insert) === TRUE) {
			} else {
			    echo "Mijoz kiritishda xatolik: " . $conn->error;
			}
			$customer_id = $conn->insert_id;
			// Order qo'shish

			$order_insert = "INSERT INTO orders (count, customer_id, product_id)
			VALUES (".$count.", ".$customer_id.", ".$product_id . ")";

			if ($conn->query($order_insert) === TRUE) {
			    $minus_product = "UPDATE `product` SET `in_stock` = in_stock - " . $count . " WHERE id = $product_id";
			    $conn->query($minus_product);

			} else {
			    echo "Order kiritishda xatolik: " . $conn->error;
			}
		}
		
		
		header("Location: orders.php");
	}
}
?>