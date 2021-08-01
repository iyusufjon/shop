<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";

require_once "sidebar.php";

$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : NULL;

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
			<div class="col-md-9">
				<h3>Bugungi buyurtmalar</h3>
				<?php 
					echo "<pre>";
					print_r($_SERVER);
					echo "<pre>";
					
					$str = strrev($_SERVER['REQUEST_URI']);

					$str = strstr(strrev(strstr($str, "/", true)), '.', true);

					echo $str;
				 ?>
			</div>
			<div class="col-md-3 pull-right">
				<a href="add_order.php" class="btn btn-primary">Yangi buyurtma qo'shish</a>
			</div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->   
	 <!-- Main content -->
	<section class="content">
	    <div class="container-fluid">
				<div class="row">
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Mahsulot nomi</th>
					      <th scope="col">Soni</th>
					      <th scope="col">Mijoz</th>
					      <th scope="col">Mijoz telefoni</th>
					      <th scope="col">Viloyati</th>
					      <th scope="col">Buyurtma vaqti</th>
					      <th>Tahrirlash</th>
					    </tr>
					  </thead>
					  <tbody>
						<?php
							$where = $customer_id ? 'orders.customer_id='.$customer_id : 1;
							
							$sql = "SELECT orders.id, orders.product_id, product.name AS mah_nomi, orders.status_id, orders.count AS soni, CONCAT(customer.first_Name, ' ', customer.last_Name) as mijoz, customer.phone AS telefon, region.name AS viloyat, date FROM `orders` INNER JOIN product ON orders.product_id = product.id INNER JOIN customer ON orders.customer_id = customer.id INNER JOIN region ON customer.region_id = region.id WHERE $where ORDER BY date DESC";
							//DATE(orders.date) = DATE(NOW())
						$i = 1;
						foreach ($conn->query($sql) as $row) {
						    echo "<tr>";
							    echo "<th scope='row'>" . $i++ . "</th>";
							    echo "<td>" . $row['mah_nomi'] . "</td>";
							    echo "<td>" . $row['soni'] . "</td>";
							    echo "<td>" . $row['mijoz'] . "</td>";
							    echo "<td>" . $row['telefon'] . "</td>";
							    echo "<td>" . $row['viloyat'] . "</td>";
							    echo "<td>" . $row['date'] . "</td>";

							    echo "<td style='color: #fff'>
							    	<a class='btn btn-primary btn-sm' href='order_update.php?id=".$row['id']."'>Tahrirlash</a>";

							    if ($row['status_id'] == 1) {
							    	echo "<a class='btn btn-danger order_canceled btn-sm' data-product='".$row['product_id']."' data-count='".$row['soni']."' data-id='".$row['id']."'>Bekor qilish</a>";
							    } else {
							    	echo "<a class='btn btn-warning btn-sm disabled'>Bekor qilingan</a>";
							    }
							    
							    echo "</td>";
						    echo "</tr>";
						}
						?>
					  </tbody>
					</table>
				</div>
		</div>
	</section>
</div>
<?php require_once "footer.php"; ?>