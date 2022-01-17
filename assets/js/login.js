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
$("#phpmsg").hide();
$("document").ready(function() {
    var thisremember = 0;
    $("#remember").on('click',function(){
        thisremember = 1;
    });
    $("#login").on('click',function() {
        //var thisremember=itsremember();
        var thislogin=$("#loginemail").val();
        var thisloginpassword=$("#loginpassword").val();
         
         $.ajax({
            url:'../php/db_login.php',
            method: 'POST',
            data:{//
            loginemail: thislogin,
            loginpassword: thisloginpassword,
            remember:thisremember
            }, 
            dataType:'json',
            });
            console.log(remember);
            printthis();
    });
});


/*function goToIndex(json){
    // go to index.php if logged in, back to login.php otherwise
    if(json.isLogged){
        $(window.location).attr('href', 'index.php');
    }
    else {
        $(window.location).attr('href', 'login.php');
    }
}*/