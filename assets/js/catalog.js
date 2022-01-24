$(document).ready(function(){	
	var listData = $('#catalogList').DataTable({
		"lengthChange": false,       //serve per controllare la paginazione
		//"processing":true,        //serve per controllare se e riuscito a conettersi 
		"serverSide":true,         //serve a dire che i dati sono presi da lato server
		"order":[],				 //serve dire che non e ordinato ma viene caricato i dati da come e stato fato il fetch
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listCatalog'},
			dataType:"json"
		},
		"columnDefs":[         //definisco che la colona 0,6,7 non sia ordinabile e posso fare anche altre operazione come nascondi tabella
			{
				"targets":[0, 5, 6,7],
				"orderable":false,
			},
		],
		"pageLength": 10      //quanti tuple posso vedere singola volte
	});		

	$('#addProduct').click(function(){
		$('#productModal').modal('show');
		$('#productForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add product");
		$('#action').val('addProduct');
		$('#save').val('Add');
	});	


	

	$("#catalogList").on('click', '.update', function(){
		var skuid = $(this).attr("skuid");           //ritorna il valore di skuid con this        
		var action = 'getProduct';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{skuid:skuid, action:action},
			dataType:"json",
			success:function(data){
				$('#productModal').modal('show');
				$('#nmproduct').val(data.namep);
				$('#brand').val(data.brand);
				$('#skuid').val(data.skuid);
				$('#qty').val(data.qty);				
				$('#cost').val(data.cost);	
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit product");
				$('#action').val('updateProduct');
				$('#save').val('Save');
				document.getElementById('skuid').readOnly = true;
			}
		})
	});
	$("#productModal").on('submit','#productForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#productForm')[0].reset();
				$('#productModal').modal('hide');				
				$('#save').attr('disabled', false);
				listData.ajax.reload();
				//console.log("Parser"+JSON.parse(data.setError));
				//if(data.setError==true){console.log("test");}
			}
		
		})
	});
		
	$("#catalogList").on('click', '.delete', function(){
		var skuid = $(this).attr("skuid");		
		var action = "prDelete";
		$('.modal-msgtill').html("<i class='fa fa-plus'></i> Delete Product");
		$('.modal-msg').html("<i class='fa fa-plus'></i> Are you sure to delete this product ? ");
		$('#deleteModal').modal('show');
		
		$( "#deletbtn" ).on( "click", function() {
				$.ajax({
					url:"action.php",
					method:"POST",
					data:{skuid:skuid, action:action},
					success:function(data) {					
						listData.ajax.reload();
					}
				})
			$('#deleteModal').modal('hide');	
	  	});
	});	

	$("#catalogList").on('click', '.buy', function(){
		var skuid = $(this).attr("skuid");		
		var action = "prBuy";
		console.log("THIS");
		$('#deleteModal').modal('show');
		$('#deletbtn').hide();
		$('.modal-msgtill').html("<i class='fa fa-plus'></i> Buy Product");
		$('.modal-msg').html("<i class='fa fa-plus'></i> Added to cart ");
		
		setTimeout(function() {$('#deleteModal').modal('hide');}, 1000);

		/*if(confirm("Are you sure you want to delete this product?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{skuid:skuid, action:action},
				success:function(data) {					
					listData.ajax.reload();
				}
			})
		} else {
			return false;
		}*/
	});
});