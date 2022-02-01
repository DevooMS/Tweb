<?php

    include_once("connection_loreg.php");
    $conn=dbconnect();
    if (isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] = "POST") {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['email']) && isset($_POST['password']) && isset($_POST['vat_number']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
                $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_SPECIAL_CHARS);
                $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_var($_POST['email'],FILTER_SANITIZE_SPECIAL_CHARS);
                $vat_number = filter_var($_POST['vat_number'],FILTER_SANITIZE_SPECIAL_CHARS);
                $password = ($_POST['password']);
                $user='user';
                $md5pass=md5($password);
                        $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
                        $Insert = "INSERT INTO register(email,firstname,lastname,vat_number,password,utype) values(?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($Select);
                        $stmt->bind_param("s", $email);    //faccio il bind prima del email 
                        $stmt->execute();                  //eseguo il statement di select 
                        $stmt->store_result();            //memorizzo il set di dati all'interno di un buffer
                        $stmt->fetch();                 //recupero il set di dati
                        $rnum = $stmt->num_rows;     //ottengo il numero di righe nel set di risultati
                        if ($rnum == 0) {
                            $stmt->close();
                            $stmt = $conn->prepare($Insert);
                            $stmt->bind_param("sssiss",$email,$firstname,$lastname,$vat_number,$md5pass,$user);
                            if ($stmt->execute()) {
                                $msg="Account registered successfully, you will be taken back to the login page";
                                $out=array('status'=>$msg,'register'=>$accst=true);
                                echo json_encode($out);
                                exit();
                            }else { echo $stmt->error; }
                        }else{ 
                        $msg= "Someone already registers using this email.";
                        $out=array('status'=>$msg,'register'=>$accst=false);
                        echo json_encode($out);
                        $stmt->close();
                        $conn->close();
                        exit();
                        }
                }else{
                die();
            }
        }else {die();}
    }else{
        header("HTTP/1.1 400 Invalid Request");
        die("ERROR 400: Invalid request - This service accepts only POST requests.");
    }
    ?>