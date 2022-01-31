<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user'])){
        $id= $_SESSION["id"];
        $time= $_SESSION["time"];
        $total= $_SESSION["total"];
        $address= json_decode($_SESSION["address"]);
        $content= json_decode($_SESSION["content"]);
      
        
        foreach($content as $key=> $values){
            $data=array();
            $data[]=$values->item_name;
            $data[]=$values->item_id;
            $data[]=$values->item_quantity;
            $data[]=$values->item_price;
            $productData[] = $data;
        }
      
        $output = array(
            "data"=> $productData,
            "firstname"=>$address->firstname,
            "lastname"=>$address->lastname,
            "address"=>$address->address,
            "city"=>$address->city,
            "country"=>$address->country,
            "vat_number"=>$address->vat_number,
            "id"=>$id,
            "time"=>$time,
            "total"=>$total,
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