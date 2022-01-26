<?php

if (!isset($_SESSION)) {
    session_start();
}
//include_once("connection_loreg.php"); //include anche i dati sessioni

//$conn = dbconnect();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "prj";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($_POST["loginemail"] != '' && $_POST["loginpassword"] != '') {
    
        $loginemail = $_POST['loginemail'];
        $loginpassword = $_POST['loginpassword'];
        $cookievalue = $_POST["remember"];
        $password=md5($loginpassword);
        $sql = "SELECT * FROM register WHERE email='".$loginemail."' AND password='$password'";
        $res = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
        $isValidLogin = mysqli_num_rows($res);
        if ($isValidLogin) {
            $row = mysqli_fetch_assoc($res);
            if ($row['utype']=='admin') { //verifico che  tipo utente e utype e un attributo dell db
                $_SESSION['type'] = "admin";
               
            } else {
                $_SESSION['type'] = "user";
             
            }
            
            $_SESSION["user"] = $row['email'];
            $_SESSION["successfully"] = "Correct!";
            
            //exit();
        } else {
           
            $_SESSION["unsuccessful"] = "The password you entered is incorrect";
            //exit();
        }
    } else {
        $_SESSION["unsuccessful"] = "All field are required.";
        exit();
    }

?>