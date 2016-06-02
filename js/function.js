$(document).ready(function () {
    document.getElementById('delete').hidden = true;
    document.getElementById('update').hidden = true;
    document.getElementById('cancelar').hidden = true;
});

function btnCancelar() {
    $("#e-mail").val("");
    $("#txt_nombre").val("");
    $("#txt_ApPaterno").val("");
    $("#txt_ApMaterno").val("");
    $("#txt_direccion").val("");
    document.mantenedor.Sexo[0].checked = true;
    document.getElementById('cancelar').hidden = true;
    document.getElementById('delete').hidden = true;
    document.getElementById('update').hidden = true;
    document.getElementById('create').hidden = false;
    document.getElementById('search').hidden = false;
    document.getElementById('e-mail').disabled = false;
}

function btnSearch() {
    $.post("../dao/ClienteDAO.php?cmd=Search_Cliente", {"correo": $("#e-mail").val()}, function (data) {
        $("#txt_nombre").val(data.nombre);
        $("#txt_ApPaterno").val(data.ApellidoPaterno);
        $("#txt_ApMaterno").val(data.ApellidoMaterno);
        $("#txt_direccion").val(data.Direccion);

        if (data.Sexo == 'hombre') {
            document.mantenedor.Sexo[0].checked = true;
        } else {
            document.mantenedor.Sexo[1].checked = true;
        }
        document.getElementById('cancelar').hidden = false;
        document.getElementById('delete').hidden = false;
        document.getElementById('update').hidden = false;
        document.getElementById('create').hidden = true;
        document.getElementById('search').hidden = true;
        document.getElementById('e-mail').disabled = true;
    }, "json");
}

function btnUpdate() {
    var sexo;
    if (document.mantenedor.Sexo[0].checked) {
        sexo = 'hombre';
    } else {
        sexo = 'mujer';
    }
    var e = {
        cmd: "Update_Cliente",
        correo: $("#e-mail").val(),
        nombre: $("#txt_nombre").val(),
        ApellidoPaterno: $("#txt_ApPaterno").val(),
        ApellidoMaterno: $("#txt_ApMaterno").val(),
        Sexo: sexo,
        Direccion: $("#txt_direccion").val()
    };
    $.ajax(
            {
                type: "POST",
                url: "../dao/ClienteDAO.php",
                data: e,
                cache: false,
                success: function (o) {
                    switch (o) {
                        default:
                            var err = "error";
                            var q = o;
                            alert(err, q);
                            break;
                        case "OK":
                            btnSearch();
                            alert("Ha actualizado el registro ");
                            break;
                    }
                }
            }
    );

}

function btnDelete() {
    var e = {
        cmd: "Delete_Cliente",
        correo: $("#e-mail").val()
    };
    $.ajax(
            {
                type: "POST",
                url: "../dao/ClienteDAO.php",
                data: e,
                cache: false,
                success: function (o) {
                    switch (o) {
                        default:
                            var err = "error";
                            var q = o;
                            alert(err, q);
                            break;
                        case "OK":
                            btnCancelar()
                            alert("Ha Eliminado correctamente  ");
                            break;
                    }
                }
            }
    );
}