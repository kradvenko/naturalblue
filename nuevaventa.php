<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/naturalblue.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/naturalblue.js"></script>
    <script src="js/nuevaventa.js"></script>

    <title>Natural blue</title>
</head>
<body>
    <div class="container mainContainer">
        <div class="row divLogo">
            <img src="imgs/logo_small.png" />
        </div>
        <div class="">
            <div class="menuContainer">
                <?php
                    require_once('php/loadMenu.php');
                    echo menu();
                ?>
            </div>
        </div>
        <div class="row divMargin divCenter divBackgroundTwo">
            <div class="col-12">
                Buscar distribuidor
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                Búsqueda
            </div>
            <div class="col-9">
                <input type="text" class="form-control" id="tbBuscar" placeholder="Nombre del distribuidor" />
            </div>
        </div>
        <div class="row divMargin divCenter divBackgroundTwo">
            <div class="col-12">
                Buscar artículos
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                Búsqueda
            </div>
            <div class="col-9">
                <input type="text" class="form-control" id="tbBuscarProducto" placeholder="Nombre del producto" />
            </div>
        </div>
        <div class="row divMargin divCenter divBackgroundTwo">
            <div class="col-12">
                Venta
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Puntos</label>
            </div>
            <div class="col-2">
                <label class="labelType01" id="lblPuntos">0</label>
            </div>
            <div class="col-2">
                <label class="labelType01">Total</label>
            </div>
            <div class="col-2">
                <label class="labelType01" id="lblTotal">$ 0</label>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                
            </div>
            <div class="col-1">
                
            </div>
            <div class="col-3">
            
            </div>
            <div class="col-3">

            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary btn-success" onclick="mostrarPantallaVenta()">Realizar venta</button>
            </div>
        </div>
        <div class="row divMargin" id="divVenta">

        </div>
        <div class="row divBackgroundOne">
            <div class="col-12 mainFooter">
                <b>Natural Blue</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
    <!--Ventana modal de la pantalla de venta-->
    <div class="modal fade" id="modalPantallaVenta" tabindex="-1" role="dialog" aria-labelledby="modalPantallaVenta" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Tipo
                        </div>
                        <div class="col-12">
                            <select class="form-control" id="selTipoVenta">
                                <option value="EFECTIVO">Efectivo</option>
                                <option value="TARJETA">Tarjeta</option>
                            </select>
                        </div>
                        <div class="col-12">
                            Efectivo
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbEfectivo" onchange="calcularCambio();" value="0"></input>
                        </div>
                        <div class="col-12">
                            Cambio
                        </div>
                        <div class="col-12">
                            <label id="lblCambio">0</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposPantallaVenta()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="realizarVenta()">Realizar venta</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        limpiarCamposNuevaVenta();
        $("#aVentas").addClass("currentPage");
    });
    
    $("#tbBuscar").autocomplete({
        source: "php/obtenerDistribuidoresJSON.php",
        minLength: 2,
        select: function(event, ui) {
            elegirDistribuidor(ui.item.id, ui.item.value);
            //this.value = '';
            //return false;
        }
    });

    $("#tbBuscarProducto").autocomplete({
        source: "php/obtenerProductoJSON.php",
        minLength: 2,
        select: function(event, ui) {
            elegirproducto(ui.item.id, ui.item.value);
            this.value = '';
            return false;
        }
    });
</script>
</html>