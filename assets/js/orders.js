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
        "columnDefs": [{"className": "dt-center", "targets": "_all"} ],//per centrare la tabella
        "pageLength": 10                 
    
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

    var id = $(this).attr("id");		
    var action = "fetchOrders";
            $.ajax({
                url:"../php/action_cart.php",
                method:"GET",
                data:{id:id, action:action},
                success:function(data){
                    window.location.replace("http://localhost/Tweb/assets/html/order_details.php");
                }
            })
    
    
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





});