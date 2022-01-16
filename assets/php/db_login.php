<?php

session_start();

include_once("db_connection.php");
echo"k";
$errorMessage = '';
if(isset($_POST["login"]) && $_POST["loginemail"]!=''&& $_POST["loginpassword"]!='') {	
	$_SESSION["unsuccessful"]= "All field are required.";
	$loginemail = $_POST['loginemail'];
	$loginpassword = $_POST['loginpassword'];
	$sql = "SELECT email FROM register WHERE email='".$loginemail."' AND password='".md5($loginpassword)."'";
	$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($res);	
	if($isValidLogin){
		if(!empty($_POST["remember"])) {
			setcookie ("loginemail", $loginemail, time()+ (24 * 60 * 60),"/");    //set time for 1 day
			setcookie ("loginpassword",	$loginpassword,	time()+ (24 * 60 * 60),"/");
		} else {
			setcookie ("loginemail","",0,"/"); 
			setcookie ("loginpassword","",0,"/");
		}
		$userDetails = mysqli_fetch_assoc($res);
		$_SESSION["user"] = $userDetails['email'];
        echo "ok";
		//header("location:http://localhost/tweb/profile.php"); 
        //header("Location: http://localhost/Tweb/register.php");		
	} else {		
        echo "error";
		$errorMessage = "Invalid login!";		 
	}
} else if(!empty($_POST["loginId"])){
	
	$errorMessage = "Enter Both user and password!";	
} else{echo"no";}


if(isLogged()){
	print " \"isLogged\": true, \n";
	print "  \"name\": \"".$_SESSION["name"]."\"";
} else {
	print " \"isLogged\": false \n";
}
print "\n}";

?>