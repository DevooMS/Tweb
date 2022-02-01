$(document).ready(function(){
        //$('#n5').show();
        //$('#n6').show();
        $('#table').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching":   false,
            "ajax": {
                "url":"../php/db_details.php", 
                "dataSrc": function (data) {
                    $('#n1').html('<i></i> Name: '+data.firstname+' '+data.lastname +' ');
                    $('#n2').html('<i></i> Address: '+data.address+' '+data.city +' '+data.country);
                    $('#n3').html('<i></i> Vat Numer: '+data.vat_number+'');
                    $("#n5").html('<strong>'+ data.id + '</strong>');
                    $("#n6").html('<strong>'+ data.time + '</strong>');
                    $("#n7").html('<strong>'+ data.total + '</strong>');




                    return data.data;
                }
            },
            language: {                                                         
                loadingRecords: " ",
                zeroRecords: " "
            },
            "columnDefs": [{"className": "dt-center", "targets": "_all"} ],//per centrare la tabella
            "pageLength": 10       
        });

 
  
 });