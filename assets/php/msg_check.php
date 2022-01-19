<?php
# main program
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

    if (!isset($_SESSION)) {
    session_start(); 
    }

header("Content-type: application/json");

if (isset($_SESSION["unsuccessful"])) {
    print "{\n";
    print "\"isSet\": true, \n";
    print "  \"unsuccessful\": \"".$_SESSION["unsuccessful"]."\" \n}\n";
    unset($_SESSION["unsuccessful"]);
    session_unset();
    //unset($_SESSION["unsuccessful"]);
}else if (isset($_SESSION["successfully"])) {
    print "{\n";
    print "\"isSet\": true, \n";
    print "  \"successfully\": \"".$_SESSION["successfully"]."\" \n}\n";
    unset($_SESSION["successfully"]);
    session_unset();
    //unset($_SESSION["successfully"]);
}else{print "{\n";
      print "\"unset\"\n}\n";}

//else print "\"isSet\": false, \n}\n";


















?>
