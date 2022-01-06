$(function() {
  //$("#flash").hide();
  // print flash message if it has been set
  $.get("assets/php/common.php", printFlash, "json");
  
  $("#checklogin").on("click",function(){
      $.post("../php/db_register.php",
         { username: $("#username").val(), pwd: $("#password").val()},
         goToIndex,
         "json")
  })

});

function printFlash(json){
    alert("Test");
    // if isSet is true, then the flash message is set up and displayed
    if(json.isSet){
       // $("#flash").show();
        $("#flash").text(json.flash);
    } // hide flash message container if there is no message to show
    else
        $("#flash").hide();
}

function goToIndex(json){
  // go to index.php if logged in, back to login.php otherwise
  if(json.isLogged){
      $(window.location).attr('href', 'assets/php/register.php');
  }
  else {
      $(window.location).attr('href', 'assets/php/register.php');
  }
}
