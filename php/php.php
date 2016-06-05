<?php 
require_once dirname(__FILE__).('/../libDao/PersonaDao.class.php');
require_once dirname(__FILE__).('/../libDao/CuentaDao.class.php');

$personaDao = new PersonaDao();
$cuentaDao = new CuentaDao();

$retorno = null;

switch ($_POST['cmd']) {
	case 'verificarLogin':
		$persona_id = $cuentaDao->login($_POST['user'], $_POST['pass']);
		if ($persona_id > 0) {
			$retorno = 1;
		}else{
			$retorno = 0;
		}
		break;

	default:
		$retorno = "RETORNO DEFAULT";
		break;
}

echo $retorno;

?>