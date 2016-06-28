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

    public function selectCategoria(){
        $html=<<<HTML
            <div>
                <select id="selectCategoria" name="selectCategoria" class="form-control">
                    <option>Categorias</option>
                </select>
            </div>
HTML;
        return $html;
    }

    public function getHtml(){
        $selectCategoria = $this->selectCategoria();
    	$tabla = $this->getCatalogo($this->getTablaProductosCatalogo());
    	$html=<<<HTML
    		<div class="distanciaTop panel">
    			<h1>Catalogo</h1>
                <div class="row">
                    <!--<div class="col-xs-4">
                        $selectCategoria
                    </div>-->
                    <div class="col-xs-12 panel">
                        $tabla
                    </div>
                </div>
    		</div>
HTML;
		return $html;
    }

    function getCatalogo($datos){
        $html=<<<HTML
        <div class="distanciaTop">
            $datos
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

    function getTablaProductosCatalogo(){
        $arr = $this->productoDao->sqlSelectAll();
        $fila = "";
        $i = 1;
        foreach ($arr as $elem) {
            if ($i == 6) {
                $i = 1;
            }
            $id = $elem['id'];
            $nom = $elem['nombre'];
            $stock = $elem['stock'];
            $desc = $elem['descripcion'];
            $ruta_imagen = $elem['ruta_imagen'];
            $paramId = $id;
            $paramNom = "'".$nom."'";
            $paramStock = $stock;
            $paramDesc = "'".$desc."'";
            $fila .=  
                    '<div class="col-xs-2 mostrador">
                        <a href="index.php?op=cat"><img src="'.$ruta_imagen.'" /></a>
                        <label>'.$nom.' '.$desc.'</label>
                        <div> Stock '.$stock.'</div>
                    </div>';
            $i++;
        }
        $html=<<<HTML
            $fila
HTML;
        return $fila;
    }
}
?>