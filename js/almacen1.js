//Variables para el módulo del almacén 1

//Funciones para el módulo del almacén 1
function obtenerCategoriasSelect() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategorias', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategorias").html(res);
        $("#selCategorias").change(obtenerArticulosInventario);
    }});
}

function obtenerCategoriasSelect() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategorias', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategorias").html(res);
        $("#selCategorias").change(obtenerArticulosInventarioAlmacen1);
    }});
}

function obtenerArticulosInventarioAlmacen1() {
    var idCategoria = $("#selCategorias").val();
    if (idCategoria == null) {
        return;
    }
    $.ajax({url: "php/obtenerArticulosInventario.php", async: false, type: "POST", data: { idCategoria: idCategoria, estado: '%', tipoInventario: 'ALMACEN1' }, success: function(res) {
        $("#divArticulosInventario").html(res);
    }});
}

function obtenerExistenciasArticulo(id) {
    $('#modalExistencias').modal('show');
    $.ajax({url: "php/obtenerExistenciasArticuloXML.php", async: false, type: "POST", data: { idProducto: id }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            if ($(this).find("respuesta").text() == "OK") {
                $("#tbExistenciaAlmacen1").val($(this).find("cantidad").text());
                $("#divSinRegistro").html("");
            } else if ($(this).find("respuesta").text() == "SIN REGISTRO") {
                $("#tbExistenciaAlmacen1").val("No se ha registrado este producto.");
                $("#divSinRegistro").html("<input type='button' class='btn btn-info' value='Registrar producto' onclick='registrarProducto(" + id + ")' />");
            }
        });
    }});
}

function limpiarCamposExistencias() {
    $("#tbExistenciaAlmacen1").val("");
    $("#divSinRegistro").html("");
}

function registrarProducto(id) {
    alert(id);
}