<?php
require_once "auth.php";
require_once "../db.php";

require_once "header.php";
?>

<?php require_once "sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <p>Bu yerda Content ko'rinadi</p>
        <?php

          echo "<pre>";
            print_r($_SESSION);
          echo "<pre>";
        ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php require_once "footer.php" ?>