<?php
session_start();
require('connection_catalog.php');
class cart extends dbSetup {	
    protected $hostNamep;
    protected $userNamep;
    protected $password;
	protected $dbNamep;
	private $productTable = 'product';
    private $cartTable = 'orders';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbSetup();            
            $this -> hostNamep = $database -> serverName;
            $this -> userNamep = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbNamep = $database -> dbName;			
            $conn = new mysqli($this->hostNamep, $this->userNamep, $this->password, $this->dbNamep);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
 	
    function getCart($out){
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $keys => $values){  //$array index content
                $data=array();
                $data[]=$values["item_name"];
                $data[]=$values["item_id"];
                $data[]=$values["item_quantity"];
                $data[]=$values["item_price"];
                $data[] = '<button type="button" name="delete" skuid="'.$values["item_id"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
               
                $productData[] = $data;
            }  
            $output = array(
            "data"=> $productData,
            );
            echo json_encode($output);
        }else{
            echo "error";

        } 
    }

    function deleteCart($skuid){
        if(isset($_GET["skuid"])){
           $skuid= $_GET["skuid"];
        }
        foreach($_SESSION["cart"] as $keys => $values)   {  
            if($values["item_id"] == $skuid) {  
                unset($_SESSION["cart"][$keys]);  
                echo"Item Removed";  
                
            }  
            
        }  
    }

    function buyCart(){
        if(isset($_SESSION["cart"])){
            $accst=0; 
            $end=sizeof($_POST["skuid"]);
            $i=1;
            $skuid=$_POST["skuid"];
            foreach($skuid as $keys => $values)  { 
            $skuid=$this->dbConnect->real_escape_string($values);
            $sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$skuid."'";
            $result = mysqli_query($this->dbConnect, $sqlQuery);	
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $price=(array)($_POST["checkprice"]);
            $cost=$row['cost'];   //faccio cast oggetto to array
            if($price[$keys] == $cost ){
                    if($row['qty']>0){
                        
                        if($end==$i){ 
                         
                            $out=array('error'=>0);
                            echo json_encode($out);
                        exit();
                        }
                        $i++;
                    }else{
                    

                        $out=array('error'=>1);  //quantita non disponibile
                        echo json_encode($out);
                    }
            }else{
        
            $out=array('error'=>2);
            echo json_encode($out);
            }
                
            }
        }else{
            $out=array('error'=>3);         //carello e vuoto
            echo json_encode($out);
        }   
    }

    function fetchCart(){
        $output='';
        $total=0;
        $content=json_encode($_SESSION['cart']);
        $time=date("G:i:s");
        $email=$this->dbConnect->real_escape_string($_SESSION["user"]);
        $address=json_encode($_SESSION["info"]);
        $id=uniqid(date("Gis"));
        $status='pending';
        foreach($_POST["confirm"] as $keys => $values)   { 
            $skuid=$this->dbConnect->real_escape_string($values);
            $updateQuery = "UPDATE ".$this->productTable." SET  qty = qty-1 WHERE skuid ='".$skuid."'";
            $sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$skuid."'";
            $result = mysqli_query($this->dbConnect,$updateQuery);
            $result = mysqli_query($this->dbConnect,$sqlQuery);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $total= $total+$row['cost'];
        } 
        
        $sqlQuery = " SELECT * FROM ".$this->cartTable." WHERE id = '".$id."'";
        $result = mysqli_query($this->dbConnect, $sqlQuery);	
        $uid = mysqli_num_rows($result);
        
        if($uid==0){
            $insertQuery = "INSERT INTO ".$this->cartTable." (id, email, time, content, total, status, address) 
            VALUES ('".$id."', '".$email."', '".$time."','".$content."', '".$total."', '".$status."', '".$address."')";
            $isUpdated = mysqli_query($this->dbConnect, $insertQuery);	
            $out=array('order'=>true,'id'=>$id,'time'=>$time);
            echo json_encode($out);
        }else{
            $out=array('order'=>false);
            echo json_encode($out);
        }
      


    }


    function clearCart(){
        unset($_SESSION['cart']);
        
    }
}



?>