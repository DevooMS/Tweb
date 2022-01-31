<?php
if(!isset($_SESSION)) {session_start();}
require('connection_catalog.php');

class orders extends dbSetup{	
    protected $hostNamep;
    protected $userNamep;
    protected $password;
	protected $dbNamep;
	private $productTable = 'product';
    private $ordersTable = 'orders';
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
 	
    function getOrders(){
        if(isset($_SESSION['user'])){
            $email=$_SESSION["user"];
            if($_SESSION['type']=='admin'){
                $sqlQuery = "SELECT * FROM ".$this->ordersTable."";
                $result = mysqli_query($this->dbConnect, $sqlQuery);
                $rowcount=mysqli_num_rows($result);
                for($i=1;$rowcount>=$i;$i++){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $data=array();
                    $data[]=$row['id'];
                    $data[]=$row['email'];
                    $data[]=$row['time'];
                    $data[]=$row['total'];
                    $data[]=$row['status'];
                    $data[] = '<button type="button" name="details" id="'.$row['id'].'" class="btn btn-success btn-xs details" >Details</button>';
                    if($row['status']!='delivered'){
                    $data[] = '<button type="button" name="confirm" id="'.$row['id'].'" class="btn btn-warning btn-xs  confirm" >Confirm</button>';
                    }else{
                    $data[]=' ';  
                    }
                    $productData[] = $data;
                }
                $output = array(
                "data"=> $productData,
                );
                echo json_encode($output);
            }else{
                $sqlQuery = "SELECT * FROM ".$this->ordersTable." WHERE email = '".$email."'";
                $result = mysqli_query($this->dbConnect, $sqlQuery);
                $rowcount=mysqli_num_rows($result);
                for($i=1;$rowcount>=$i;$i++){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $data=array();
                    $data[]=$row['id'];
                    $data[]=$row['email'];
                    $data[]=$row['time'];
                    $data[]=$row['total'];
                    $data[]=$row['status'];
                    $data[] = '<button type="button" name="details" id="'.$row['id'].'" class="btn btn-success btn-xs details" >Details</button>';
                    $data[] = '<button type="button" name="confirm" id="'.$row['id'].'" class="btn btn-warning btn-xs confirm " >Confirm</button>';
                   
                    $productData[] = $data;
                }
                
                $output = array(
                "data"=> $productData,
                );
                echo json_encode($output);
                
            }
            
        
        }else{
            exit();
        }
    }


    function confirmOrders(){
        if($_SESSION['type']=='admin'){
            $id=$this->dbConnect->real_escape_string($_GET["id"]);
            $updateQuery = "UPDATE ".$this->ordersTable." SET status = 'delivered' WHERE id ='".$id."'";
            $result = mysqli_query($this->dbConnect,$updateQuery);
        }else{
            exit();
        }
    }



    function fetchOrders(){
        echo"n1";
        $id=$this->dbConnect->real_escape_string($_GET["id"]);
        $sqlQuery = "SELECT * FROM ".$this->ordersTable." WHERE id = '".$id."'";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION["id"]=$row['id'];
        $_SESSION["time"]=$row['time'];
        $_SESSION["total"]=$row['total'];
        $_SESSION["address"]=$row['address'];
        $_SESSION["content"]=$row['content'];
    }
}



?>