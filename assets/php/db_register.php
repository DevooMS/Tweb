<?php
//session_start();
if (isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST['submit'])) {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['vat_number']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
            echo"OK";
            //$_SESSION["flash"]= "All field are required.";
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $vat_number = $_POST['vat_number'];
            $password = $_POST['password'];
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "prj";
            $md5pass=md5($password);
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
            echo"OK3";
                if ($conn->connect_error) {
                    echo"NO3";
                 die('Could not connect to the database.');
                }else{
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
                            //$show_modal = true;
                           //header("Location: http://localhost/Tweb/register.php");
                           echo"OK";
                            exit();
                        }else { echo $stmt->error; }
                    }else { //$_SESSION["flash"]= "Someone already registers using this email.";
                    echo "regiistrato"; 
                    $stmt->close();
                    $conn->close();
                    }
            
                }

            }else{
                echo"nope";
           //$_SESSION["flash"]= "All field are required.";
            die();
        }
    }else { echo "Submit button is not set";}
}else{
    echo"OK";
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only POST requests.");
}
?>