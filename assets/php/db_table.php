<?php

//fetch_cart.php

if(!isset($_SESSION)) {session_start();}
function getCart(){
    $total_price = 0;
    $total_item = 0;

    $output = '<div class="table-responsive" id="order_table">
    <table class="table table-bordered table-striped">
        <tr>  
            <th width="30%" class="text-center">Product Name</th>  
            <th width="10%" class="text-center">Quantity</th>  
            <th width="20%" class="text-center">Price</th>  
            <th width="15%" class="text-center">Total</th>  
            <th width="5%"  class="text-center">Action</th>  
        </tr>
    ';
    if(!empty($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $keys => $values){

            $output .= '
            <tr>
                <td class="text-center">'.$values["item_name"].'</td>
                <td class="text-center">'.$values["item_quantity"].'</td>
                <td class="text-center">€ '.$values["item_price"].'</td>
                <td class="text-center">€ '.number_format($values["item_quantity"] * $values["item_price"], 2).'</td>
                <td class="text-center"><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["item_id"].'">Remove</button></td>
            </tr>
            ';
            $total_price = $total_price + ($values["item_quantity"] * $values["item_price"]);
            //$total_item = $total_item + 1;
        }
        $output .= '
            <tr>  
                <td colspan="3" align="right"></td>  
         
                <td></td>  
            </tr>
            <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>€ '.number_format($total_price, 2).'</strong></td>
            <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>
        ';
    }else{
        $output .= '
            <tr>
                <td colspan="5" align="center">
                Your Cart is Empty!
                </td>
            </tr>
            ';
    }
    $output .= '</table></div>';
   // echo $output;
    echo json_encode($output);
}
?>
