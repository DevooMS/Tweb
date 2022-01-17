	<?php
	include_once("db_connection.php");
	$conn=dbconnect();
	if($_POST["loginemail"]!=''&& $_POST["loginpassword"]!='') {	
		echo"k";
		$loginemail = $_POST['loginemail'];
		$loginpassword = $_POST['loginpassword'];
		$cookievalue = $_POST["remember"];
		$sql = "SELECT email FROM register WHERE email='".$loginemail."' AND password='".md5($loginpassword)."'";
		$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		$isValidLogin = mysqli_num_rows($res);	
		if($isValidLogin){
				echo$cookievalue;
			if($cookievalue==1) {
				echo"SET";
				setcookie ("loginemail", $loginemail, time()+ (24 * 60 * 60),"/");    //set time for 1 day
				setcookie ("loginpassword",	$loginpassword,	time()+ (24 * 60 * 60),"/");
			} else {
				setcookie ("loginemail","",0,"/"); 
				setcookie ("loginpassword","",0,"/");
				}
				$userDetails = mysqli_fetch_assoc($res);
				$_SESSION["user"] = $userDetails['email'];
				$_SESSION["successfully"]="Correct!";
			} else {		
				echo "error";
				$_SESSION["unsuccessful"] = "The password you entered is incorrect";		 
			} 
		}else{$_SESSION["unsuccessful"] = "Enter Both user and password!";}
	/*if(isLogged()){
		print " \"isLogged\": true, \n";
		print "  \"name\": \"".$_SESSION["name"]."\"";
	} else {
		print " \"isLogged\": false \n";
	}
	print "\n}";

	?>*/