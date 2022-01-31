<?php
include('db_orders.php');
$emp = new orders();
if(!empty($_POST['action']) && $_POST['action'] == 'getOrders') {
    $emp->getOrders();
}
if(!empty($_GET['action']) && $_GET['action'] == 'confirmOrders') {
	$emp->confirmOrders();
}
if(!empty($_GET['action']) && $_GET['action'] == 'fetchOrders') {
	$emp->fetchOrders();
}
?>