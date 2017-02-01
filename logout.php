<?php
session_start();
if(isset($_SESSION['customer_email'])) {
	unset($_SESSION['customer_email']);
	session_destroy();
}
if(isset($_SESSION['customer_email'])) {
	unset($_SESSION['mess_email']);
	session_destroy();
}
header("Location: index.php");
exit;
	
?>