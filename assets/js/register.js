$("#errormsg").hide();
$().ready(function() {
    console.log("this");
    // Selezione form e definizione dei metodi di validazione
    $("#registerpage").validate({
        // Definiamo le nostre regole di validazione
        rules: {
            // login - nome del campo di input da validare
            email: {
                required: true,
                // Definiamo il campo email come un campo di tipo email
                email: true
            },
            password: {
                required: true,
                // Settiamo la lunghezza minima e massima per il campo password
                minlength: 5,
                maxlength: 15
            },
            confirm_password: {
                required: true,
                //verifico che la confirm_password sia uguale a password 
                equalTo: "#password",
            },
            vat_number: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            }

        },
        // Personalizzimao i mesasggi di errore
        messages: {
            email: {
                required: "Please input email",
                email2: "Please input a valid Email adress",
            },
            password: {
                required: "Please input password",
                minlength: "The password cannot be less than 5",
                maxlength: "The password cannot be exceed more than 20",
            },
            confirm_password: {
                required: "Please input confirm password",
                minlength: "The password cannot be less than 5",
                maxlength: "The password cannot be exceed more than 20",

            },
            vat_number: {
                required: "Please input password",
                integer: "The vat number can only be numbers",
            },
            firstname: {
                required: "Please input firstname",
                lettersonly: "Can only be letters",
            },
            lastname: {
                required: "Please input lastname",
                lettersonly: "Can only be letters",
            },
        },
        // Settiamo il submit handler per la form

        submitHandler: function(form) {
            $("document").ready(function() {
                var thissubmit = 1;
                var thisemail = $("#email").val();
                var thispassword = $("#password").val();
                var thisvat_number = $("#vat_number").val();
                var thisfirstname = $("#firstname").val();
                var thislasname = $("#lastname").val();
                $.ajax({
                    url: '../php/db_register.php',
                    method: 'POST',
                    data: { //
                        submit: thissubmit,
                        email: thisemail,
                        password: thispassword,
                        vat_number: thisvat_number,
                        firstname: thisfirstname,
                        lastname: thislasname,
                    },
                    dataType: 'json',
                    success:function(data){
                        if(data.register==true){
                            $("#phpmsg").show();
                            $("#phpmsg").css('color', 'green');
                            $("#phpmsg").text(data.status);
                            var delay = 2000; 
                            setTimeout(function(){ window.location = 'http://localhost/Tweb/assets/html/login.php'; }, delay);
                        }else{
                            $("#phpmsg").show();
                            $("#phpmsg").css('color', 'red');
                            $("#phpmsg").text(data.status);
                        }
                    }
                });
            });
        }
    });
});