<?php
session_start();
include_once("db_connection.php");
if (isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST['submit'])) {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['vat_number']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $vat_number = $_POST['vat_number'];
            $password = $_POST['password'];
            $md5pass=md5($password);
           // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
                //if ($conn->connect_error) {
                 //die('Could not connect to the database.');
                //}else{
                    $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
                    $Insert = "INSERT INTO register(email,firstname,lastname,vat_number,password) values(?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($Select);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($Remail);
                    $stmt->store_result();
                    $stmt->fetch();
                    $rnum = $stmt->num_rows;
                    if ($rnum == 0) {
                        $stmt->close();
                        $stmt = $conn->prepare($Insert);
                        $stmt->bind_param("sssis",$email,$firstname,$lastname,$vat_number,$md5pass);
                        if ($stmt->execute()) {
                            $_SESSION["successfully"]="Account registered successfully, you will be taken back to the login page";
                            header("Location: http://localhost/Tweb/register.php");
                            exit();
                        }else { echo $stmt->error; }
                    }else{ 
                    $_SESSION["unsuccessful"]= "Someone already registers using this email.";
                    header("Location: http://localhost/Tweb/register.php");
                    $stmt->close();
                    $conn->close();
                    exit();
                    }
            
               // }

            }else{
           $_SESSION["unsuccessful"]= "All field are required.";
            die();
        }
    }else {header("HTTP/1.1 404 Invalid Request"); }
}else{
    echo"OK";
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only POST requests.");
}
?>