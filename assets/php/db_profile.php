<?php

require('connection_catalog.php');
class profile extends dbSetup {	
    protected $hostNamep;
    protected $userNamep;
    protected $password;
	protected $dbNamep;
	private $profileTable = 'register';
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


	public function getProfile(){
        $user=$_SESSION["user"];
		$sqlQuery1 = "SELECT * FROM ".$this->profileTable." WHERE email = '".$user."'";
		$result1 = mysqli_query($this->dbConnect, $sqlQuery1);
		$numRows = mysqli_num_rows($result1);
		if( $profile = mysqli_fetch_assoc($result1) ) {		
			$empRows = array(		
			'email'=>ucfirst($profile['email']),
		    'firstname'=>$profile['firstname'],
			'lastname'=>$profile['lastname'],	
			'vat_number'=>$profile['vat_number'],
			'address'=>$profile['address'],
            'city'=>$profile['city'],
            'country'=>$profile['country'],
            );  //faccio un matrice
		}
		echo json_encode($empRows);
	}

	public function updateProfile(){
        
		if($_POST['email']) {	
            $test=$this->dbConnect;
            $address=mysqli_real_escape_string($test,$_POST['address']);
            echo $address;
            $city=mysqli_real_escape_string($this->dbConnect,$_POST['city']);
            $country=mysqli_real_escape_string($this->dbConnect,$_POST['country']);
            $updateQuery = "UPDATE ".$this->profileTable." 
			SET address = '". $address."', city = '".$city."' , country = '".$country."'
			WHERE skuid ='".$_POST["email"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);

          /*
          $updateQuery = "UPDATE ".$this->profileTable." 
          SET namep = address = '".$_POST["address"]."', city = '".$_POST["city"]."' , country = '".$_POST["country"]."'
          WHERE skuid ='".$_POST["email"]."'";
          $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
            */
			
		}	
	}

}
?>


