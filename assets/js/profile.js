$(document).ready(function() {
	var action = 'getProfile';	
    $.ajax({
        url:'../php/action_profile.php',
     method:"POST",
        dataType:"json",
        data:{action:action},
        success:function(data){
                $('#email').val(data.email);
                $('#vat').val(data.vat_number);
                $('#first_name').val(data.firstname);
                $('#last_name').val(data.lastname);
                $('#address').val(data.address);				
                $('#city').val(data.city);
                $('#country').val(data.country);  
                if(data.type='admin'){
                    $('#profileimg').attr("src", "../img/avatars/admin.png");
                }else{
                    $('#profileimg').attr("src", "../img/avatars/user.png");
                }  
                    if(data.confirm==1){
                        $('#submit').hide();
                        $("#address").attr("disabled", "disabled"); 
                        $("#city").attr("disabled", "disabled"); 
                        $("#country").attr("disabled", "disabled"); 
                    }else{
                        $('#submit').show();
                        $("#address").removeAttr("disabled"); 
                        $("#city").removeAttr("disabled"); 
                        $("#country").removeAttr("disabled"); 
                       
                    }
                }
            })

    $("#setprofile").on('submit',function(){
        $("#actionhid").val('updateProfile');
        $('#emailhid').val($("#email").val());
        event.preventDefault(); 
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url:'../php/action_profile.php',
         method:"POST",
            dataType:"json",
            data:formData,
            success:function(data){
            console.log(data.email);
                   // $('#address').val(data.address);				
                    //$('#city').val(data.city);
                   // $('#country').val(data.country);  
            }
         })
    
    });
});


