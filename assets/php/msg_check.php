<?php
# main program
if(!isset($_SESSION)) {session_start();}

header("Content-type: application/json");

if (isset($_SESSION["unsuccessful"])) {
    print "{\n";
    print "\"isSet\": true, \n";
    print "  \"unsuccessful\": \"".$_SESSION["unsuccessful"]."\" \n}\n";
    unset($_SESSION["unsuccessful"]);
    //unset($_SESSION["unsuccessful"]);
}else if (isset($_SESSION["successfully"])) {
    print "{\n";
    print "\"isSet\": true, \n";
    print "  \"successfully\": \"".$_SESSION["successfully"]."\" \n}\n";
    unset($_SESSION["successfully"]);
    //unset($_SESSION["successfully"]);
}else{print "{\n";
      print "\"unset\"\n}\n";}

//else print "\"isSet\": false, \n}\n";


















?>
