<?php
 if(!isset($_SESSION)) {session_start();};
    if (isset($_SESSION)) {
        session_destroy();
    }
    header("Location:http://localhost/Tweb/index.html");
?>
