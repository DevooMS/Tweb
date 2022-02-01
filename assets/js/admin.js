$("#errormsg").hide();
$().ready(function() {
    // Selezione form e definizione dei metodi di validazione
    $("#changepass").validate({
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
        },
        // Settiamo il submit handler per la form

        submitHandler: function(form) {
            $("document").ready(function() {
                var action = "changePassword";
                var email = $("#email").val();
                var password = $("#password").val();
                $.ajax({
                    url: '../php/action_admin.php',
                    method: 'POST',
                    data: { //
                        action:action,email:email,password:password
                    },
                    dataType: 'json',
                    success:function(data){
                        if(data.changed){
                            $('.modal-msgtill').html("<i></i> Confirm");
                            $('.modal-msg').html("The password changed correctly");
                            $('#msgModal').modal('show');
                        }else{
                            $('.modal-msgtill').html("<i></i> Error");
                            $('.modal-msg').html("The account maybe not exists");
                            $('#msgModal').modal('show');
                        }
                    }

                });
            });
        }
    });

/**********************************************************/


$("#checkusr").validate({
    // Definiamo le nostre regole di validazione
    rules: {
        // login - nome del campo di input da validare
        email:{
            required: true,
        }
    },
    // Personalizzimao i mesasggi di errore
    messages: {
        email: {
            required: "Please input email",
            email2: "Please input a valid Email adress",
        }
    },
    // Settiamo il submit handler per la form

    submitHandler: function(form) {
        $("document").ready(function() {
            var action = "searchUser";
            var email = $("#emailck").val();
            var vat_number = $("#vat_number").val();
            $.ajax({
                url: '../php/action_admin.php',
                method: 'POST',
                data: { //
                    action:action,
                    email:email,
                    vat_number:vat_number,
                },
                dataType: 'json',
                success:function(data){
                    if(data.found){
                        $('#email').val(data.email);
                        $('#vat').val(data.vat);
                        $('#first_name').val(data.firstname);
                        $('#last_name').val(data.lastname);
                        $('#address').val(data.address);
                        $('#city').val(data.city);
                        $('#country').val(data.country);
                       
                        $('.modal-msgtill').html("<i></i> Success");
                        $('.modal-msg').html("Account is found");
                        $('#msgModal').modal('show');
                    }else{
                        $('#vat').val("Not Found");
                        $('#first_name').val("Not Found");
                        $('#last_name').val("Not Found");
                        $('.modal-msgtill').html("<i></i> Error");
                        $('.modal-msg').html("The account not exists");
                        $('#msgModal').modal('show');
                    }
                }
            });
        });
    }
});

$(".closebtn").on('click', function(){
    $('#msgModal').modal('hide');
    
});




});