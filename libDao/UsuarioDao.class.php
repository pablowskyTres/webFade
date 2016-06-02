<?php  
require_once('lib/Usuario.class.php');
require_once('lib/Conexion.class.php');

class UsuarioDao{

	private $conexion;

    function UsuarioDao() {
        $conexion = null;
    }

    /*
	* @param Usuario $usuario
    */
    public static function sqlInsert($usuario) {
        $conexion = new Conexion();
        $tabla = 'usuario';
        $persona_id = $usuario->getPersonaId();
        $consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (persona_id) VALUES(:persona_id)');
        $consulta->bindParam(':persona_id', $persona_id);
        $consulta->execute();
    }
}
?>