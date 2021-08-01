<?php
session_start();

require_once "db.php";

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;

$arr = [];

$sql_cart = "";

if ($cart) {
	foreach ($cart as $key => $value) {
		if ($key == 'count') {
			continue;
		}
		$arr[$key] = $value['count'];
	}
	$product_id = implode(",", array_keys($arr));


	$sql_cart = "SELECT * FROM product WHERE id IN($product_id)";
}


$inc = 1;
$all_sum = 0;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop.loc</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<?php require_once "menu.php"; ?>

	<div class="container-fluid">
		<div class="row">
			<h3 style="text-align: center;">Savatcha</h3>
			<?php if ($cart['count']): ?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td></td>
							<td>№</td>
							<td>Nomi</td>
							<td>Rasmi</td>
							<td>Narxi</td>
							<td>Soni</td>
							<td>Umumiy summasi</td>
						</tr>
					</thead>

					<tbody>

						<?php foreach ($conn->query($sql_cart) as $key => $product): ?>
							<?php
								$product_count = isset($arr[$product['id']]) ? $arr[$product['id']] : 0;
								$all_sum += $product_count * $product['amount'];
							?>
							<tr>
								<td class="remove_cart" data-id="<?= $product['id'] ?>" data-count="<?= $product_count ?>"><b><span style="color: red">x</span></b></td>
								<td><?= $inc ++ ?></td>
								<td><?= $product['name'] ?></td>
								<td><img src="<?= str_replace("../", "", $product['picture']) ?>" width="60px"></td>
								<td><?= $product['amount'] ?></td>
								<td><input type="number" class="product_count" data-p_id="<?= $product['id'] ?>" min="1" name="product_count" value="<?= $product_count ?>"></td>
								<td align="right"><?= $product_count * $product['amount'] ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="6">Jami: </td>
							<td align="right"><b><?= $all_sum ?></b></td>
						</tr>
					</tbody>
				</table>
				<div class="clearfix"></div>
				<a href="admin/cabinet.php" class="btn btn-primary pull-right">Buyurtma berish</a>
			<?php else: ?>
				<div class="clearfix"></div>
				<p>Savatcha bo'sh</p>
			<?php endif ?>
			
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
	
	$('.remove_cart').click(function() {
		let id = $(this).data('id');
		let product_count = $(this).data('count');
		
		$.ajax({
			method: "GET",
			url: "remove_cart.php",
			data: { product_id: id, count: product_count },
			success: function(data) {
				// $('#shopping_cart').html(data);
				location.reload();
		    	// console.log(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});

	$('.product_count').change(function(){
		let id = $(this).data('p_id');
		let count = $(this).val(); 

		console.log(count);

		$.ajax({
			method: "GET",
			url: "change_cart.php",
			data: { product_id: id, count: count},
			success: function(data) {
				location.reload();
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});
</script>