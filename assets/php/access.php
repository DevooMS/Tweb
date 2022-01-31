<?php
if(!isset($_SESSION)) {session_start();}
$accst=false;
if(isset($_SESSION['user'])){
    $out=array('utype'=>$_SESSION['type'],'logged'=>$accst=true);
    echo json_encode($out);
}else{
    $out=array('utype'=>'',$accst=true);
    echo json_encode($out);
}
    
?>