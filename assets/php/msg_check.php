<?php
# main program
/*if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
	header("HTTP/1.1 400 Invalid Request");
	die("ERROR 400: Invalid request - This service accepts only GET requests.");
}
*/
    if (!isset($_SESSION)) {
    session_start(); 
    }
    //echo session_id();

header("Content-type: application/json");


//print "---------------------------";
//print $_SESSION["unsuccessful"];
//print $_SESSION["successfully"];
//print "---------------------------";
//echo$_SESSION["successfully"];echo$_SESSION["unsuccessful"];	    
    // return flash message if set
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
}

//else print "\"isSet\": false, \n}\n";


















?>
