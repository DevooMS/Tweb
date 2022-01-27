<?php
include('db_cart.php');
if(!empty($_POST['action']) && $_POST['action'] == 'getCart') {
	getCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateCart') {
	updateCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteCart') {
	deleteCart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'buyCart') {
	buyCart();
}

?>