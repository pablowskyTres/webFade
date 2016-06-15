<?php 
require_once dirname(__FILE__).('/../libDao/ProductoDao.class.php');

class CatalogoView{

	 private $productoDao;

    /**
     * Class Constructor
     * @param    $productoDao   
     */
    public function __construct()
    {
        $this->productoDao = new ProductoDao();
    }

    public function getHtml(){
    	$tabla = $this->tablaProducto($this->getTablaProductos());
    	$html=<<<HTML
    		<div class="distanciaTop">
    			<h1>Catalogo</h1>
    			$tabla
    		</div>
HTML;
		return $html;
    }

    function tablaProducto($datos){
    	$html=<<<HTML
        <div class="distanciaTop">
            <table cellpadding="10" class="contenedorFormulario" align="center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    $datos
                </tbody>
            </table>
        </div>
HTML;
        return $html;
    }

    function getTablaProductos(){
    	$arr = $this->productoDao->sqlSelectAll();
        $fila = "";
        foreach ($arr as $elem) {
            $id = $elem['id'];
            $nom = $elem['nombre'];
            $stock = $elem['stock'];
            $desc = $elem['descripcion'];
            $paramId = $id;
            $paramNom = "'".$nom."'";
            $paramStock = $stock;
            $paramDesc = "'".$desc."'";
            $fila .=  
                    '<tr>
                        <td>'.$nom.'</td>
                        <td>'.$stock.'</td>
                        <td>'.$desc.'</td>
                    <tr>';
        }
        $html=<<<HTML
            $fila
HTML;
        return $fila;
    }
}
?>