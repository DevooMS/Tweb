<?php

if(isset($_SESSION['user'])){

       $id= $_SESSION["id"]=$row['id'];
       $time= $_SESSION["time"]=$row['time'];
       $total= $_SESSION["total"]=$row['total'];
       $address= $_SESSION["address"]=$row['address'];
       $content= $_SESSION["content"]=$row['content'];


        $output = array( "data"=> $productData, );
        echo json_encode($output);
















}else{
    exit();
}

































?>