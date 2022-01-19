    var thislogin='';
    var thisloginpassword='';
    $("#login").on("click",function(){
        thislogin=document.getElementById("loginemail").value;
        thisloginpassword=document.getElementById("loginpassword").value;
    })
    function callcookie(){

            if(document.getElementById('remember').checked==true){
                if(logincookie!=thislogin){
                   
                    Cookies.set('loginc', thislogin, { expires: 7 });
                    Cookies.set('passwordc', thisloginpassword, { expires: 7 });
                }else{console.log("Cookie alreadry esist");}

            }else{;
                Cookies.remove('loginc')
                Cookies.remove('passwordc')
            }
   }
  
   var logincookie=Cookies.get("loginc");
   var passcookie=Cookies.get("passwordc");
   if(typeof logincookie!="undefined" && typeof passcookie!="undefined"){ 
   document.getElementById('loginemail').setAttribute("value", logincookie);
   document.getElementById('loginpassword').setAttribute("value", passcookie);
   document.getElementById('remember').checked=true;
   }


