<?php
session_start();
require('connection_loreg.php');


function getCart(){
    if(isset($_SESSION["shopping_cart"])){
        foreach($_SESSION["shopping_cart"] as $keys => $values){
            echo "in";
            var_dump($_SESSION["shopping_cart"]);
            echo $values["item_id"];
            echo $values["item_name"];
            echo $values["item_price"];
            echo $values["item_quantity"];

        }  
    }else{
        echo "error";

    } 
}
function deleteCart(){
    /*foreach($_SESSION["shopping_cart"] as $keys => $values)   {  
        if($values["item_id"] == $_GET["id"]) {  
             unset($_SESSION["shopping_cart"][$keys]);  
             echo"Item Removed";  
             //echo '<script>window.location="index.php"</script>';  
        }  
        
   }  */
   unset($_SESSION['shopping_cart']);

}
function updateCart(){
    if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){
			$_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
		}
 
		$_SESSION['message'] = 'Cart updated successfully';
		//header('location: view_cart.php');
	}
}
function buyeCart(){
    
}
function clearCart(){
    unset($_SESSION['cart']);
	$_SESSION['message'] = 'Cart cleared successfully';
	
}




?>