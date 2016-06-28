<?php 
// LLAMADO CLASE
require_once 'lib/Cuenta.class.php';
require_once 'lib/Config.class.php';
require_once 'lib/Producto.class.php';
require_once 'lib/Contacto.class.php';
require_once 'lib/Persona.class.php';
require_once 'lib/Usuario.class.php';

//HELPERS
require_once 'helpers/Session.class.php';

// require_once 'lib/Conexion.class.php';

// LLAMADO DAO
require_once 'libDao/CuentaDao.class.php';
require_once 'libDao/ProductoDao.class.php';
require_once 'libDao/ContactoDao.class.php';
require_once 'libDao/PersonaDao.class.php';
require_once 'libDao/UsuarioDao.class.php';

//LLAMADO VIEW
require_once('libView/Slider.class.php');
require_once('libView/Header.class.php');
require_once('libView/Footer.class.php');
require_once('libView/RegistrarView.class.php');
require_once('libView/IngresarView.class.php');
require_once('libView/ContactoView.class.php');
require_once('libView/MantenedorProductoView.class.php');
require_once('libView/CatalogoView.class.php');

//INSTANCIA CONEXION
$sesion = new Session();
$conexion = null;
$mostrarSesion = "";
session_start();

//INSTANCIA DAO
$cuentaDao = new CuentaDao($conexion);
$productoDao = new ProductoDao($conexion);
$contactoDao = new ContactoDao($conexion);
$personaDao = new PersonaDao($conexion);
$usuarioDao = new UsuarioDao($conexion);

//INSTANCIA VIEW
$slider = new Slider();
$header = new Header();
$footer = new Footer();
$registrar = new Registrar();
$ingresar = new Ingresar();
$contacto_view = new ContactoView();
$mantenedor_producto = new MantenedorProducto();
$catalogo = new CatalogoView();

//INSTANCIA HTML
$contenido = null;

//INSTANCIA OPCION
$op = isset($_REQUEST['op']) ? $op = $_REQUEST['op'] : $op = null;

if (isset($_SESSION['user']) && isset($_SESSION['id_conexion'])) {
	$user = $_SESSION['user'];
	$id = $_SESSION['id_conexion'];
	$mostrarSesion =<<<HTML
		<div class="sesion">
			<label name="user_conexion">$user</label>
			<input type="hidden" id="id_conexion" name="id_conexion" value="$id"/>
			<a href="index.php?op=0">Cerrar Sesión</a>
	  	</div>
HTML;
}

