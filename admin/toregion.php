<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";

require_once "sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
        		<div class="card">
	        		<div class="card-header">
	        			Viloyatlarga yuborilishi kerak bo'lgan mahsulotlar
	        		</div>
	        		<div class="card-body">
	        			<table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Viloyat</th>
						      <th scope="col">Mahsulot soni</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php

							$sql = "SELECT region.name, COUNT(orders.id) as soni FROM `orders` INNER JOIN customer ON customer.id = orders.customer_id INNER JOIN region ON region.id = customer.region_id GROUP BY region.name";
							$i = 1;
							foreach ($conn->query($sql) as $row) {
							    echo "<tr>";
							    echo "<th scope='row'>" . $i++ . "</th>";
							    echo "<td>" . $row['name'] . "</td>";
							    echo "<td>" . $row['soni'] . "</td>";
							    echo "</tr>";
							}
							?>
						  </tbody>
						</table>
	        		</div>
	        	</div>
        	</div>
        	
		</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
	

<?php require_once "footer.php"; ?>