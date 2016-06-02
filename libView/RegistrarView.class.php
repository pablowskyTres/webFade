<?php 
class Registrar{

	public function getHtml(){
		$html=<<<HTML
		<div class="distanciaTop" id="CrudCliente">
    <p>Registro</p>
    <form class="centrar" action="index.php?op=2" method="POST" name="ingreso" >
        <table cellpadding="10" class="contenedorFormulario" style="margin: 0 auto" border="0">
            <tr>
                <td>Nombre</td>
                <td><input class="textBox" type="text" name="txt_nombre" id="txt_nombre" required="required" placeholder="Nombre" pattern="{2,}" maxlength="12" /></td>
            </tr>
            <tr>
                <td>Apellido paterno</td>
                <td><input class="textBox" type="text" id="txt_ApPaterno" name="txt_ap_paterno" required="required"  placeholder="Apellido paterno" pattern="{2,}"  maxlength="12"/></td>
            </tr>
            <tr>
                <td>Apellido materno</td>
                <td><input class="textBox" type="text" id="txt_ApMaterno" name="txt_ap_materno" required="required" placeholder="Apellido Materno" maxlength="12" pattern="{2,}"/></td>  </tr>
            <tr>
                <td>Sexo</td>
                <td>Masculino<input id="genero" name="genero" type="radio" value="0" checked="checked"/>
                    Femenino<input id="genero" name="genero" type="radio" value="1" />
                </td>
            </tr>
            <tr>
                <td>Dirreccion</td>
                <td><input class="textBox" type="text" id="txt_direccion" name="txt_direccion" required="required"  placeholder="Ingrese su Direccion" pattern="[a-z ]{3,}+[0-9]\d{3,}$"/></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><input class="textBox" type="email" id="email" name="email" placeholder="Ejemplo : ejemplo@gmail.com"   maxlength="50"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="textBox" type="password" id="password" required="required" name="password" placeholder="Caracteres 6-12" pattern="{6,12}"   maxlength="12" min="2"/></td>
            </tr>
            <tr>
                <td><input type="submit" name="action" class="btn" value="GUARDAR"/></td>
                <td><input type="reset" name="btn_limpiar" class="btn" value="VOLVER"/></td>
            </tr>
        </table>
    </form>
</div>
HTML;
	return $html;
	}
}
 ?>
