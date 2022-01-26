$(document).ready(function() {
	var action = 'getProfile';	
    $.ajax({
        url:'../php/action_profile.php',
     method:"POST",
        dataType:"json",
        data:{action:action},
        success:function(data){
        console.log(data.email);
                $('#email').val(data.email);
                $('#vat').val(data.vat_number);
                $('#first_name').val(data.firstname);
                $('#last_name').val(data.lastname);
                $('#address').val(data.address);				
                $('#city').val(data.city);
                $('#country').val(data.country);  
                
                }
            })

    $("#setprofile").on('submit',function(){
        var action = 'updateProfile'
        var email = $("#email").val();
        console.log("TS"+email);
        event.preventDefault(); 
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url:'../php/action_profile.php',
         method:"POST",
            dataType:"json",
            data:{action:action,formData,email},
            success:function(data){
            console.log(data.email);
                   // $('#address').val(data.address);				
                    //$('#city').val(data.city);
                   // $('#country').val(data.country);  
            }
         })
    
    });
});


