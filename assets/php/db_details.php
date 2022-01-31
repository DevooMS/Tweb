<?php
if(!isset($_SESSION)) {session_start();}
    if(isset($_SESSION['user'])){
        $id= $_SESSION["id"];
        $time= $_SESSION["time"];
        $total= $_SESSION["total"];
        $address= $_SESSION["address"];
        $content= $_SESSION["content"];
        var_dump($content);
        /*foreach($content as $key=> $value){
            $data[]=$values["item_name"];
            $data[]=$values["item_id"];
            $data[]=$values["item_quantity"];
            $data[]=$values["item_price"];
            $productData[] = $data;
        }*/
        
        
        
        $output = array(
            "data"=> $productData,
            );
            echo json_encode($output);
        /* $output = array( 
             "id"=> $id,
             "time"=>$time,
             "data"=> $content, 
             "address"=>$address,
             "total"=>$total
         );
         echo json_encode($output);*/
 
    }else{
        exit();
    }
 


































?>