$(document).ready(function(){


   var table= $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching":   false,
        "ajax":{
			url:"../php/action_cart.php",
			type:"POST",
			data:{action:'getCart'},
			dataType:"json"
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
  


$("#example").on('click', '.delete', function(){
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


$("#clear_cart").on('click', function(){ 
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

});




$("#checkout").on('click', function(){ 
   
    $('.modal-msgtill').html("<i></i> Confirm Order");
    $('.modal-msg').html("The payment and the pickup of orders will be done on our warehouse");
    $('#msgModal').modal('show');
    
});
$(".closebtn").on('click', function(){
    $('#msgModal').modal('hide');
    $('#cartModal').modal('hide');
    
});



$("#confirmbtn").on('click', function(){ 
    var action='buyCart';
    var checkconfirm = table.column(1).data().toArray();
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        data:{action:action,checkconfirm:checkconfirm},
        success:function(data){
            if(data.error==1){
                $('#msgModal').modal('hide');
                $('#msgModal').modal('show');
                $('.modal-msgtill').html("<i></i> Error");
                $('.modal-msg').html("<i></i> One or more items are no longer available in your cart");
            }else if(data.error==2){
                $('#msgModal').modal('hide');
                $('#msgModal').modal('show');
                $('.modal-msgtill').html("<i></i> Error");
                $('.modal-msg').html("<i></i> The price has been updated item will be removed from your cart ");
            }
        }
    });
    
});

$("#makethis").on('click', function(){
    var total = $("#total").val(); 
    
    var action='fetchCart';
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    var confirm = table.column(1).data().toArray();
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        data:{action:action,time:time,confirm:confirm},
        success:function(data){
            if(data.logged){
    
            }
        }
    });
    
});



});