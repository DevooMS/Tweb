<?php

if(!isset($_SESSION)) {session_start();}
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "prj";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
$login = $_POST["loginemail"];
$password = md5($_POST["loginpassword"]);
$remember = $_POST["remember"];
if ($login != "" && $password != "") {
    ($stmt = $conn->prepare(
        "SELECT * FROM `register` WHERE email = '$login' && `password` = '$password'"
    )) or die(mysqli_error());
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;
        $row = $result->fetch_assoc();
        if ($num_rows > 0) {
            if ($row["utype"] == "admin") {
                //verifico che  tipo utente e utype e un attributo dell db
                $_SESSION["type"] = "admin";
            } else {
                $_SESSION["type"] = "user";
            }
            $_SESSION["user"] = $row["email"];
            $_SESSION["successfully"] = "Correct!";
        } else {
            $_SESSION["unsuccessful"] = "The password you entered is incorrect";
        }
    }
    $stmt->close();
} else {
    $_SESSION["unsuccessful"] = "All field are required.";
    exit();
}

?>
