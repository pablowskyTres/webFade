// JavaScript Document
$(document).ready(function () {
	if (document.getElementById('LOGIN').val() == 'LOGIN') {
		alert("LOGIN");
	}

    var id = $('#id_conexion').val();
    if (id == 0) {
		$('#user_conexion').html("");
    }else{
    	$.ajax(
	    	{
	            type: "POST",
	            url: "../php/php.php",
	            data: {id: id, cmd: 'LOGIN'},
	            cache: false,
	            success: function (retorno) {
	                $('#user_conexion').html(retorno);
	            }
	    	}
    	);
    }
});

var iniciarSesion = function($id){
	$('#id_conexion').val($id);
}