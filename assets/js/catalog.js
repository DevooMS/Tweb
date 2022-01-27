
$(document).ready(function(){
	
	
	var listData = $('#catalogList').DataTable({
		"lengthChange": false,       //serve per controllare la paginazione
		//"processing":true,        //serve per controllare se e riuscito a conettersi 
		"serverSide":true,         //serve a dire che i dati sono presi da lato server
		"order":[],				 //serve dire che non e ordinato ma viene caricato i dati da come e stato fato il fetch
		"ajax":{
			url:"../php/action_catalog.php",
			type:"POST",
			data:{action:'listCatalog'},
			dataType:"json"
		},
		"columnDefs":[         //definisco che la colona 0,6,7 non sia ordinabile e posso fare anche altre operazione come nascondi tabella
			{
				"targets":[0,1,2,3,4,5,6,7],
				"orderable":false,
			},
		],
		"pageLength": 10      //quanti tuple posso vedere singola volte
	});		

	console.log("THISS");
	$.ajax({
		url:'../php/access.php',
		method:"POST",
		dataType:"json",
		success:function(data){
			if(data.logged){
				if(data.utype=='admin'){
				}else{
					listData.columns([5,6]).visible(false);
				}
				console.log(data.utype);
			}
		}
	})

	$('#addProduct').click(function(){
		$('#productModal').modal('show');
		$('#productForm')[0].reset();
		$('.modal-title').html("<i></i> Add product");
		$('#action').val('addProduct');
		$('#save').val('Add');
	});	


	

	$("#catalogList").on('click', '.update', function(){  
		var skuid = $(this).attr("skuid");                 //ritorna il valore di skuid con this dove this lo prende da cataloglist  e skuid e nome attributo   
		var action = 'getProduct';
		$.ajax({
			url:'../php/action_catalog.php',
			method:"POST",
			data:{skuid:skuid, action:action},
			dataType:"json",
			success:function(data,utype){
				$('#productModal').modal('show');
				$('#nmproduct').val(data.namep);
				$('#brand').val(data.brand);
				$('#skuid').val(data.skuid);
				$('#qty').val(data.qty);				
				$('#cost').val(data.cost);
				console.log("THISN"+JSON.stringify(utype));
				$('.modal-title').html("<i></i> Edit product");
				$('#action').val('updateProduct');
				$('#save').val('Save');
				document.getElementById('skuid').readOnly = true;
			}
		})
	});
	$("#productModal").on('submit','#productForm', function(event){
		event.preventDefault();       //interrompe l'esecuzione dell'azione predefinita di un elemento, in questo caso invio di un form
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();   //prende i dati dal form e lo serializza tutti con & data1 & data2. e vengono presi poi da post
		$.ajax({
			url:"../php/action_catalog.php",
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
		$('.modal-msgtill').html("<i></i> Delete Product");
		$('.modal-msg').html("<i></i> Are you sure to delete this product ? ");
		$('#deleteModal').modal('show');
		
		$( "#deletbtn" ).on( "click", function() {
				$.ajax({
					url:"../php/action_catalog.php",
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
		$('.modal-msgtill').html("<i></i> Buy Product");
		$('.modal-msg').html("<i></i> Added to cart ");
		
		setTimeout(function() {$('#deleteModal').modal('hide');}, 1000);
		$.ajax({
			url:"../php/action_catalog.php",
			method:"POST",
			data:{skuid:skuid, action:action},
			success:function(data) {					
				$('#action').val('buyProduct');		
				}
			})
		
	});
	$(".closebtn").on('click', function(){
		$('#deleteModal').modal('hide');
		$('#productModal').modal('hide');
		
	});

	function type(){
		$('#catalogList').DataTable( {
			"columnDefs": [ {"targets": [ 6,7 ],"visible": false,},]
		});
		$('#addProduct').hide();
	}

});
