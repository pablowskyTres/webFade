/*Validar Usuario*/

function limpiar(obj)
{
    obj.value = "";
}

function atras() {
    alert("Volvemos atr�s");
    history.back();
}

function validaLogin()
{
    var usuario = document.getElementById("l_usuario");
    var clave = document.getElementById("l_clave");

    if (usuario.value == "" || usuario.value == "Usuario")
    {
        alert("Ingrese Usuario");
        usuario.focus();
        return;
    }

    if (clave.value == "" || clave.value == "xxxx")
    {
        alert("Ingrese Clave");
        clave.focus();
        return;
    }
    document.getElementById("frmSesion").submit();
}

/****************Validar Inscripcion*************/
function valida_inscrip()
{
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var edad = document.getElementById("edad");
    var email = document.getElementById("email");
    var direccion = document.getElementById("direccion");
    var regiones = document.getElementById("regiones");
    var ciudades = document.getElementById("ciudades");
    var comunas = document.getElementById("comunas");
    var telefono = document.getElementById("telefono");
    var usuario = document.getElementById("usuario");
    var clave = document.getElementById("clave");


    if (nombre.value == "" || nombre.value.length < 3)
    {
        alert("Ingrese Nombre, por lo menos 3 carácteres ");
        nombre.focus();
        return;
    }

    if (apellidos.value == "" || apellidos.value.length < 4)
    {
        alert("Ingrese Apellidos, por lo menos 3 car�cteres ");
        apellidos.focus();
        return;
    }

    if (!isNatural(edad.value))
    {
        alert("Ingresar Edad (mayor de 18) y solo Digitos")
        edad.focus()
        return;

    }

    if (email.value == "")
    {
        alert("ingrese E-Mail");
        email.focus();
        return;
    }
    text = email.value;

    if ((text.indexOf(".com") < 5) && (text.indexOf(".org") < 5)
            && (text.indexOf(".gov") < 5) && (text.indexOf(".net") < 5)
            && (text.indexOf(".cl") < 5) && (text.indexOf(".edu") < 5))
    {
        alert("Lo siento. Pero esa cuenta de correo parece err�nea. Por favor,"
                + " comprueba el sufijo (que debe incluir alguna terminaci�n como: "
                + ".com, .edu, .net, .org, .gov , .cl)");
        email.focus();
        return;
    }


    if (direccion.value == "")
    {
        alert("Ingrese Direccion:")
        direccion.focus()
        return;

    }

    if (regiones.value == "")
    {
        alert("Seleccione una Region:")
        regiones.focus()
        return;

    }

    if (ciudades.value == "")
    {
        alert("Seleccione una Ciudad:")
        ciudades.focus()
        return;

    }

    if (comunas.value == "")
    {
        alert("Ingrese Comuna:")
        comunas.focus()
        return;

    }

    if (!isNatural(telefono.value))
    {
        alert('Debe ingresar solo Numero');
        telefono.focus()
        return;
    }

    if (usuario.value == "" || usuario.value == "Usuario")
    {
        alert("Ingrese Usuario");
        usuario.focus();
        return;
    }

    if (clave.value == "" || clave.value == "xxxx")
    {
        alert("Ingrese Clave");
        clave.focus();
        return;
    }

    alert("Muchas gracias por Inscribirse");
    frmx = document.getElementById("frmInscripcion");
    frmx.action = "ingreso.php";
    frmx.submit();
}

/******* Valida contacto ***********/
function valida_contacto()
{
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var telefono = document.getElementById("telefono");
    var email = document.getElementById("email");
    var comentarios = document.getElementById("comentarios");

    if (nombre.value == "" || nombre.value.length < 3)
    {
        alert("Ingrese Nombre, por lo menos 3 car�cteres ");
        nombre.focus();
        return;
    }

    if (apellidos.value == "" || apellidos.value.length < 4)
    {
        alert("Ingrese Apellidos, por lo menos 3 car�cteres ");
        apellidos.focus();
        return;
    }

    if (!isNatural(telefono.value) && telefono.value.length <= 9)
    {
        alert('Debe ingresar solo Numero');
        telefono.focus()
        return;
    }

    if (email.value == "")
    {
        alert("ingrese E-Mail");
        email.focus();
        return;
    }
    text = email.value;

    if ((text.indexOf(".com") < 5) && (text.indexOf(".org") < 5)
            && (text.indexOf(".gov") < 5) && (text.indexOf(".net") < 5)
            && (text.indexOf(".cl") < 5) && (text.indexOf(".edu") < 5))
    {
        alert("Lo siento. Pero esa cuenta de correo parece err�nea. Por favor,"
                + " comprueba el sufijo (que debe incluir alguna terminaci�n como: "
                + ".com, .edu, .net, .org, .gov ,.es, .cl)");
        email.focus();
        return;
    }

    if (comentarios.value == "")
    {

        alert("Ingrese Algun comentario:")
        comentarios.focus()
        return;

    }

    alert("Muchas gracias por Contactarnos")
    document.getElementById("frmContacto").submit();
    return;

}

/********** validacion de numeros *************/
function isNatural(str)
{
    var i;
    var c;
    var tmp = new String;
    if (str == null || str.length == null)
        return false;
    tmp = Trim(str);
    if (tmp.length == 0)
        return false;
    for (i = 0; i < tmp.length; i++) {
        c = tmp.charAt(i);
        if (c < '0' || c > '9')
            return false;
    }
    return true;
}

function isReal(str) {
    var c;
    var tmp;
    var p;
    if (str == null || str.length == null)
        return false;
    tmp = Trim(str);
    if (tmp.length == 0)
        return false;
    c = tmp.charAt(0);
    if (c == '-' || c == '+')
        tmp = tmp.substring(1, tmp.length);
    p = tmp.indexOf('.');
    if (p == -1)
        return isNatural(tmp);
    return isNatural(tmp.substring(0, p))
            && isNatural(tmp.substring(p + 1, tmp.length));
}

function LTrim(str) {
    var i;
    var inicio; //posicion desde donde no hay espacios
    if (str == null)
        return "";
    largo = str.length;
    inicio = 0;
    for (i = 0; i < largo; i++) {
        c = str.charAt(i);
        if (c == ' ')
            inicio = i + 1;
        else
            break;
    }
    return str.substring(inicio, largo);
}

function RTrim(str) {
    var i;
    var fin; //posicion hasta donde no hay espacios
    if (str == null)
        return "";
    fin = str.length;
    for (i = fin - 1; i >= 0; i--) {
        c = str.charAt(i);
        if (c == ' ')
            fin = i;
        else
            break;
    }
    return str.substring(0, fin);
}

function Trim(str) {
    return(RTrim(LTrim(str)));
}

/* validacion de letras */
function valida(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

/********* Funcion que retorna la hora ***********/
function RetornaFecha()
{
    var fecha;
    fecha = new Date();
    dias = new Array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
    meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    var cadena = dias[fecha.getDay()] + " " + fecha.getDate() + " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear();
    return cadena;
}
function mueveReloj()
{
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String(segundo)
    if (str_segundo.length == 1)
        segundo = "0" + segundo

    str_minuto = new String(minuto)
    if (str_minuto.length == 1)
        minuto = "0" + minuto

    str_hora = new String(hora)
    if (str_hora.length == 1)
        hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()", 1000)
}





