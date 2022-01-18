$(document).ready(function(){
            
            //Variables
            var val  = $(".val");
            var crt  = $(".create");
            var getc = $(".get");
            var delc = $(".delete");//The mistake I made was it said .get instead of .delete, this has been corrected. Sorry for any confusion.
            
            //Cookie code (cookie monster says yum! (parody))
            
            //Create cookie
            crt.click(function(){
                
                Cookies.set("first-cookie", val.val());
                
            });
            
            //Read the cookie value
            getc.click(function(){
                
                var cookieval = Cookies.get("first-cookie");
                
                alert("Cookie value is " + cookieval);
                
            });
            
            //Remove the cookie
            getc.click(function(){
                
                Cookies.remove("first-cookie");
                
            });
            
        });