<?php
/* Database connection start */
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "prj";
//$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>