<?php

//require_once('../entity/Producto.php');
//require_once('../entity/Conexion.class.php');
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$user = "root";
$pass = "";
$servidor = "localhost:3306";
$db = "prueba";
$conexion = mysql_connect($servidor, $user, $pass) or die("Sin connec");
mysql_select_db($db);

if (@ $_GET['cmd'] == 'Search_Cliente') {
    $q = "SELECT * FROM `cliente` WHERE correo='" . $_POST["correo"] . "'";
    $r = mysql_query($q);
    $i = 0;
    while ($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
        $nombre = $row['nombre'];
        $ApellidoPaterno = $row['ApellidoPaterno'];
        $ApellidoMaterno = $row['ApellidoMaterno'];
        $Sexo = $row["Sexo"];
        $Direccion = $row['Direccion'];
        echo json_encode(array("nombre" => "$nombre",
            "ApellidoPaterno" => "$ApellidoPaterno",
            "ApellidoMaterno" => "$ApellidoMaterno",
            "Sexo" => "$Sexo",
            "Direccion" => "$Direccion"));
    }
}

if (@ $_POST['cmd'] == 'Update_Cliente') {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $ApellidoPaterno = $_POST["ApellidoPaterno"];
    $ApellidoMaterno = $_POST["ApellidoMaterno"];
    $Sexo = $_POST["Sexo"];
    $Direccion = $_POST["Direccion"];
    $q = "UPDATE `cliente` SET 	`nombre`='" . $nombre . "',`ApellidoPaterno`='" . $ApellidoPaterno. "',`ApellidoPaterno`='" . $ApellidoMaterno. "',`Sexo`='" . $Sexo. "',`Direccion`='" . $Direccion . "' WHERE `correo`='" . $correo. "'";
    $r = mysql_query($q);
    echo 'OK';
}

if (@ $_POST['cmd'] == 'Delete_Cliente') {
    $correo = $_POST["correo"];
    $q = "delete from `cliente`  WHERE `correo`='" . $correo. "'";
    $r = mysql_query($q);
    echo 'OK';
}

//    public static function sqlInsert($producto) {
//        $conexion = new Conexion();
//        $tabla = 'Producto';
//        $nombre = $producto->getNombre();
//        $stock = $producto->getStock();
//        $descripcion = $producto->getDescripcion();
//        $consulta = $conexion->prepare('INSERT INTO ' . $tabla . ' (nombre, stock, descripcion) VALUES(:nombre, :stock, :descripcion)');
//        $consulta->bindParam(':nombre', $nombre);
//        $consulta->bindParam(':stock', $stock);
//        $consulta->bindParam(':descripcion', $descripcion);
//        $consulta->execute();
//    }
// public function listar() {
// 	$conexion = new Conexion();
// 	$consulta = $conexion->prepare('SELECT * FROM '. self::TABLA . ' WHERE is_activo = 1');
// 	$consulta->execute();
// 	$resultados =  $consulta->fetchAll();
// 	foreach ($resultados as $resultado) {
// 		echo $resultado["nombreUsuario"] . " - " . $resultado["correo"]. "</br>";
// 	}
// }
// public function chequearUsuarioExiste($nombreUsuario) {
// 	$conexion = new Conexion();
// 	$consulta = $conexion->prepare('SELECT * FROM '. self::TABLA.' WHERE nombreUsuario = :nombreUsuario');
// 	$consulta->bindParam(':nombreUsuario', $nombreUsuario);
// 	$consulta->execute();
// 	$resultados = $consulta->fetchAll();
// 	$i = 0;
// 	foreach($resultados as $resultado) {
// 		$i++;
// 		break;
// 	}
// 	if($i == 0) {
// 		return false;
// 	}
// 	else {
// 		return true;
// 	}
// }
// public function buscarUsuario($id_usuario) {
// 	$conexion = new Conexion();
// 	$consulta = $conexion->prepare('SELECT * FROM '. self::TABLA.' WHERE id_usu = :idUsuario');
// 	$queryIdUsu = $this->getIdUsu();
// 	$consulta->bindParam(':idUsuario', $queryIdUsu);
// 	$consulta->execute();
// 	$resultados = $consulta->fetchAll();
// 	$i = 0;
// 	try{
// 		foreach($resultados as $resultado) {
// 			$i++;
// 			$usuarin = new Usuario();
// 			echo "USUARIO ENCONTRADO! </br>";
// 			$usuarin = new Usuario();
// 			$usuarin->_setIdUsu($resultado["id_usu"]);
// 			$usuarin->_setNombreUsuario($resultado["nombreUsuario"]);
// 			$usuarin->_setNombreCompleto($resultado["nombreCompleto"]);
// 			$usuarin->_setCorreo($resultado["correo"]);
// 			$usuarin->_setContrasenia($resultado["contrasenia"]);
// 			//$usuarin->_setFechaNacimiento($resultado["fechaNacimiento"]);
// 			$usuarin->_setSexo($resultado["sexo"]);
// 			$usuarin->_setPais($resultado["pais"]);
// 			return $usuarin;
// 		}
// 		if($i == 0) {
// 			echo "No se ha encontrado el usuario";
// 			$usuarin = new Usuario();
// 			$usuarin->_setIdUsu(null);
// 		}
// 	}
// 	catch(Exception $e) {
// 		echo "No se encontró usuario";
// 	}
// }
// public function eliminarUsuario($id_usuario) {
// 	$conexion = new Conexion();
// 	$consulta = $conexion->prepare('UPDATE '.self::TABLA. ' SET is_activo = 0 WHERE id_usu = :idUsuario');
// 	$consulta->bindParam(':idUsuario', $id_usuario);
// 	$consulta->execute();
// 	echo "Elimina2";
// }
//}
?>