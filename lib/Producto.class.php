<?php
require_once('Conexion.class.php');
class Producto{
	
	private $id_producto;
	private $nombre;
	private $stock;
    private $descripcion;
	private $imagen;


	/**
	 * Class Constructor 
	 * @param    $nombre   
	 * @param    $stock   
	 * @param    $descripcion   
	 */
    function Producto($nombre="", $stock="", $descripcion="", $imagen)
	{
		$this->setNombre($nombre);
		$this->setStock($stock);
        $this->setDescripcion($descripcion);
		$this->setImagen($imagen);
	}
	
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
    private function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
}

?>