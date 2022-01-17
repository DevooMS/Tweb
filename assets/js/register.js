$("document").ready(function() {
    $("#errormsg").hide();
    $("#submit").on('click',function() {
        //console.log("OK");
        var thissubmit=1;
        var thisemail=$("#email").val();
        var thispassword=$("#password").val();
        var thisvat_number=$("#vat_number").val();
        var thisfirstname=$("#firstname").val();
        var thislasname=$("#lastname").val();
         $.ajax({
            url:'../php/db_register.php',
            method: 'POST',
            data:{//
                submit:thissubmit,
                email:thisemail,
                password:thispassword,
                vat_number:thisvat_number,
                firstname:thisfirstname,
                lastname:thislasname,
            }, 
            dataType:'json',
            });
            printthis();
    });
});