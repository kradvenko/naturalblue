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
                <input type="text" class="form-control" id="tbBuscarArticulo" placeholder="Nombre del artículo" />
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
        <div class="row divMargin" id="divVenta">

        </div>
        <div class="row divBackgroundOne">
            <div class="col-12 mainFooter">
                <b>Natural Blue</b> © Derechos Reservados 2018.
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

    $("#tbBuscarArticulo").autocomplete({
        source: "php/obtenerArticuloJSON.php",
        minLength: 2,
        select: function(event, ui) {
            elegirArticulo(ui.item.id, ui.item.value);
            this.value = '';
            return false;
        }
    });
</script>
</html>