<?php
include('catalog.php');
$emp = new catalog();
if(!empty($_POST['action']) && $_POST['action'] == 'listCatalog') {
	$emp->catalogList();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addProduct') {
	$emp->addProduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getProduct') {
	$emp->getproduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateProduct') {
	$emp->updateProduct();
}
if(!empty($_POST['action']) && $_POST['action'] == 'prDelete') {
	$emp->deleteProduct();
}
?>