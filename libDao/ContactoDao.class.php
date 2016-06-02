<?php

require_once('lib/Contacto.class.php');
require_once('lib/Conexion.class.php');

class ContactoDao {

    private $conexion;

    function ContactoDao() {
        $conexion = null;
    }

    public function sqlInsert($contacto) {
        $conexion = new Conexion();
        $tabla = 'contacto';
        $nombre = $contacto->getNombre();
        $email = $contacto->getEmail();
        $mensaje = $contacto->getMensaje();
        $consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (nombre, email, mensaje) VALUES(:nombre, :email, :mensaje)');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':mensaje', $mensaje);
        $consulta->execute();
    }

    // public function chequearUsuarioExiste($id_producto) {
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

    // public static function sqlUpdate($contacto, $id) {
    //     $conexion = new Conexion();
    //     $tabla = 'contacto';
    //     $nombre = $contacto->getNombre();
    //     $email = $contacto->getEmail();
    //     $mensaje = $contacto->getMensaje();
    //     $consulta = $conexion->prepare('UPDATE ' .$tabla. ' SET nombre = :nombre, email = :email, mensaje = :mensaje WHERE id =  :id');
    //     $consulta->bindParam(':nombre', $nombre);
    //     $consulta->bindParam(':email', $stock);
    //     $consulta->bindParam(':mensaje', $descripcion);
    //     $consulta->bindParam(':id', $id);
    //     $consulta->execute();
    // }

    public function sqlSelectAll() {
        $conexion = new Conexion();
        $tabla = 'contacto';
        $consulta = $conexion->prepare('SELECT * FROM '.$tabla.' ORDER BY id DESC');
        $consulta->execute();
        $arr =  $consulta->fetchAll();
        return $arr;
    }

    // public function sqlSelect($nombre) {
    //     $conexion = new Conexion();
    //     $tabla = 'Producto';
    //     $consulta = $conexion->prepare('SELECT id FROM '.$tabla.' WHERE activo = 1 AND nombre = '.$nombre.'');
    //     $consulta->execute();
    //     print_r($consulta);
    //     $id = "";
    //     $arr =  $consulta->fetchAll();
    //     foreach ($arr as $pro) {
    //         $id = $pro['id'];
    //     }
    //     return $id;
    // }
    
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
        $tabla = 'contacto';
        $consulta = $conexion->prepare('DELETE FROM '.$tabla.' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
    }
}

?>