//CASES
switch ($op) {
	case INICIO:
		break;
	case REGISTRAR:
		$do = isset($_POST['action']) ? $_POST['action'] : $do = null;
		if (!isset($do)) {
		$do = isset($_REQUEST['do']) ? $do = $_REQUEST['do'] : $do = null;
		}
		switch ($do) {
			case CREAR:
				$hash = "polloloco";
				//PERSONA
				$nombre = $_POST['txt_nombre'];
				$ap_paterno = $_POST['txt_ap_paterno'];
				$ap_materno = $_POST['txt_ap_materno'];
				$genero = $_POST['genero'];
				$direccion = $_POST['txt_direccion'];
				//CUENTA
				$username = strtolower($nombre.$ap_paterno);
				$email = $_POST['email'];
				$pass = $_POST['password'];
				$password = crypt($pass, $hash);
				//INSERT PERSONA
				$persona = new Persona($nombre, $ap_paterno, $ap_materno, $genero, $direccion, $email);
				$personaDao->sqlInsert($persona);
				//INSERT CUENTA
				$persona_id = $personaDao->sqlSelect($email);
				$cuenta = new Cuenta($username, $password, $email, $persona_id);
				$cuentaDao->sqlInsert($cuenta);
				//INSERT USUARIO
				$usuario = new Usuario($persona_id);
				$usuarioDao->sqlInsert($usuario);
				break;
			default:
				print_r("");
				break;
		}
		$contenido = $registrar->getHtml();
		break;
	case INGRESAR:
		$do = isset($_POST['action']) ? $_POST['action'] : $do = null;
		if (!isset($do)) {
		$do = isset($_REQUEST['do']) ? $do = $_REQUEST['do'] : $do = null;
		}
		$mensaje = "";
		switch ($do) {
			case LOGIN:
				$hash = "polloloco";
				$user = $_POST['txt_username'];
				$password = $_POST['txt_password'];
				$pass = crypt($password, $hash);
				$persona_id = $cuentaDao->login($user, $pass);
				if ($persona_id == null) {
					$mensaje = $ingresar->getMensaje('errLogin');
				}
				else{
					$_SESSION['id_conexion']  = $persona_id;
					$_SESSION['user']  = $user;
					header("Refresh:0; url=index.php");
				}
				break;
			default:
				print_r("");
				break;
	}
		$contenido = $mensaje.$ingresar->getHtml();
		break;
	case CONTACTO:
		$do = isset($_POST['action']) ? $_POST['action'] : $do = null;
		if (!isset($do)) {
			$do = isset($_REQUEST['do']) ? $do = $_REQUEST['do'] : $do = null;
		}
		switch ($do) {
			case GUARDAR_CONTACTO:
				$nom = $_POST['txt_nombre'];
				$email = $_POST['txt_email'];
				$msg = $_POST['txt_mensaje'];
				$contacto = new Contacto($nom, $email, $msg);
				$contactoDao->sqlInsert($contacto);
				header('Location: index.php?op=6');
				break;
			case ELIMINAR:
				$id = $_REQUEST['id'];
				$contactoDao->sqlDelete($id);
				header('Location: index.php?op=7');
			break;
			default:
				print_r("");
				break;
		}
		$contenido = $contacto_view->getHtml();
		break;
	case LISTA_CONTACTO:
		$contenido = $contacto_view->listaContacto();
		break;
	case MANTENEDOR_PRODUCTO:
		$do = isset($_POST['action']) ? $_POST['action'] : $do = null;
		if (!isset($do)) {
			$do = isset($_REQUEST['do']) ? $do = $_REQUEST['do'] : $do = null;
		}
		switch ($do) {
			case CREAR:
				$imagen = $_FILES['ruta_imagen'];
				$ruta = "img/".$imagen['name'];
				$nom = $_POST['txt_nombre'];
				$stock = $_POST['txt_stock'];
				$desc = $_POST['txt_descripcion'];
				$producto = new Producto($nom, $stock, $desc, $ruta);
				$productoDao->sqlInsert($producto);
				header('Location: index.php?op=8');
			break;
			case ELIMINAR:
				$id = $_REQUEST['id'];
				$productoDao->sqlDelete($id);
				header('Location: index.php?op=8');
			break;
			case MODIFICAR:
				$imagen = $_FILES['ruta_imagen'];
				$ruta = "img/".$imagen['name'];
				$id = $_POST['id'];
				$nom = $_POST['txt_nombre'];
				$stock = $_POST['txt_stock'];
				$desc = $_POST['txt_descripcion'];
				$producto = new Producto($nom, $stock, $desc, $ruta);
				$productoDao->sqlUpdate($producto, $id);
				header('Location: index.php?op=8');
			break;
			default:
				print_r("");
				break;
		}
		$contenido = $mantenedor_producto->getHtml();
		break;
	case CATALOGO:
		$sesion->setJs("js/jsCatalogo.js");
		$contenido = $catalogo->getHtml();
		break;
	case LOGOUT:
		session_unset(); 
		session_destroy();
		header("Refresh:0; index.php");
		// $contenido = '<div><p>GRACIAS POR VISITARNOS</p></div>';
		break;
	default:
		$contenido = $slider->getHtml();
		break;
}

//HEADER FOOTER
$head = $header->getHtml();
$foot = $footer->getHtml();

$html =<<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />-->
<link rel="stylesheet" type="text/css" href="css/hojaDeEstilo.css" />
<link rel="stylesheet" type="text/css" href="css/newone.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escalada</title>
</head>
	<body class="fondo">
		<div class="wrap">
			$head
			$mostrarSesion
			$contenido
		</div>	
		$foot
	</body>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"> </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="js/jsLogin.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="js/jsCatalogo.js"></script>-->
<script language="JavaScript" type="text/javascript" src="js/jsMantenedor_producto.js"></script>
<script language="JavaScript" type="text/javascript" src="js/slider.js"></script>
<!--<script type="text/javascript" src="js/function.js"> </script>-->
</html>
HTML;

//PRINT HTML
$sesion->printHtml($html);
// print_r($html);
?>
<!-- <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="/css/hojaDeEstilo.css" /> -->
<!-- //JAVASCRIPT -->
