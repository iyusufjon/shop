<?php
	require_once "../db.php";
	
	$data = "<option selected>Shaharni tanlang</option>";

	if (isset($_POST['regionId']) && $_POST['regionId']) {
		$regionId = $_POST['regionId'];
		$cityId = isset($_POST['cityId']) ? $_POST['cityId'] : NULL;

		$sql = "SELECT * FROM `city` WHERE regionId=$regionId ORDER BY id ASC";


		foreach ($conn->query($sql) as $city) {
			$selected = ($city['id'] == $cityId) ? 'selected' : '';

		    $data .= "<option value='".$city['id']."' ".$selected.">".$city['name']."</option>";
		}
	}

	echo $data;
?>