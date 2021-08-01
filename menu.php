<?php


require_once "db.php";

$sql = "SELECT * FROM category LIMIT 6";


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// die();
$cart_count = (isset($_SESSION['cart']) && isset($_SESSION['cart']['count'])) ? $_SESSION['cart']['count'] : 0;


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Sport magazin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Bosh sahifa <span class="sr-only">(current)</span></a>
            </li>
            <?php foreach ($conn->query($sql) as $row): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?category_id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                </li>
            <?php endforeach ?>
        
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="search.php">
                    <div class = "ui-widget">
                        <input class="form-control mr-sm-2" id="search_product" name="s" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item" style="float: 0">
                <a href="admin/login.php" class="btn btn-default" style="margin-left: 150px">Kirish</a>
                <div style="background-color: orange; width: 120px; margin-left: 10px; float: right; border-radius: 4px; padding: 8px 10px 6px 10px">
                    <a href="cart.php">
                        <span>Shopping</span>
                        <span id="shopping_cart"><?= $cart_count ?></span>
                    </a>
                </div>
            </li>
        </ul>
        
  </div>
</nav>