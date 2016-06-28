<?php

require_once('lib/Producto.class.php');
require_once('lib/Conexion.class.php');

class ProductoDao {

    private $conexion;

    function ProductoDao() {
        $conexion = null;
    }

    public static function sqlInsert($producto) {
        $conexion = new Conexion();
        $tabla = 'producto';
        $nombre = $producto->getNombre();
        $stock = $producto->getStock();
        $descripcion = $producto->getDescripcion();
        $imagen = $producto->getImagen();
        $consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (nombre, stock, descripcion, ruta_imagen, activo) VALUES(:nombre, :stock, :descripcion, :imagen, 1)');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':stock', $stock);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':imagen', $imagen);
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

    public function sqlUpdate($producto, $id) {
        $conexion = new Conexion();
        $tabla = 'producto';
        $nombre = $producto->getNombre();
        $stock = $producto->getStock();
        $descripcion = $producto->getDescripcion();
        $imagen = $producto->getImagen();
        $consulta = $conexion->prepare('UPDATE ' .$tabla. ' SET nombre = :nombre, stock = :stock, descripcion = :descripcion, ruta_imagen = :imagen WHERE id =  :id');
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':stock', $stock);
        $consulta->bindParam(':descripcion', $descripcion);
        $consulta->bindParam(':imagen', $imagen);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
    }

    public function sqlSelectAll() {
        $conexion = new Conexion();
        $tabla = 'producto';
        $consulta = $conexion->prepare('SELECT * FROM '.$tabla.' WHERE activo = 1 ORDER BY id DESC');
        $consulta->execute();
        $arr =  $consulta->fetchAll();
        return $arr;
    }

    public function sqlSelect($nombre) {
        $conexion = new Conexion();
        $tabla = 'producto';
        $consulta = $conexion->prepare('SELECT id FROM '.$tabla.' WHERE activo = 1 AND nombre = '.$nombre.'');
        $consulta->execute();
        print_r($consulta);
        $id = "";
        $arr =  $consulta->fetchAll();
        foreach ($arr as $pro) {
            $id = $pro['id'];
        }
        return $id;
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
        $tabla = 'producto';
        $consulta = $conexion->prepare('UPDATE '.$tabla.' SET activo = 0 WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
    }
}

?>