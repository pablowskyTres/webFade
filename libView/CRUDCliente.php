<?php include('header.php') ?>
<div class="distanciaTop">
    <p>Mantenedor Cliente</p>
    <form action="" method="POST" name="mantenedor" >
        <table method="POST" id="CrudCliente" cellpadding="10" class="contenedorFormulario" style="margin: 0 auto" width="auto" border="0">             <tr>
                <td><label for="e-mail">Correo</label></td>
                <td><input class="textBox" type="text" name="e-mail" id="e-mail"/></td>
                <td><a onclick="btnCancelar()" id="cancelar" class="btn" >Cancelar </a></td>
                <td><a onclick="btnSearch()" id="search" class="btn">Buscar  </a></td>
            </tr>
            <tr>
                <td><label for="txt_nombre">Nombre</label></td>
                <td><input class="textBox" type="text" name="txt_nombre" id="txt_nombre"/></td>
            </tr>
            <tr>
                <td><label for="txt_ApPaterno">Apellido paterno</label></td>
                <td><input class="textBox" type="text" name="txt_ApPaterno" id="txt_ApPaterno"/></td>
            </tr>
            <tr>
                <td><label for="txt_ApMaterno">Apellido materno</label></td>
                <td><input class="textBox" type="text" name="txt_ApMaterno" id="txt_ApMaterno"</td>
            </tr>
            <tr>
                <td><label for="Sexo">Sexo</label></td>
                <td>
                    Masculino<input name="Sexo" id="Sexo" type="radio" value="0" checked=""/>
                    Femenino <input name="Sexo" id="Sexo" type="radio" value="1" />
                </td>
            </tr>
            <tr>
                <td><label for="txt_direccion">Direccion</label></td>
                <td><input class="textBox" type="text" name="txt_direccion" id="txt_direccion"</td>
            </tr>
            <tr>
                <td><label hidden="" for="Password">Password</label></td>
                <td><input hidden="" class="textBox" type="password" id="password" required="required" name="password" placeholder="Caracteres 6-12" pattern="{6,12}"   maxlength="12" min="2"/></td>
            </tr>
            <td colspan="10">
                <a onclick="btnDelete()" id="delete" class="btn">Eliminar </a>
                <a onclick="btnUpdate()" id="update" class="btn">Actualizar </a>
                <a onclick="" id="create" class="btn">Crear </a>
                <a onclick="" id="toList" class="btn">Listar </a>
            </td>
        </table>
    </form>
</div>
<?php include('footer.php') ?>