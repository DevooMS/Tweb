<?php
	session_start();
	unset($_SESSION['value']);
	header('location:index.php');
?>