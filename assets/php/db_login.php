<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("db_connection.php"); //include anche i dati sessioni

$conn = dbconnect();
if ($_POST["loginemail"] != '' && $_POST["loginpassword"] != '') {

    $loginemail = $_POST['loginemail'];
    $loginpassword = $_POST['loginpassword'];
    $cookievalue = $_POST["remember"];
    $sql = "SELECT email FROM register WHERE email='".$loginemail."' AND password='".md5($loginpassword). "'";
    $res = mysqli_query($conn, $sql) or die("database error:".mysqli_error($conn));
    $isValidLogin = mysqli_num_rows($res);
    if ($isValidLogin) {
        $logged_type = mysqli_fetch_assoc($res);
        if (($logged_type['utype'] = 'admin') == ('admin')) { //verifico che  tipo utente e utype e un attributo dell db
            $_SESSION['type'] = "admin";
        } else {
            $_SESSION['type'] = "user";
        }
        $_SESSION["user"] = $logged_type['email'];
        $_SESSION["successfully"] = "Correct!";
        
        exit();
    } else {
       
        $_SESSION["unsuccessful"] = "The password you entered is incorrect";
        exit();
    }
} else {
    $_SESSION["unsuccessful"] = "All field are required.";
    exit();
}
?>