<?php
if(!isset($_SESSION)) {session_start();}
class dbSetup {
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function dbSetup() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> password = "";
        $this -> dbName = "prj";
    }
}
/*function dbconnect(){
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
/*function isLogged() {
    if (!isset($_SESSION["name"])) {
        if (!isset($_SESSION["flash"])) {
            $_SESSION["flash"] = "Please, login if you want to use this website.";
        }
        return false;
    }
    else {
        return true;
    }
}*/
?>
