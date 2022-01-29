<?php
include('db_cart.php');
$emp = new cart();
if(!empty($_POST['action']) && $_POST['action'] == 'getCart') {
	$output='';
    $emp->getCart($output);
}

if(!empty($_GET['action']) && $_GET['action'] == 'deleteCart') {
    $skuid=$_POST['skuid'];
	$emp->deleteCart($skuid);
}
if(!empty($_POST['action']) && $_POST['action'] == 'cleanCart') {
	$emp->clearCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'buyCart') {
	$emp->buyCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'fetchCart') {
	$emp->fetchCart();
}
?>