<?php

function dbconnect(){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "prj";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        $_SESSION["unsuccessful"]="Connection Failed";
        exit();
    }
    return $conn;
}

?>