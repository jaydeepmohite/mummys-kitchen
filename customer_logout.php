<?php
session_start();
unset($_SESSION['customer_email']);


header("Location: index.php");
exit;
	
?>