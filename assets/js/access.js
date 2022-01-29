$(document).ready(function() {
	$('#top').hide();
		$.ajax({
			url:'../php/access.php',
			method:"POST",
			dataType:"json",
			success:function(data){
				if(data.logged){
					if(data.utype=='admin'){
						$('#top').show();
						
					}else{
						$('#top').hide();
						
					}
					console.log(data.utype)
				}else{window.location.replace("http://localhost/Tweb/index.html");}
			}
		})
});
