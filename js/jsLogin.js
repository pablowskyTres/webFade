// JavaScript Document
$(document).ready(function () {

	if ($('#id_conexion').val()>0) {
		var id = $('#id_conexion').val();
		$.ajax({
	            type: "POST",
	            url: "../webFade/php/php.php",
	            data: {
	            	cmd: 'getPermisos',
	            	id: id
	            },
	            cache: false,
	            success: function (retorno) {
	            	alert(retorno);
	                admin = retorno;
	                if (admin == 1) {
						$('#admin').show();
	                }
	            }
	    });
	}

	var valido = 0;

    $( "#login" ).on( "submit", function(evento) {
    	var user = $('#txt_username').val();
    	var pass = $('#txt_password').val();
    	$.ajax({
	            type: "POST",
	            url: "../webFade/php/php.php",
	            data: {cmd: 'verificarLogin'},
	            cache: false,
	            success: function (retorno) {
	                valido = retorno;
	            }
	    });
  		if (valido == 0) {
			evento.preventDefault();
			$('#mensaje').show();
  		}
	});

});

var iniciarSesion = function($id){
	$('#id_conexion').val($id);
}