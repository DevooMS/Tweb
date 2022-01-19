function printthis() {
    $.get("../php/msg_check.php", printFlash, "json");
    $.get({
        url: "../php/msg_check.php",
        datatype: "json",
        success: printFlash,
    });
}

function printFlash(json) {
    // if isSet is true, then the flash message is set up and displayed
    if (json.unsuccessful) {
        if (json.isSet) {
            //console.log("login_unsuccessful")
            $("#phpmsg").show();
            $("#phpmsg").css('color', 'red');
            $("#phpmsg").text(json.unsuccessful); //stampo il messaggio passato dalla sessione unsuccessful
        }
    } else if (json.successfully) {
        if (json.isSet) {
            callcookie();
            $("#phpmsg").show();
            $("#phpmsg").css('color', 'green');
            $("#phpmsg").text(json.successfully); //stampo il messaggio passato dalla sessione unsuccessful
        }
    } else {
        $("#phpmsg").hide();
    }


}