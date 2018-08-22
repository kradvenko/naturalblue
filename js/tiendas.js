//Variables para el módulo de tiendas

//Funciones para el módulo de tiendas
function obtenerCategoriasSelect() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategorias', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategorias").html(res);
        $("#selCategorias").change(obtenerArticulosInventario);
    }});
}

function obtenerTiendas() {
    $.ajax({url: "php/obtenerTiendasSelect.php", async: false, type: "POST", data: { idSelect: 'selTiendas', estado: 'ACTIVO' }, success: function(res) {
        $("#divTiendas").html(res);
        $("#selCategorias").change(obtenerArticulosInventario);
    }});
}

function obtenerArticulosInventario() {
    
}