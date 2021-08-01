<?php
session_start();

$permission_pages = isset($_SESSION['pages']) ? $_SESSION['pages'] : [];

$str = strrev($_SERVER['REQUEST_URI']);
$route = strstr(strrev(strstr($str, "/", true)), '.', true);

if (!in_array($route, $permission_pages)) {
	die("Ushbu sahifaga ruxsat berilmagan");
}
if (!isset($_SESSION['username']) || time() - $_SESSION['timeout'] > 600) {

	unset($_SESSION["username"]);
	unset($_SESSION["valid"]);
	unset($_SESSION["timeout"]);

	exit(header("Location: login.php"));
}

?>