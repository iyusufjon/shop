<?php
	session_start();

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	require_once "../db.php";
	
	$permission_array = [];
	$old_role_name = '';

	// role nomi bo'yicha routelarni yig'ish
	function pages($role_name) {
		GLOBAL $conn;
		GLOBAL $permission_array;
		GLOBAL $old_role_name;

		// sikllanib qolishni oldini olish maqsadida yozildi
		if ($old_role_name == $role_name) {
			return 1;
		}
		
		$old_role_name = $role_name;

		$sql_child = "SELECT * FROM auth_item_child WHERE parent='".$role_name."'";
		// auth_item_child dan har bir qatorni child ma'lumoti olinmoqda
		$result = $conn->query($sql_child);

		if ($result) {
			while ($item_child = mysqli_fetch_assoc($result)) {
				$role_name = $item_child['child'];

				$sql_route = "SELECT * FROM auth_item WHERE type=3 AND name='".$role_name."'";
				// child ma'lumot asosida auth_item dan faqat route (type=3 yoki url) lar massivga yig'ilmoqda
				$result2 = $conn->query($sql_route);

				if ($result2) {
					$route = mysqli_fetch_assoc($result2);
					
					$permission_array[] = $route['name'];
				}
			}

			return pages($role_name);
		}
	}

	$msg = '';
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND status=1";
		
		if($result = $conn->query($sql)) {
			$user = mysqli_fetch_assoc($result);
			
			$_SESSION['customer_id'] = NULL;

			$sql_customer = "SELECT * FROM customer WHERE user_id='".$user['id']."'";
			if($result = $conn->query($sql_customer)) {
				$customer = mysqli_fetch_assoc($result);

				if ($customer) {
						$_SESSION['customer_id'] = $customer['id'];
				}
			}

			$_SESSION['valid'] = true;
			$_SESSION['timeout'] = time();
			$_SESSION['id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['role_id'] = $user['role_id'];

			$sql_role = "SELECT * FROM roles WHERE role_id=".$user['role_id'];

			$result = $conn->query($sql_role);

			if ($result) {
				$role = mysqli_fetch_assoc($result);

				if ($role) {
					$role_name = $role['role_name'];


					pages($role_name);

					$_SESSION['pages'] = $permission_array;
				}
			}

			if ($_SESSION['cart']['count'] > 0) {
				echo("<script>location.href = 'cabinet.php';</script>");
			} else {
				echo("<script>location.href = 'index.php';</script>");
			}
			
		} else {
			$msg = 'Username yoki parol xato';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="../../index2.html"><b>Admin</b>LTE</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg"><?php echo $msg; ?></p>
			<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
				<div class="input-group mb-3">
					<input type="text" name="username" class="form-control" placeholder="Username">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="remember">
							<label for="remember">
								Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Kirish</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
			<p class="mb-0">
				<a href="register.php" class="text-center">Ro'yhatdan o'tish</a>
			</p>
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
</body>
</html> 