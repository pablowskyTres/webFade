<?php 
class Ingresar{

	public function getHtml(){
		$html=<<<HTML
<div class="distanciaTop">
<form action="index.php?op=3" method="POST" name="login" id="login">
<p>Iniciar sesión</p>
<table cellpadding="10" class="contenedorFormulario" style="margin: 0 auto">
	<tr>
    	<td><label for="edit-name">Usuario<span class="form-required" title="Este campo es obligatorio."></span></label></td>
        <td><input class="textBox" placeholder="Ingrese su correo" type="text" id="txt_username" name="txt_username" value="" size="60" maxlength="60" required="required"></td>
    </tr>
    <tr>
    	<td><label for="edit-name">Contraseña<span class="form-required" title="Este campo es obligatorio."></span></label></td>
        <td><input class="textBox" placeholder="Ingrese su contraseña" type="password" id="txt_password" name="txt_password" size="60" maxlength="128" required="required" /></td>
    </tr>
    <tr>
    	<td><input type="submit" id="LOGIN" name="action" value="LOGIN" class="btn"></div>  </td>
        <td><a href="user/password">¿Olvido su contraseña?</a></div></td>
    </tr>
</table>
</form>
</div>
HTML;
		return $html;
	}

    public function getMensaje($num){
        switch ($num) {
            case 'errLogin':
                $texto = "Usuario o contraseña incorrectos";
                $estilo = "danger";
                break;
            
            default:
                $texto = "Error 404: Not found";
                $estilo = "";
                break;
        }
        $mensaje=<<<HTML

        <div id="mensaje" class="$estilo" style="display: none">
            <p>$texto</p>
        </div>

HTML;
        return $mensaje;
    }
}
?>
