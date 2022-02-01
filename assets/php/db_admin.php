<?php
require('connection_catalog.php');
class admin extends dbSetup {	
    protected $hostNamep;
    protected $userNamep;
    protected $password;
	protected $dbNamep;
	private $registerTable = 'register';
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
 	

	public function searchUser(){
        if ($_SESSION["type"] == "admin") {	
            $email='';
            if(isset($_POST["email"])) { 
            $email=$_POST["email"];
            }else{exit();}
            
            $email=$this->dbConnect->real_escape_string($_POST["email"]);
        
            $sqlQuery = "SELECT * FROM ".$this->registerTable." WHERE email = '".$email."'";
            $result = mysqli_query($this->dbConnect, $sqlQuery);
           if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); //Recupera la riga successiva di un set di risultati come array associativo, numerico o entrambi
            $out=array('found'=>true,'vat'=>$row['vat_number'],'firstname'=>$row['firstname'],'lastname'=>$row['lastname'],'email'=>$row['email'],'address'=>$row['address'],'city'=>$row['city'],'country'=>$row['country']);
            echo json_encode($out);
           }else{
            $out=array('error'=>1);
                echo json_encode($out);		
           }
           
        }else{die();}
	}
	public function changePassword(){
		if ($_SESSION["type"] == "admin") {	
			if($_POST['email']) {	
				$email=$this->dbConnect->real_escape_string($_POST["email"]);
				$password=$this->dbConnect->real_escape_string($_POST["password"]);
                $md5pass=md5($password);
				$updateQuery = "UPDATE ".$this->registerTable." 
				SET  password = '".$md5pass."' WHERE email ='".$email."'";
				$isUpdated = mysqli_query($this->dbConnect, $updateQuery);
               
                echo "Affected rows: " . $updateQuery -> affected_rows;


               /* if(mysqli_affected_rows($this->connection)>0){
                    $out=array('changed'=>true);
                    echo json_encode($out);	
                }else{
                    $out=array('changed'=>false);
                    echo json_encode($out);	 
                    }*/
                	
			}	
		}else{
            die();
        }	
	}


}
?>