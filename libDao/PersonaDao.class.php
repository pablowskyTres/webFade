<?php 
require_once('lib/Persona.class.php');
require_once('lib/Conexion.class.php');

class PersonaDao{
	private $conexion;

    function PersonaDao() {
        $conexion = null;
    }

    /*
	* @param Persona $persona
    */
    public static function sqlInsert($persona) {
        $conexion = new Conexion();
        $tabla = 'persona';
        $nombre = $persona->getNombre();
        $ap_paterno = $persona->getApPaterno();
        $ap_materno = $persona->getApMaterno();
        $genero = $persona->getGenero();
        $direccion = $persona->getDireccion();
        $email = $persona->getEmail();
        $consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (nombre, apellido_paterno, apellido_materno, genero, direccion, email) VALUES(:nombre, :apellido_paterno, :apellido_materno, :genero, :direccion, :email)');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellido_paterno', $ap_paterno);
        $consulta->bindParam(':apellido_materno', $ap_materno);
        $consulta->bindParam(':genero', $genero);
        $consulta->bindParam(':direccion', $direccion);
        $consulta->bindParam(':email', $email);
        $consulta->execute();
    }

    public function sqlSelect($email) {
        $conexion = new Conexion();
        $tabla = 'persona';
        $consulta = $conexion->prepare('SELECT id FROM '.$tabla.' WHERE email = "'.$email.'"');
        $consulta->execute();
        $id = "";
        $arr =  $consulta->fetchAll();
        foreach ($arr as $pro) {
            $id = $pro['id'];
        }
        return $id;
    }

    public function getNombrePersona($id) {
        $conexion = new Conexion();
        $tabla = 'persona';
        $consulta = $conexion->prepare('SELECT nombre FROM '.$tabla.' WHERE id = "'.$id.'"');
        $consulta->execute();
        $id = "";
        $arr =  $consulta->fetchAll();
        foreach ($arr as $per) {
            $nombre = $per['nombre'];
        }
        return $nombre;
    }

    // public function chequearUsuarioExiste($id_persona) {
    //     $conexion = new Conexion();
    //     $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA.' WHERE nombreUsuario = :nombreUsuario');
    //     $consulta->bindParam(':nombreUsuario', $nombreUsuario);
    //     $consulta->execute();
    //     $resultados = $consulta->fetchAll();
    //     $i = 0;
    //     foreach($resultados as $resultado) {
    //         $i++;
    //         break;
    //     }
    //     if($i == 0) {
    //         return false;
    //     }
    //     else {
    //         return true;
    //     }
    // }

    public function sqlUpdate($persona, $id) {
        $conexion = new Conexion();
        $tabla = 'persona';
        $nombre = $persona->getNombre();
        $stock = $persona->getStock();
        $genero = $persona->getgenero();
        $consulta = $conexion->prepare('UPDATE ' .$tabla. ' SET nombre = :nombre, stock = :stock, genero = :genero WHERE id =  :id');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':stock', $stock);
        $consulta->bindParam(':genero', $genero);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
    }

    public function sqlSelectAll() {
        $conexion = new Conexion();
        $tabla = 'persona';
        $consulta = $conexion->prepare('SELECT * FROM '.$tabla.' WHERE activo = 1 ORDER BY id DESC');
        $consulta->execute();
        $arr =  $consulta->fetchAll();
        return $arr;
    }
    
    // public function buscarUsuario($id_usuario) {
    //  $conexion = new Conexion();
    //  $consulta = $conexion->prepare('SELECT * FROM '. self::TABLA.' WHERE id_usu = :idUsuario');
    //  $queryIdUsu = $this->getIdUsu();
    //  $consulta->bindParam(':idUsuario', $queryIdUsu);
    //  $consulta->execute();
    //  $resultados = $consulta->fetchAll();
    //  $i = 0;
    //  try{
    //      foreach($resultados as $resultado) {
    //          $i++;
    //          $usuarin = new Usuario();
    //          echo "USUARIO ENCONTRADO! </br>";
    //          $usuarin = new Usuario();
    //          $usuarin->_setIdUsu($resultado["id_usu"]);
    //          $usuarin->_setNombreUsuario($resultado["nombreUsuario"]);
    //          $usuarin->_setNombreCompleto($resultado["nombreCompleto"]);
    //          $usuarin->_setCorreo($resultado["correo"]);
    //          $usuarin->_setContrasenia($resultado["contrasenia"]);
    //          //$usuarin->_setFechaNacimiento($resultado["fechaNacimiento"]);
    //          $usuarin->_setSexo($resultado["sexo"]);
    //          $usuarin->_setPais($resultado["pais"]);
    //          return $usuarin;
    //      }
    //      if($i == 0) {
    //          echo "No se ha encontrado el usuario";
    //          $usuarin = new Usuario();
    //          $usuarin->_setIdUsu(null);
    //      }
    //  }
    //  catch(Exception $e) {
    //      echo "No se encontró usuario";
    //  }
    // }
    public function sqlDelete($id) {
        $conexion = new Conexion();
        $tabla = 'persona';
        $consulta = $conexion->prepare('UPDATE '.$tabla.' SET activo = 0 WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
    }
}
?>