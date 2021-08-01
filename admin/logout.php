<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["valid"]);
   unset($_SESSION["timeout"]);
   unset($_SESSION["customer_id"]);
   unset($_SESSION["pages"]);
   
   header('Refresh: 2; URL = login.php');
?>