<?php
# main program

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
} else {
    print "\"isSet\": false \n}\n";
}


?>
