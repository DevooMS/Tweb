$(document).ready(function(){
  

   var table= $('#table').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching":   false,
        "ajax":{
			url:"../php/action_orders.php",
			type:"POST",
			data:{action:'getOrders'},
			dataType:"json",
		},
        language: {                                                         
            loadingRecords: " ",
            zeroRecords: " "
        },
        "columnDefs": [{"className": "dt-center", "targets": "_all"} ],     //per centrare la tabella
    
    });

    $.ajax({
		url:'../php/access.php',
		method:"POST",
		dataType:"json",
		success:function(data){
			if(data.logged){
				if(data.utype!='admin'){
                    table.columns([6]).visible(false);
				}
			}
		}
	})


$("#table").on('click', '.details', function(){

    //var id = $(this).attr("id");		
   /* var action = "deleteCart";
            $.ajax({
                url:"../php/action_cart.php",
                method:"GET",
                data:{id:id, action:action},
                success:function(data){table.ajax.reload()}
                
            })
    */
    
});	

$("#table").on('click', '.confirm', function(){
    var id = $(this).attr("id");		
    console.log(id)
    var action = "confirmOrders";
            $.ajax({
                url:"../php/action_orders.php",
                method:"GET",
                data:{id:id, action:action},
                success:function(data){
                    table.ajax.reload()
                }
                
            })
    
    
});	


function cleanCart(){ 
    var action='cleanCart';
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        dataType:"json",
        data:{action:action},
        success:function(data){
            if(data.logged){

            }
        }
    });

};




$("#checkout").on('click', function(){ 
    $('.modal-msgtill').html("<i></i> Confirm Order");
    $('.modal-msg').html("The payment and the pickup of orders will be done on our warehouse");
    $('#msgModal').modal('show');
   

    
});
$(".closebtn").on('click', function(){
    $('#msgModal').modal('hide');
    $('#errorModal').modal('hide');
    
});



$("#confirmbtn").on('click', function(){ 
    var action='buyCart';
    var skuid = table.column(1).data().toArray();
    var checkprice = table.column(3).data().toArray();
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        dataType:"json",
        data:{action:action,checkprice:checkprice,skuid:skuid},
        success:function(data){
            $('#msgModal').modal('hide');
            checkres(data);  
            
        }
    });
    
});
function checkres(data){
    
    if(data.error>0){
        $('.modal-errorModal').html("<i></i> Error");
        if(data.error==1){
            $('.modal-error').html("<i></i> One or more items are no longer available in your cart");
            $('#errorModal').modal('show');
        }else if(data.error==2){
            $('.modal-error').html("<i></i> One or more items are not longer available in your cart");
            $('#errorModal').modal('show');
      
        }else if(data.error==3){
            $('.modal-error').html("<i></i> Your cart is empty");
            $('#errorModal').modal('show');
        }
    }else{
     
        $('#okModal').modal('show');
        table.columns([4]).visible(false);
        $('#checkout').hide();
        makeorder();
    }
    
}

function makeorder(){

    var action='fetchCart';
    var confirm = table.column(1).data().toArray();
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        dataType:"json",
        data:{action:action,confirm:confirm},
        success: function(data){
            if(data.order==true){
                $("#n5").html('<strong>'+ data.id + '</strong>');
                $("#n6").html('<strong>'+ data.time + '</strong>');
                $('#n5').show();
                $('#n6').show();
                setTimeout(function() {$('#okModal').modal('hide');}, 1000);
                cleanCart();
            }else{
                $('.modal-error').html("<i></i> Order he is doing already exists");
                $('#errorModal').modal('show');
                setTimeout(function() {$('#errorModal').modal('hide');}, 3000);
                window.location.replace("http://localhost/Tweb/assets/html/catalog.php");
                cleanCart();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
    });
}
/*$("#makethis").on('click', function(){
    $('#okModal').modal('show');
    $("#n5").html('<strong>Total € '+ 'test' + '</strong>');
    $("#n6").html('<strong>Total € '+ 'test1' + '</strong>');
    $('#n5').show();
    $('#n6').show();
    setTimeout(function() {$('#okModal').modal('hide');}, 1000);
});*/


});