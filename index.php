<?php
require_once('db.php');

session_start();

// session_destroy();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop.loc</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
</head>
<body>
	<?php require_once "menu.php"; ?>
	<?php
		$where = '1';
		if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
			$where = 'category_id = '.$_GET['category_id'];
		}
		
		$sql_product = "SELECT * FROM product WHERE $where ORDER BY id DESC LIMIT 4";
		$last_id = 0;
	?>
	<div class="container">
		<div class="row" id="products">
			<?php foreach ($conn->query($sql_product) as $row): ?>
                <div class="col-md-3">
                	<div class="card mt-4">
                		<div class="thumbnail" style="border: 1px solid #eee; min-height: 332px; padding: 5px">
					      <a href="#">
					        <img src="<?= str_replace("../", "", $row['picture']) ?>" alt="Lights" style="width:100%">
					        <div class="caption">
					        	<h4><a href="product.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h4>
					          	<p>
					          		<button class="btn btn-info btn-sm"><?= $row['amount'] ?> so'm</button>
					          	</p>
					          	<button class="btn btn-warning add_product btn-sm w-100" data-id="<?= $row['id'] ?>">Cart</button>
					        </div>
					      </a>
					    </div>
                	</div>
				</div>
				<?php $last_id = $row['id']; ?>
				
            <?php endforeach ?>
            <div class="clearfix"></div>
            <div class="col-md-4 my-5 offset-4" id="more_<?= $row['id'] ?>">
            	<button class="btn btn-primary w-100 btn-outline-primary add_more" data-id="<?= $last_id ?>">Ko'proq ko'rish</button>
            </div>
		</div>
	</div>
</body>
</html>
<!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
	
	$('.add_product').click(function() {
		let id = $(this).data('id');
		
		$.ajax({
			method: "GET",
			url: "add_product_cart.php",
			data: { product_id: id },
			success: function(data) {
				$('#shopping_cart').html(data);
		    	console.log(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});

	$(document).on('click', '.add_more', function() {
	// $('.add_more').click(function(){
		let id = $(this).data('id');
		
		$.ajax({
			method: "GET",
			url: "more_product.php",
			data: { last_id: id },
			success: function(data) {
				console.log(data);
				$('#more_'+id).remove();

				$('#products').append(data);
				
				// $('#shopping_cart').html(data);
		    },
		    error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
		      	console.log(textStatus);
		      	console.log(errorThrown);
		    }
		});
	});

    $( "#search_product" ).autocomplete({
       source: 'product_search.php',
       minLength: 3,
       focus: function( event, ui ) {
            $( "#search_product" ).val( ui.item.value );
            return false;
        },
        select: function( event, ui ) {
            $( "#search_product" ).val( ui.item.id );
            return true;
        }
    });

</script>