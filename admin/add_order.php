<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";

require_once "sidebar.php";
?>

<div class="content-wrapper">
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" action="insert_update.php">
			<div class="row mt-5">
				<div class="col-md-6">
					<label for="selectRegion">Viloyat</label>
					<select class="custom-select" id="selectRegion" name="region">
					  <option selected>Viloyatni tanlang</option>
						<?php

							$sql = "SELECT * FROM `region` ORDER BY name ASC";

							foreach ($conn->query($sql) as $row) {
							    echo "<option value='".$row['id']."'>".$row['name']."</option>";
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
					<input id="inputFirstname" class="form-control" type="text" name="firstname" placeholder="Ism">
				</div>
				<div class="col-md-4">
					<label for="inputLastname">Familya</label>
					<input id="inputLastname" class="form-control" type="text" name="lastname" placeholder="Familya">
				</div>
				<div class="col-md-4">
					<label for="inputPhone">Telefon</label>
					<input id="inputPhone" class="form-control" type="text" name="phone" placeholder="Telefon">
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
							    echo "<option value='".$row['id']."'>".$row['name']. " - (" . $row['in_stock'] .") ta bor - " . $row['amount'] ."$</option>";
							}
						?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="inputCount">Soni</label>
					<input id="inputCount" class="form-control" type="number" name="count" placeholder="Soni">
				</div>
			</div>
			<div class="container">
				<div class="row mt-4 float-right">
					<input type="submit" value="Saqlash" class="btn btn-primary pr-5 pl-5">
				</div>
			</div>
		</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php require_once "footer.php" ?>
			
<script type="text/javascript">
	$('#inputFirstname').blur(function() {
		console.log($(this).val());
	});

	$('#clickMe').click(function() {
		let id = $(this).data('id');

		$.ajax({
			method: "POST",
			url: "cities.php",
			data: { regionId: id },
			success: function(data) {
				$('#selectCity').html(data);
		    	console.log(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});
	$('#selectRegion').change(function() {
		let regionId = $(this).val();

		$.ajax({
			method: "POST",
			url: "cities.php",
			data: { regionId: regionId },
			success: function(data) {
				$('#selectCity').html(data);
		    	console.log(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});
</script>
