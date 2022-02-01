<?php
include('db_admin.php');
$emp = new admin();
if(!empty($_POST['action']) && $_POST['action'] == 'searchUser') {
    
	$emp->searchUser();
}
if(!empty($_POST['action']) && $_POST['action'] == 'changePassword') {
	$emp->changePassword();

}
?>