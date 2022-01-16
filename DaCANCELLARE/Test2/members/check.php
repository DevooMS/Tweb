
<?php

session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";
//$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
echo"Before Statment :";
$errorMessage = '';
if(isset($_POST["login"])) {	
	$loginemail = $_POST['emailPHP'];
	$loginpassword = $_POST['passwordPHP'];
	$sql = "SELECT email FROM users WHERE email='".$loginemail."' AND password='".md5($loginpassword)."'";
	$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($res);	
	if($isValidLogin){
		$userDetails = mysqli_fetch_assoc($res);
		$_SESSION["user"] = $userDetails['email'];
        echo "ok";
		//header("location:http://localhost/tweb/profile.php"); 
        //header("Location: http://localhost/Tweb/register.php");		
	} else {		
        echo "error";
        $_SESSION["flash"] = "invalid username or password";
		$errorMessage = "Invalid login!";		 
	}
} else if(!empty($_POST["loginId"])){
	
	$errorMessage = "Enter Both user and password!";	
}


?>
<?php
	/*session_start();

	/*if (isset($_SESSION["email"]) && isset($_SESSION["loggedIn"])) {
		header("Location: index.php");
		exit();
	}

	if (isset($_POST["login"])) {
		$connection = new mysqli("localhost", "root", "", "test");
		
		$email = $connection->real_escape_string($_POST["emailPHP"]);
		$password = sha1($connection->real_escape_string($_POST["passwordPHP"]));
		$data = $connection->query("SELECT firstName FROM users WHERE email='$email' AND password='$password'");

		if ($data->num_rows > 0) {
			$_SESSION["email"] = $email;
			$_SESSION["loggedIn"] = 1;
			/*exit('<font color = "green">Login Sucess</font>');
            echo"ok";

		} else {
			/*exit('<font color = "red">Nope</font>');
			/*echo "Please check your inputs!";
			//print "Please check your inputs!";
			//print "\"isSet\": true, \n";
            echo"not";
		}
	}
	*/
?>     