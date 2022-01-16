$("document").ready(function() {
    //$("#response").hide();
    $("#login").on('click',function() {
        //console.log("OK");
        var email=$("#email").val();
        var password=$("#password").val();

        if(email==""||password==""){
        console.log("NOPE");
        }else{ 
            $.ajax({
                url:'login.php',
                method: 'POST',
                data:{
                    login:1,
                    emailPHP: email,
                    passwordPHP: password
                },
                success:function(response){
                    //console.log(response);
                    $("#response").show;
                   // $("#response").text(response);
                    //$("#response").html(response);
                },
                dataType:'text'

                });
            }
    });
});

