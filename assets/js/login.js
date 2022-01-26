$("#phpmsg").hide();
$().ready(function() {
    // Selezione form e definizione dei metodi di validazione
    $("#loginpage").validate({
        // Definiamo le nostre regole di validazione
        rules : {
            // login - nome del campo di input da validare
            loginemail : {
                required : true,
                // Definiamo il campo email come un campo di tipo email
                email : true
            },
            loginpassword : {
                required : true,
                // Settiamo la lunghezza minima e massima per il campo password
                //minlength : 5,
                //maxlength : 8
            }
        },
        // Personalizzimao i mesasggi di errore
        messages: {
          loginemail: "Please input email",
          loginpassword: {
                required: "Please input password",
            },
        },

        submitHandler: function(form) { 
            $("document").ready(function() {
                    var thisremember = 0;
                    var thislogin=$("#loginemail").val();
                    var thisloginpassword=$("#loginpassword").val();
                  
                    $.ajax({
                        url:'../php/db_login.php',
                        method: 'POST',
                        data:{
                        loginemail: thislogin,
                        loginpassword: thisloginpassword,
                        remember:thisremember
                        }, 
                        dataType:'json',
                  
                        });

    
                    printthis(printthis());
            });
        }
    });
});

