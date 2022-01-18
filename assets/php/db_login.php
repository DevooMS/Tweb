	<?php

	include_once("db_connection.php");//include anche i dati sessioni
	//echo session_id();
	$conn=dbconnect();
	if($_POST["loginemail"]!=''&& $_POST["loginpassword"]!='') {	
		$loginemail = $_POST['loginemail'];
		$loginpassword = $_POST['loginpassword'];
		$cookievalue = $_POST["remember"];
		$sql = "SELECT email FROM register WHERE email='".$loginemail."' AND password='".md5($loginpassword)."'";
		$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		$isValidLogin = mysqli_num_rows($res);	
		if($isValidLogin){
				//echo$cookievalue;
			if($cookievalue==1) {
				echo"SET";
				setcookie ("loginemail", $loginemail, time()+ (24 * 60 * 60),"/");    //set time for 1 day
				setcookie ("loginpassword",	$loginpassword,	time()+ (24 * 60 * 60),"/");
			} else {
				setcookie ("loginemail","",0,"/"); 
				setcookie ("loginpassword","",0,"/");
				}
		$userDetails = mysqli_fetch_assoc($res);
		//session_regenerate_id(true);
		$_SESSION["user"] = $userDetails['email'];
		echo"Validate";
		$_SESSION["successfully"]="Correct!";
		//session_unset();
		} else {		
		echo "error";
		$_SESSION["unsuccessful"] = "The password you entered is incorrect";
		//session_unset();
		} 
		
		
	}else{$_SESSION["unsuccessful"] = "All field are required.";}

?>