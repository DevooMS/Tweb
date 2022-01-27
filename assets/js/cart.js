$(document).ready(function(){


   /* var table = $("#table tbody"); per populare il table.
    $.each(data, function(idx, elem){
        table.append("<tr><td>"+elem.username+"</td><td>"+elem.name+"</td>   <td>"+elem.lastname+"</td></tr>");
    });
*/

    var action='getCart';
    $.ajax({
        url:'../php/action_cart.php',
        method:"POST",
        data:{action:action},
        dataType:"json",
        success:function(data){
            if(data.logged){

            }
        }
    })

    $("#deletecart").on('click', function(){ 
        var action='deleteCart';
        $.ajax({
            url:'../php/action_cart.php',
            method:"POST",
            data:{action:action},
            dataType:"json",
            success:function(data){
                if(data.logged){
    
                }
            }
        })


    });




});