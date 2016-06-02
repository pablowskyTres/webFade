<?php 
require_once dirname(__FILE__).('/../libDao/PersonaDao.class.php');

$personaDao = new PersonaDao();

$retorno = null;

switch ($_POST['cmd']) {
	case 'LOGIN':
		$nombre = $personaDao->getNombrePersona($_POST['id']);
		$retorno = $nombre;
		break;
	default:
		$retorno = "RETORNO DEFAULT";
		break;
}

echo $retorno;

?>