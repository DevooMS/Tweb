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
print "{\n";

    // return flash message if set
if (isset($_SESSION["unsuccessful"])) {
    print "\"isSet\": true, \n";
    print "  \"unsuccessful\": \"".$_SESSION["unsuccessful"]."\" \n}\n";
    unset($_SESSION["unsuccessful"]);
}else if (isset($_SESSION["successfully"])) {
    print "\"isSet\": true, \n";
    print "  \"successfully\": \"".$_SESSION["successfully"]."\" \n}\n";
    unset($_SESSION["successfullyl"]);
}else
    print "\"isSet\": false, \n";
?>
