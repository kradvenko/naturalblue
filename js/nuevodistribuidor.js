//Variables para el módulo de nuevo distribuidor
var nd_IdPatrocinador = 0;
//Fuciones para el módulo de nuevo dsitribuidor

function limpiarCamposNuevoDistribuidor() {
    $("#tbNombre").val("");
    $("#tbPaterno").val("");
    $("#tbMaterno").val("");
    $("#tbCalle").val("");
    $("#tbNumInterior").val("");
    $("#tbNumExterior").val("");
    $("#tbColonia").val("");
    $("#tbCiudad").val("");
    $("#tbEstado").val("NAYARIT");
    $("#tbCodigoPostal").val("");
    $("#tbTelParticular").val("");
    $("#tbTelCelular").val("");
    $("#tbBanco").val("");
    $("#tbClabe").val("");
    $("#tbEmail").val("");
    $("#tbRfc").val("");
    $("#tbCurp").val("");
    $("#tbIne").val("");
    $("#selDia").val("01");
    $("#selMes").val("01");
    $("#tbAño").val("");
    $("#tbBeneficiario").val("");
    $("#tbPatrocinador").val("");
    $("#tbUsuario").val("");
    $("#tbPassword").val("");
    $("#cbUsuario").prop("checked", false);
}

function agregarNuevoDistribuidor() {
    var nombre = $("#tbNombre").val();
    var paterno = $("#tbPaterno").val();
    var materno = $("#tbMaterno").val();
    var calle = $("#tbCalle").val();
    var interior = $("#tbNumInterior").val();
    var exterior = $("#tbNumExterior").val();
    var colonia = $("#tbColonia").val();
    var ciudad = $("#tbCiudad").val();
    var estado = $("#tbEstado").val();
    var codigoPostal = $("#tbCodigoPostal").val();
    var telParticular = $("#tbTelParticular").val();
    var telCelular = $("#tbTelCelular").val();
    var banco = $("#tbBanco").val();
    var clabe = $("#tbClabe").val();
    var email = $("#tbEmail").val();
    var rfc = $("#tbRfc").val();
    var curp = $("#tbCurp").val();
    var ine = $("#tbIne").val();
    var dia = $("#selDia").val();
    var mes = $("#selMes").val();
    var año = $("#tbAño").val();
    var beneficiario = $("#tbBeneficiario").val();
    var patrocinador = nd_IdPatrocinador;
    var usuario = $("#tbUsuario").val();
    var pass = $("#tbPassword").val();
    var tieneUsuario = $("#cbUsuario").is(":checked") ? "SI" : "NO";    

    if (nombre.length == 0) {
        alert("No ha escrito el nombre del distribuidor.");
        $("#tbNombre").focus();
        return;
    }
    if (calle.length == 0) {
        alert("No ha escrito la calle del domicilio del distribuidor");
        $("#tbCalle").focus();
        return;
    }
    if (colonia.length == 0) {
        alert("No ha escrito la colonia del domicilio del distribuidor");
        $("#tbColonia").focus();
        return;
    }
    if (ciudad.length == 0) {
        alert("No ha escrito la ciudad del distribuidor");
        $("#tbCiudad").focus();
        return;
    }
    if (estado.length == 0) {
        alert("No ha escrito el estado del distribuidor");
        $("#tbEstado").focus();
        return;
    }
    if (banco.length == 0) {
        alert("No ha escrito el banco del distribuidor");
        $("#tbBanco").focus();
        return;
    }
    if (clabe.length != 18) {
        alert("No ha escrito la clabe del distribuidor");
        $("#tbClabe").focus();
        return;
    }
    if (tieneUsuario == "SI") {
        if (usuario.length == 0) {
            alert("No ha escrito el nombre de usuario del distribuidor");
            $("#tbUsuario").focus();
            return;
        }
        if (pass.length == 0) {
            alert("No ha escrito la contraseña del distribuidor");
            $("#tbPassword").focus();
            return;
        }
    }
}