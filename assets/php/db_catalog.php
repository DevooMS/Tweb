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
 	
	public function catalogList(){		
		$sqlQuery = "SELECT * FROM ".$this->productTable." ";       //this ritorna il valore globale di productTable che e 'product'
		$stQuerry=$this->dbConnect->real_escape_string($_POST["search"]["value"]);
		if(!empty($stQuerry)){
			$sqlQuery .= 'where(skuid LIKE "%'.$this->dbConnect->real_escape_string($_POST["search"]["value"]).'%" ';
			$sqlQuery .= 'OR namep LIKE "%'.$this->dbConnect->real_escape_string($_POST["search"]["value"]).'%" ';
			$sqlQuery .= 'OR brand LIKE "%'.$this->dbConnect->real_escape_string($_POST["search"]["value"]).'%") ';
			$sqlQuery .= 'OR cost LIKE "%'.$this->dbConnect->real_escape_string($_POST["search"]["value"]).'%" ';
			$sqlQuery .= 'OR qty LIKE "%'.$this->dbConnect->real_escape_string($_POST["search"]["value"]).'%" ';
		}
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if($result === false)
		{
		echo "ERROR: " . $this->dbConnect->error . "<br />\n";
		echo "QUERY: " . $sqlQuery;
		}
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
			"draw"				=>	intval($_POST["draw"]),//serve per aggiornare il table  descrizione da api di datatable
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$productData,
	
		);
		echo json_encode($output);
	}


	public function getProduct(){
		if($_POST["skuid"]) {
			$skuid=$this->dbConnect->real_escape_string($_POST["skuid"]);
			$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$skuid."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //Recupera la riga successiva di un set di risultati come array associativo, numerico o entrambi
			echo json_encode($row);
		}
	}
	public function updateProduct(){
		if ($_SESSION["type"] == "admin") {	
			if($_POST['skuid']) {	
				$skuid=$this->dbConnect->real_escape_string($_POST["skuid"]);
				$nmproduct=$this->dbConnect->real_escape_string($_POST["nmproduct"]);
				$brand=$this->dbConnect->real_escape_string($_POST["brand"]);
				$qty=$this->dbConnect->real_escape_string($_POST["qty"]);
				$cost=$this->dbConnect->real_escape_string($_POST["cost"]);

				$updateQuery = "UPDATE ".$this->productTable." 
				SET namep = '".$nmproduct."', brand = '".$brand."', skuid = '".$skuid."', qty = '".$qty."' , cost = '".$cost."'
				WHERE skuid ='".$skuid."'";
				$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
			}	
		}else{die();}	
	}
	public function addProduct(){
		if ($_SESSION["type"] == "admin") {	
		
			$skuid=$this->dbConnect->real_escape_string($_POST["skuid"]);
			$nmproduct=$this->dbConnect->real_escape_string($_POST["nmproduct"]);
			$brand=$this->dbConnect->real_escape_string($_POST["brand"]);
			$qty=$this->dbConnect->real_escape_string($_POST["qty"]);
			$cost=$this->dbConnect->real_escape_string($_POST["cost"]);

			$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$skuid."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$isValidsku = mysqli_num_rows($result);
			if($isValidsku==0){
				$insertQuery = "INSERT INTO ".$this->productTable." (namep, brand, skuid, qty, cost) 
				VALUES ('".$nmproduct."', '".$brand."', '".$skuid."', '".$qty."', '".$cost."')";
				$isUpdated = mysqli_query($this->dbConnect, $insertQuery);	
				//$setError=false;
			}
		}else{die();}
	}
	public function deleteProduct(){
		if ($_SESSION["type"] == "admin") {	
			if($_POST["skuid"]) {
				$skuid=$this->dbConnect->real_escape_string($_POST["skuid"]);

				$updateQuery = "UPDATE ".$this->productTable." SET qty = 0 WHERE skuid ='".$skuid."'";
				$isUpdated = mysqli_query($this->dbConnect, $updateQuery);	
			}
		}else{die();}
	}

	public function buyProduct(){
		$skuid=$this->dbConnect->real_escape_string($_POST["skuid"]);

		$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE skuid = '".$skuid."'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //Recupera la riga successiva di un set di risultati come array associativo, numerico o entrambi
		$status=0;
		$name = ucfirst($row['namep']);
		$brand = $row['brand'];		
		$id = $row['skuid'];
		$qtk = $row['qty'];
		$qty= 1;
		$cost = $row['cost'];
		if($qtk>0){
			if(isset($_SESSION["cart"])) {  //verifico se e il carello e stato inizializzato se non lo e faccio else 

					$item_array_id = array_column($_SESSION["cart"], "item_id");  
					
					if(!in_array($id, $item_array_id))  {  
						$count = count($_SESSION["cart"]);  
						$item_array = array(  
							'item_id'       =>     $id,  
							'item_name'     =>     $name,  
							'item_price'    =>     $cost,  
							'item_quantity' =>     $qty  
						);  
						$_SESSION["cart"][$count] = $item_array; //nella sessione cart in posizione count metto il mio item array
						$out=array('cart'=>$status);
						echo json_encode($out);
					} else {  
		
						$out=array('cart'=>$status=1);
						echo json_encode($out);
						
					}  
			} else {  
					$item_array = array(  
						'item_name'     =>     $name,
						'item_id'       =>     $id,  
						'item_quantity' =>     $qty,   
						'item_price'    =>     $cost,
					);  
					$_SESSION["cart"][0] = $item_array;
					$out=array('cart'=>$status);
						echo json_encode($out);  
			}

		}else{
			$out=array('cart'=>$status=2);
    		echo json_encode($out);
		}
	}









}
?>