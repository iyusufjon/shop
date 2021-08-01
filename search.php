<?php
	require_once "db.php";

	$sql = "";

	if (isset($_GET['s']) && $_GET['s']) {
		$search = $_GET['s'];

		$sql = "SELECT * FROM `product` 
        where `name` LIKE '%".$search."%'";
     
	}
?>

<?php foreach ($conn->query($sql) as $row) : ?>

<?php endforeach ?>