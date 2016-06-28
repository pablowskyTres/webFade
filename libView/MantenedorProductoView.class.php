<?php 
require_once dirname(__FILE__).('/../libDao/ProductoDao.class.php');

class MantenedorProducto{

    private $productoDao;

    /**
     * Class Constructor
     * @param    $productoDao   
     */
    public function __construct()
    {
        $this->productoDao = new ProductoDao();
    }

    function cargarTablaProducto(){
        $arr = $this->productoDao->sqlSelectAll();
        $fila = "";
        foreach ($arr as $elem) {
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
                    '<tr>
                        <td>'.$nom.'</td>
                        <td>'.$stock.'</td>
                        <td>'.$desc.'</td>
                        <td> <img src="'.$ruta_imagen.'" width="90" /></td>
                        <td><a href="index.php?op=8&do=D&id='.$id.'" class="btn btn-primary">Eliminar<a/>
                            <a href="#" onclick="modificarProducto('.$paramId.','.$paramNom.','.$paramStock.','.$paramDesc.')" class="btn">Modificar<a/></td>
                    <tr>';
        }
        return $fila;
    }

    function tablaProducto($fila){
        $html=<<<HTML
        <div class="distanciaTop">
            <table cellpadding="10" class="contenedorFormulario" align="center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    $fila
                </tbody>
            </table>
        </div>
HTML;
        return $html;
    }

	public function getHtml(){
        $tabla = $this->tablaProducto($this->cargarTablaProducto());
		$html=<<<HTML
<div class="distanciaTop">
	<p>Mantenedor Producto</p>
    <form action="index.php?op=8" id="mant_producto" method="POST" enctype="multipart/form-data">
        <table cellpadding="10" class="contenedorFormulario" style="margin: 0 auto">
            <tr>
                <input type="hidden" id="id" name="id" value=""/>
                <td>Nombre</td><td><input class="textBox" type="text" placeholder="Nombre producto" id="txt_nombre" name="txt_nombre" required/></td>
            </tr>
            <tr>
                <td>Stock</td><td><input class="textBox" type="number" placeholder="Stock producto" id="txt_stock" name="txt_stock" required/></td>
            </tr>
            <tr>
                <td>Descripción</td><td><input class="textBox" type="text" placeholder="Descripción producto" id="txt_descripcion" name="txt_descripcion" required/></td>
            </tr>
            <tr>
                <td>Imagen</td><td><input type="file" id="ruta_imagen" name="ruta_imagen" required/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnGuardar" name="action" class="btn" value="GUARDAR"/></td><td><input type="reset" class="btn" id="btnVolver" onclick="devolverBotones()" value="VOLVER"/></td><td><input type="submit" id="btnModificar" class="btn" name="action" value="MODIFICAR"/></td>
            </tr>
        </table>
    </form>
    $tabla
</div>
HTML;
		return $html;
	}
}
?>
