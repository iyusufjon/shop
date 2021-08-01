<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";

require_once "sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
			<div class="col-md-9">
				<h3>Qolgan mahsulotlar</h3>
			</div>
			<div class="col-md-3 pull-right">
				<a href="add_product.php" class="btn btn-primary">Yangi mahsulot qo'shish</a>
			</div>
		</div>
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
			      <th scope="col">Qolgan soni</th>
			      <th scope="col">Rasmi</th>
			    </tr>
			  </thead>
			  <tbody>
				<?php

				$sql = "SELECT * FROM `product` ORDER BY `in_stock` ASC";
				$i = 1;
				foreach ($conn->query($sql) as $row) {
				    echo "<tr>";
				    echo "<th scope='row'>" . $i++ . "</th>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['in_stock'] . "</td>";
				    echo "<td>";
				    	if ($row['picture']) {
				    		echo "<img src='".$row['picture']."' width='60px'>";
				    	}
				    	
				    echo "</td></tr>";
				}
				?>
			  </tbody>
			</table>
		</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php require_once "footer.php"; ?>