// JavaScript Document
function validar2()
{
	if(document.ingreso.txt_nombre.value=="" || document.ingreso.txt_nombre.value.length<3)
	 {
		 alert("ingrese el nombre");
		 document.ingreso.txt_nombre.focus();
		 return;
	 }
	 alert("Gracias Por Inscribirse");
	 document.ingreso.submit();
	 
}