<?php
	/*session_start();
 
	$set_sessionVal=$_POST['set_sessionVal'];
	$_SESSION['value']=$set_sessionVal;
 
	header('location:index.php');*/

    

    session_start();
    echo"test";
    if (isset($_GET['set_sessionVal'])) {
        // return requested value
       
        print $_SESSION[$_GET['set_sessionVal']];
    } else {
        // nothing requested, so return all values
        print json_encode($_SESSION);
    }
 
	header('location:index.php');
?>