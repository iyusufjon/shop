<?php
require_once "db.php";

$sql_product = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 4";

if (isset($_GET['last_id']) && $_GET['last_id']) {
	$last_id = $_GET['last_id'];

	$sql_product = "SELECT * FROM product WHERE id < $last_id ORDER BY id DESC LIMIT 4";
}

$result = "";
?>
<?php foreach ($conn->query($sql_product) as $row): ?>
    <?php $result .= '<div class="col-md-3">
    	<div class="card mt-4">
    		<div class="thumbnail" style="border: 1px solid #eee; min-height: 332px; padding: 5px">
		      <a href="#">
		      	<img src="'. str_replace("../", "", $row['picture']) .'" alt="Lights" style="width:100%">
		        <div class="caption">
		        	<h4>'. $row["name"] .'</h4>
		          	<p>
		          		<button class="btn btn-info btn-sm">'. $row['amount'] .' so\'m</button>
		          	</p>
		          	<button class="btn btn-warning add_product btn-sm w-100" data-id="'. $row['id'] .'">Cart</button>
		        </div>
		      </a>
		    </div>
    	</div>
	</div>';

	$last_id = $row['id'];
	?>
<?php endforeach ?>

<?php
	if (!empty($result)) {
		$result .= '<div class="col-md-4 my-5 offset-4" id="more_'. $row['id'] .'" >
            	<button class="btn btn-primary w-100 btn-outline-primary add_more" data-id="'. $last_id .'">Ko\'proq ko\'rish</button>
            </div>
            <div class="clearfix"></div>
            ';
	}
?>
<?php echo $result; ?>