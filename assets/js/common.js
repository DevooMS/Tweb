$(function() {
    //$("#flash").hide();

    // print flash message if it has been set
    $.get("../php/getFlash.php", printFlash, "json");
    
    $("#login").on("click",function(){
        //alert("pressed");
        $.post("../php/db_login.php",
           { loginemail: $("#loginemail").val(), loginpassword: $("#loginpassword").val()},
           goToIndex,
           "json")
    })

});


function printFlash(json){
    // if isSet is true, then the flash message is set up and displayed
    if(json.isSet){
        $("#loginer").show();
        $("#loginer").text(json.flash);
    } // hide flash message container if there is no message to show
    else
         $("#loginer").hide();
}

/*function goToIndex(json){
    // go to index.php if logged in, back to login.php otherwise
    if(json.isLogged){
        $(window.location).attr('href', 'index.php');
    }
    else {
        $(window.location).attr('href', 'login.php');
    }
}*/