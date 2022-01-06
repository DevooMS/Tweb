 <?php
if (!isset($_SESSION)) {
    session_start(); 
}
header("Content-type: application/json");
print "{\n";
if (isset($_SESSION["flash"])) {
    print "\"isSet\": true , \n";
    print "  \"flash\": \"".$_SESSION["flash"]."\" \n}\n";
    unset($_SESSION["flash"]);
} else {
    print "\"isSet\": false \n}\n";
}

?>