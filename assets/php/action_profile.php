<?php
include('db_profile.php');
$emp = new profile();
if(!empty($_POST['action']) && $_POST['action'] == 'getProfile') {
	$emp->getProfile();
}
if(!empty($_GET['action']) && $_GET['action'] == 'updateProfile') {
	$emp->updateProfile();

}
?>