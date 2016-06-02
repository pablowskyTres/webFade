$(document).ready(function(){
	$("#btnModificar").hide();
});

function modificarProducto(id, nombre, stock, descripcion){
     $("#txt_nombre").val(nombre);
     $("#txt_stock").val(stock);
     $("#txt_descripcion").val(descripcion);
     $("#id").val(id);
     $("#btnModificar").show();
     $("#btnGuardar").hide();
}

function devolverBotones(){
	$("#btnGuardar").show();
	$("#btnModificar").hide();
}