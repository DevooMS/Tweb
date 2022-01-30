$(document).ready(function(){
    $.ajax({
        url:"../php/action_profile.php",
        method:"POST",
        dataType:"json",
        data:{action:'getProfile'},
        success:function(data){

           $('#n1').html('<i></i> Name: '+data.firstname+' '+data.lastname +' ');
           $('#n2').html('<i></i> Address: '+data.address+' '+data.city +' '+data.country);
           $('#n3').html('<i></i> Vat Numer: '+data.vat_number+'');
    

        }
    })

   var table= $('#table').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching":   false,
        "ajax":{
			url:"../php/action_cart.php",
			type:"POST",
			data:{action:'getCart'},
			dataType:"json",
		},
        language: {                                                         
            loadingRecords: "The Cart its Empty!",
            zeroRecords: "All items its removed "
        },
        "columnDefs": [{"className": "dt-center", "targets": "_all"} ],     //per centrare la tabella
        "footerCallback": function ( row, data, start, end, display ) {    //per fare la somma del totale metodo datatable
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ? 
                i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            var total = api
            .column(3)
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
            console.log("thisn"+total);
            $("#total").html('<strong>Total € '+ total + '</strong>');
        }
    
    });
  


$("#table").on('click', '.delete', function(){
    table.row( $(this).parents('tr') ).remove().draw();
    var skuid = $(this).attr("skuid");		
    var action = "deleteCart";
            $.ajax({
                url:"../php/action_cart.php",
                method:"GET",
                data:{skuid:skuid, action:action},
                success:function(data){table.ajax.reload()}
                
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
    //$('#msgModal').modal('hide');
    
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
    console.log("testa"+data)
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
        console.log("theta");
        $('#okModal').modal('show');
        table.columns([4]).visible(false);
        $('#checkout').hide();
    
        makeorder();
    }
    
}

function makeorder(){
    var action='fetchCart';
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    var confirm = table.column(1).data().toArray();
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        data:{action:action,time:time,confirm:confirm},
        success:function(data){
            if(data.order){
                
                $("#n3").html('<strong>Total € '+ data.order + '</strong>');
                $("#n4").html('<strong>Total € '+ time + '</strong>');
                setTimeout(function() {$('#okModal').modal('hide');}, 1000);
                cleanCart();
            }else{
                $('.modal-error').html("<i></i> Order he is doing already exists");
                $('#errorModal').modal('show');
                setTimeout(function() {$('#errorModal').modal('hide');}, 3000);
                //window.location.replace("http://localhost/Tweb/assets/html/catalog.php");
                cleanCart();
            }
        }
    });
    //});
}
/*$("#makethis").on('click', function(){
    $('#okModal').modal('show');
   // $('#errorModal').modal('show');
});*/


});