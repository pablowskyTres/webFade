<?php 
require_once dirname(__FILE__).('/../libDao/ContactoDao.class.php');

class ContactoView{

    private $contactoDao;

    /**
     * Class Constructor
     * @param    $productoDao   
     */
    public function __construct()
    {
        $this->contactoDao = new ContactoDao();
    }

    public function listaContacto(){
        $arr = $this->contactoDao->sqlSelectAll();
        $fila = "";
        foreach ($arr as $elem) {
            $id = $elem['id'];
            $nom = $elem['nombre'];
            $email = $elem['email'];
            $mensaje = $elem['mensaje'];
            $paramId = $id;
            $paramNom = "'".$nom."'";
            $paramEmail = "'".$email."'";
            $paramMsg = "'".$mensaje."'";
            $fila .=  
                    '<tr>
                        <td>'.$nom.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mensaje.'</td>
                        <td><a href="index.php?op=6&do=D&id='.$id.'" class="btn btn-primary">Eliminar<a/></td>
                    <tr>';
        }
        //<input type="submit" class="btn btn-primary" name="action" value="Modificar"/>
        $html=<<<HTML
        <div class="distanciaTop">
            <table cellpadding="10" class="contenedorFormulario" align="center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
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
		$html=<<<HTML
<div class="padBot distanciaTop">
<p>Contacto</p>
<form action="index.php?op=6" method="POST" name="contacto">
<table cellpadding="10" class="contenedorFormulario" align="center">
	<tr>
    	<td><label for="edit-name">Nombre<span class="form-required" title="Este campo es obligatorio.">*</span></label></td>
        <td><input class="textBox" placeholder="Ingrese su nombre" type="text" id="edit-name" name="txt_nombre" value="" size="60" maxlength="60" 	required="required"></td>
    </tr>
    <tr>
    	<td><label for="edit-correo">Correo <span class="form-required" title="Este campo es obligatorio.">*</span></label></td>
        <td><input class="textBox" placeholder="Ingrese su correo" type="text" id="edit-correo" name="txt_email" size="60" maxlength="128" required	="required"></td>
    </tr>
	<tr>
    	<td><label for="edit-mensaje">Mensaje <span class="form-required" title="Este campo es obligatorio.">*</span></label></td>
        <td><textarea class="textArea" placeholder="Ingrese el mansaje(1500 caracteres)" id="edit-mensaje" name="txt_mensaje" maxlength="500" required="required"></textarea></td>
    </tr>
	<tr>
    	<td><input type="submit" id="edit-submit" name="action" value="Enviar" class="btn"></td>
        <td><a href="user/password">¿Olvido su contraseña?</a></td>
    </tr>
</table>
</form>
</div>
HTML;
		return $html;
	}
}
?>