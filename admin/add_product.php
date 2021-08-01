<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";

require_once "sidebar.php";

if (isset($_POST['name']) && isset($_POST['category_id']) && isset($_POST['amount']) && isset($_POST['in_stock']) && isset($_FILES['picture'])) {



	$name = $_POST['name'];
    $category_id = $_POST['category_id'];
	$amount = $_POST['amount'];
	$in_stock = $_POST['in_stock'];

	$upload_folder = "../images/";
	$errors = array();

    $file_name = $_FILES['picture']['name'];
    $file_size = $_FILES['picture']['size'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    $file_type = $_FILES['picture']['type'];
    $file_format_arr = explode('.', $file_name);
    $file_ext = strtolower(end($file_format_arr));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Fayl formati JPEG yoki PNG bo`lishi kerak.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File hajmi 2 MB dan katta bo`lmasligi kerak';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $upload_folder . $file_name);

        $file_url = $upload_folder.$file_name;
        
        $sql = "insert into product(name, category_id, amount, in_stock, picture) values('$name', $category_id, $amount, $in_stock, '$file_url')";
        
        if ($conn->query($sql) === TRUE) {
        	echo "Yuklandi";
        } else {
        	echo "Xatolik: ".$conn->error;
        }
        
    } else {
        print_r($errors);
    }
}
?>
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Yangi mahsulot qo'shish</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql);
         ?>
        <form method="POST" enctype="multipart/form-data">
				<div class="col-md-12">
					Nomi: <input type="text" class="form-control" name="name" required>
				</div>
                <div class="col-md-12">
                    Kategoriya:
                    <select id="category_id" name="category_id" class="form-control">
                        <option>Kategoriyani tanlang...</option>
                        <?php while($category = mysqli_fetch_assoc($result)): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
				<div class="col-md-12">
					Narxi: <input type="text" class="form-control" name="amount" required>
				</div>
				<div class="col-md-12">
					Soni: <input type="number" class="form-control" name="in_stock" required>
				</div>
				<div class="col-md-12">
					Rasmi: <input type="file" class="form-control" name="picture" required>
				</div>
				<br>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">Saqlash</button>
				</div>
			
		</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require_once "footer.php" ?>