<?php
include('db_profile.php');
$emp = new profile();
if(!empty($_POST['action']) && $_POST['action'] == 'getProfile') {
	$emp->getProfile();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateProfile') {
	$emp->updateProfile();
}
?>