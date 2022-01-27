<?php
require('connection_catalog.php');
class catalog extends dbSetup {	
    protected $hostNamep;
    protected $userNamep;
    protected $password;
	protected $dbNamep;
	private $productTable = 'product';
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
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}   	
	public function catalogList(){		
		$sqlQuery = "SELECT * FROM ".$this->productTable." ";       //this ritorna il valore globale di productTable che e 'product'
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'where(skuid LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR namep LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR brand LIKE "%'.$_POST["search"]["value"].'%") ';				
			$sqlQuery .= ' OR cost LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= ' OR qty LIKE "%'.$_POST["search"]["value"].'%" ';
		}
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		
		$sqlQuery1 = "SELECT * FROM ".$this->productTable." ";
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		$productData = array();	  //dichiaro productdata e un array
		while( $product = mysqli_fetch_assoc($result) ) {		
			$empRows = array();			//dichiaro emprows un array
			$empRows[] = ucfirst($product['namep']);
			$empRows[] = $product['brand'];		
			$empRows[] = $product['skuid'];	
			$empRows[] = $product['qty'];
			$empRows[] = $product['cost'];					
			$empRows[] = '<button type="button" name="update" skuid="'.$product["skuid"].'" class="btn btn-warning btn-xs update">Update</button>';
			$empRows[] = '<button type="button" name="delete" skuid="'.$product["skuid"].'" class="btn btn-danger btn-xs delete" >Delete</button>';
			$empRows[] = '<button type="button" name="buy" 	  skuid="'.$product["skuid"].'" class="btn btn-success btn-xs buy" >Buy</button>';
			$productData[] = $empRows;  //faccio un matrice
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$productData,
	
		);
		echo json_encode($output);
	}


	public function getProduct(){
		if($_POST["skuid"]) {
			$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$_POST["skuid"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updateProduct(){
		if($_POST['skuid']) {	
			$updateQuery = "UPDATE ".$this->productTable." 
			SET namep = '".$_POST["nmproduct"]."', brand = '".$_POST["brand"]."', skuid = '".$_POST["skuid"]."', qty = '".$_POST["qty"]."' , cost = '".$_POST["cost"]."'
			WHERE skuid ='".$_POST["skuid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	public function addProduct(){
			$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$_POST["skuid"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$isValidsku = mysqli_num_rows($result);
		if($isValidsku==0){
			$insertQuery = "INSERT INTO ".$this->productTable." (namep, brand, skuid, qty, cost) 
			VALUES ('".$_POST["nmproduct"]."', '".$_POST["brand"]."', '".$_POST["skuid"]."', '".$_POST["qty"]."', '".$_POST["cost"]."')";
			$isUpdated = mysqli_query($this->dbConnect, $insertQuery);	
			//$setError=false;
		}
	
	}
	public function deleteProduct(){
		
		if($_POST["skuid"]) {
			$updateQuery = "UPDATE ".$this->productTable." SET qty = 0 WHERE skuid ='".$_POST["skuid"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);	
		}
	}

	public function buyProduct(){
		if($_POST["skuid"]) {
			$sku=$_POST["skuid"];
			$_SESSION['cart'] = array();
			array_push($_SESSION['cart'],$sku);
		}
	}
}
?>