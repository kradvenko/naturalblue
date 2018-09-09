//Variables para el módulo de nueva venta
var nv_IdDistribuidor = 0;
var nv_IdArticulo = 0;
var nv_Productos = [];
var nv_Total = 0;
var nv_TotalPuntos = 0;
//Funciones para el módulo de nueva venta
function elegirDistribuidor(id, value) {
    nv_IdDistribuidor = id;
}

function elegirArticulo(id, value) {
    nv_IdArticulo = id;
    agregarProductoVenta();
}

function agregarProductoVenta() {
    var id = nv_IdArticulo;
    var nombre;
    var precio;
    var puntos;

    $.ajax({url: "php/obtenerArticuloXML.php", async: false, type: "POST", data: { idProducto: nv_IdArticulo, estado: 'ACTIVO' }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            nombre = $(this).find("producto").text();
            precio = $(this).find("preciodistribuidoriva").text();
            puntos = $(this).find("valornegocio").text();
        });
    }});


    nv_Producto = { id : id, nombre : nombre, precio : precio, cantidad : '1', subtotal: precio, total : precio, puntos : puntos, totalp : puntos };
    nv_Productos[nv_Productos.length] = nv_Producto;
    mostrarVenta();
    calcularTotal();
}

function mostrarVenta() {
    $("#divVenta").html("");
    for (i = 0; i <= nv_Productos.length - 1; i++) {
        nv_Producto = nv_Productos[i];
        var div;
        //Nombre
        div = '<div class="col-12 divBackgroundBlue2 divMargin">' + nv_Producto.nombre + '</div>';
        div = div + '<div class="col-1"><label class="labelType02">Cantidad</label></div>';
        div = div + '<div class="col-1">' + '<input id="tbCantidad_' + i + '" type="text" class="form-control textbox-center" onchange="cambiarCantidad(' + i + ')" value="' + nv_Producto.cantidad + '"</input></div>';
        div = div + '<div class="col-1"><label class="labelType02">Precio</label></div>';        
        div = div + '<div class="col-1"><label class="labelType02">$ ' + nv_Producto.precio + '</label></div>';
        div = div + '<div class="col-1"><label class="labelType02">Total</label></div>';
        div = div + '<div class="col-1"><label class="labelType02">$ ' + nv_Producto.total + '</label></div>';
        div = div + '<div class="col-1"><label class="labelType02">Puntos</label></div>';        
        div = div + '<div class="col-1"><label class="labelType02">' + nv_Producto.puntos + '</label></div>';
        div = div + '<div class="col-1"><label class="labelType02">Total P.</label></div>';        
        div = div + '<div class="col-1"><label class="labelType02">' + nv_Producto.totalp + '</label></div>';
        div = div + '<div class="col-2 divMargin">' + '<button type="button" class="btn btn-primary btn-danger" onclick="borrarArticulo(' + i + ')">Borrar</button></div>';
        
        //Total
        $("#divVenta").html($("#divVenta").html() + div);
    }
}

function calcularTotal() {
    var total = 0;
    var puntos = 0;
    for (i = 0; i <= nv_Productos.length - 1; i++) {
        nv_Producto = nv_Productos[i];
        total = Number(total) + Number(nv_Producto.total);
    }
    nv_Total = total;
    for (i = 0; i <= nv_Productos.length - 1; i++) {
        nv_Producto = nv_Productos[i];
        puntos = Number(puntos) + Number(nv_Producto.totalp);
    }
    nv_TotalPuntos = puntos;
    $("#lblPuntos").text(puntos);
    $("#lblTotal").text("$ " + total);
}

function borrarArticulo(index) {
    nv_Productos.splice(index, 1);
    mostrarVenta();
    calcularTotal();
}

function cambiarCantidad(index) {
    if (isNaN($("#tbCantidad_" + index).val())) {
        alert("No ha escrito un número válido.");
        $("#tbCantidad_" + index).val("1");
        return;
    }
    nv_Producto = nv_Productos[index];
    nv_Producto.cantidad = $("#tbCantidad_" + index).val();
    calcularCostoArticulo(index);
    mostrarVenta();
}

function calcularCostoArticulo(index) {
    nv_Producto = nv_Productos[index];
    nv_Producto.total = nv_Producto.cantidad * nv_Producto.precio;
    nv_Producto.totalp = nv_Producto.cantidad * nv_Producto.puntos;
    calcularTotal();
}

function limpiarCamposNuevaVenta() {
    $("#tbBuscar").val("");
    $("#tbBuscarArticulo").val("");
    $("#divVenta").html("");
    $("#lblPuntos").text("0");
    $("#lblTotal").text("$");
    nv_IdArticulo = 0;
    nv_IdDistribuidor = 0;
    nv_Productos = [];
    nv_Total = 0;
    nv_TotalPuntos = 0;
}
