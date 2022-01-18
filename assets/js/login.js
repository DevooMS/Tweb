/*$(function() {
    $("#errormsg").hide();

    // print flash message if it has been set
   
    
    $("#login").on("click",function(){
        //alert("pressed");
        $.post("../php/db_login.php",{ loginemail: $("#loginemail").val(), loginpassword: $("#loginpassword").val()})  
        $.get("../php/msg_check.php", printFlash, "json");     
        printFlash("json");
    })

});*/

    



/*function goToIndex(json){
    // go to index.php if logged in, back to login.php otherwise
    if(json.isLogged){
        $(window.location).attr('href', 'index.php');
    }
    else {
        $(window.location).attr('href', 'login.php');
    }
}*/


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
          loginemail: "Inserisci la login",
          loginpassword: {
                required: "Please input password",
            },
        },
        // Settiamo il submit handler per la form
        submitHandler: function(form) {
            
            $("document").ready(function() {
               // console.log("OK");
                    var thisremember = 0;
                
                    //var thisremember=itsremember();
                    var thislogin=$("#loginemail").val();
                    var thisloginpassword=$("#loginpassword").val();
                   // $.get("../php/msg_check.php", printFlash, "json");
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
                    //printthis(printthis()); 
                    printthis();   
                    //setloginc(thislogin,thisloginpassword);
            });
        }
    });
});
 


/*$("#remember").on('click',function(){
    console.log("COOKIE");
document.getElementById("myCheck").checked = true;
});*/