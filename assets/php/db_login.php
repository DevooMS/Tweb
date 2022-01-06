<?php
session_start();
include_once("db_connection.php");
$errorMessage = '';
if(isset($_POST["login"]) && $_POST["loginemail"]!=''&& $_POST["loginpassword"]!='') {	
	$loginId = $_POST['loginemail'];
	$password = $_POST['loginpassword'];
	$sql = "SELECT email FROM register WHERE email='".$loginId."' AND password='".md5($password)."'";
	$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($res);	
	if($isValidLogin){
		if(!empty($_POST["remember"])) {
			setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));  
			setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			setcookie ("loginId",""); 
			setcookie ("loginPass","");
		}
		$userDetails = mysqli_fetch_assoc($resultSet);
		$_SESSION["user"] = $userDetails['username'];
        echo "ok";
		header("location:http://localhost/tweb/profile.php"); 
        //header("Location: http://localhost/Tweb/register.php");		
	} else {		
        echo "error";
		$errorMessage = "Invalid login!";		 
	}
} else if(!empty($_POST["loginId"])){
	$errorMessage = "Enter Both user and password!";	
}	
?>