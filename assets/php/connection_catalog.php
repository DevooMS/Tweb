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

?>
