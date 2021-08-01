<?php
	require_once "db.php";

	$result = [];

	if (isset($_GET['id']) && $_GET['id']) {
		$id = $_GET['id'];

		$sql = "SELECT customer.first_Name, customer.last_Name, customer.phone, customer.region_id, customer.city_id, product.in_stock, product.name, orders.* 
			FROM orders
			INNER JOIN customer ON customer.id = orders.customer_id
			INNER JOIN product ON product.id = orders.product_id 
			WHERE orders.id=$id";

		$result = mysqli_query($conn, $sql);

		$result = mysqli_fetch_assoc($result);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mahsulotni o'zgartirish</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<?php require_once "menu.php"; ?>

	<?php if (!empty($result)): ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="forma">
						<form method="post" action="insert_update.php">
							<div class="row mt-5">
								<div class="col-md-6">
									<input type="hidden" name="id" value="<?= $result['id'] ?>">
									<input type="hidden" name="customer_id" value="<?= $result['customer_id'] ?>">
									<input type="hidden" name="product_id" value="<?= $result['product_id'] ?>">
									<input type="hidden" name="old_count" value="<?= $result['count'] ?>">

									<label for="selectRegion">Viloyat</label>
									<select class="custom-select" id="selectRegion" name="region" onchange ="loadCities()">
									  <option selected>Viloyatni tanlang</option>
										<?php

											$sql = "SELECT * FROM `region` ORDER BY name ASC";

											foreach ($conn->query($sql) as $row) {
												$selected = ($result['region_id'] == $row['id']) ? 'selected' : '';
											    echo "<option value='".$row['id']."' ".$selected.">".$row['name']."</option>";
											}
										?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="selectCity">Shahar</label>
									<select class="custom-select" id="selectCity" name="city">
										
									</select>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<label for="inputFirstname">Ism</label>
									<input id="inputFirstname" class="form-control" type="text" disabled="disabled" name="firstname" placeholder="Ism" value="<?= $result['first_Name'] ?>">
								</div>
								<div class="col-md-4">
									<label for="inputLastname">Familya</label>
									<input id="inputLastname" class="form-control" type="text" name="lastname" disabled="disabled" placeholder="Familya" value="<?= $result['last_Name'] ?>">
								</div>
								<div class="col-md-4">
									<label for="inputPhone">Telefon</label>
									<input id="inputPhone" class="form-control" type="text" name="phone" disabled="disabled" placeholder="Telefon" value="<?= $result['phone'] ?>">
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-6">
									<label for="selectProduct">Mahsulot</label>
									<select class="custom-select" id="selectProduct" name="product">
									  <option selected>Mahsulotni tanlang</option>
									  <?php
											$sql = "SELECT * FROM `product` ORDER BY name ASC";
											
											foreach ($conn->query($sql) as $row) {
												$selected = ($result['product_id'] == $row['id']) ? 'selected' : '';
											    echo "<option value='".$row['id']."' ".$selected.">".$row['name']. " - (" . $row['in_stock'] .") ta bor - " . $row['amount'] ."$</option>";
											}
										?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="inputCount">Soni</label>
									<input id="inputCount" class="form-control" type="number" name="count" placeholder="Soni" value="<?= $result['count'] ?>">
								</div>
							</div>
							<div class="container">
								<div class="row mt-4 float-right">
									<input type="submit" value="Saqlash" class="btn btn-info pr-5 pl-5">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php else: ?>
		<h3>Bazada ma'lumot topilmadi</h3>
	<?php endif ?>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

		<script type="text/javascript">
			
			$(document).ready(function() {
				loadCities();
			});

			function loadCities() {
				let regionId = $('#selectRegion').val();
				let cityId = "<?= $result['city_id'] ?>";

				$.ajax({
					method: "POST",
					url: "cities.php",
					data: { regionId: regionId, cityId: cityId },
					success: function(data) {
						$('#selectCity').html(data);
				    	
				    },
				    error: function (jqXHR, textStatus, errorThrown) {
						console.log(jqXHR);
				      	console.log(textStatus);
				      	console.log(errorThrown);
				    }
				});
			}
	</script>
</body>
</html>