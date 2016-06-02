<?php
require_once '/../lib/Conexion.class.php';
require_once '/../lib/Cuenta.class.php';

class CuentaDao{
	
	private $conexion;
	/**
	 * Class Constructor
	 * @param   $conexion
	 */
	function CuentaDao() {
        $conexion = null;
    }
	/**
	* @param Cuenta $cuenta
	*/
	public function sqlInsert($cuenta){
		$conexion = new Conexion();
		$tabla = 'cuenta';
		$user 	= $cuenta->getUsername();
		$pass 	= $cuenta->getPassword();
		$email 	= $cuenta->getEmail();
		$persona_id = $cuenta->getPersonaId();
		$consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (username, password, email, persona_id) VALUES(:user, :pass, :email, :persona_id)');
        $consulta->bindParam(':user', $user);
        $consulta->bindParam(':pass', $pass);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':persona_id', $persona_id);
        $consulta->execute();
	}

	public function login($username, $password) {
        $conexion = new Conexion();
        $tabla = 'cuenta';
        $consulta = $conexion->prepare('SELECT persona_id FROM '.$tabla.' WHERE username = "'.$username.'" AND password = "'.$password.'"');
        $consulta->execute();
        $id = null;
        $arr =  $consulta->fetchAll();
        foreach ($arr as $cuenta) {
            $id = $cuenta['persona_id'];
        }
        return $id;
    }
}
?>