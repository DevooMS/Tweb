<?php
include('db_orders.php');
$emp = new orders();
if(!empty($_POST['action']) && $_POST['action'] == 'getOrders') {
    $emp->getOrders();
}

if(!empty($_GET['action']) && $_GET['action'] == 'confirmOrders') {
	echo"i";
	$emp->confirmOrders();
}

if(!empty($_POST['action']) && $_POST['action'] == 'buyCart') {
	$emp->buyCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'fetchCart') {
	$emp->fetchCart();
}
?>