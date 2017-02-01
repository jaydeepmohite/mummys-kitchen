<?php
session_start();
unset($_SESSION['mess_email']);

header("Location: index.php");
exit;
	
?>