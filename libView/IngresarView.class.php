<?php 
class Ingresar{

	public function getHtml(){
		$html=<<<HTML
<div class="distanciaTop col-xs-offset-3 col-xs-10">
<form action="index.php?op=3" method="POST" name="login" id="login" class="centrar">
<p>Iniciar sesión</p>
<table cellpadding="10" class="contenedorFormulario" style="margin: 0 auto">
    <tr>
        <td><h1>LOGIN</h1></td>
    </tr>
	<tr>
        <td><input class="form-control" placeholder="Correo" type="text" id="txt_username" name="txt_username" value="" size="60" maxlength="60" required="required"></td>
    </tr>
    <tr>
        <td><input class="form-control" placeholder="Contraseña" type="password" id="txt_password" name="txt_password" size="60" maxlength="128" required="required" /></td>
    </tr>
    <tr>
    	<td><input type="submit" id="LOGIN" name="action" value="LOGIN" class="btn form-control"></div>  </td>
    </tr>
    <tr>
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
