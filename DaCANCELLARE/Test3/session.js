$(document).ready(function(){
	//here simple conditions of check session
	$('#checkSession').click(function(){
		var session = $('#session').val();
		if(session == ''){
			alert('Live Session not Set');
			console.log('Live Session not Set');
		}
		else{
			//alert('here simple Current Live Session Value: '+session);
            $("#test").text(session);
			console.log(session);
		}
	});
});

var session;
$.ajaxSetup({cache: false})
$.get('do_session.php', {
    requested: 'foo'}, function (data) {
    session = data;
});
