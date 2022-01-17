function printthis(){
    //$("#phpmsg").hide();
    $.get("../php/msg_check.php", printFlash, "json");
}

function printFlash(json){
    
    // if isSet is true, then the flash message is set up and displayed
    if(json.unsuccessful){
        if(json.isSet){
            console.log("login_unsuccessful")
            $("#phpmsg").show();
            $("#phpmsg").css('color', 'red');
            $("#phpmsg").text(json.unsuccessful); //stampo il messaggio passato dalla sessione unsuccessful
        }else{
            $("#phpmsg").hide();
        }
    }else if(json.successfully){
        if(json.isSet){
            console.log("login_successfully")
            $("#phpmsg").show();
            $("#phpmsg").css('color', 'green');
            $("#phpmsg").text(json.successfully); //stampo il messaggio passato dalla sessione unsuccessful
        }else{
            $("#phpmsg").hide();
        }
    }else{$("#phpmsg").hide();}
    
         
}