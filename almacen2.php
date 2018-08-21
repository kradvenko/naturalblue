<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/naturalblue.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/naturalblue.js"></script>
    <script src="js/almacen2.js"></script>

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
                Almacén 2
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                Categorías
            </div>
            <div class="col-9">
                Artículos
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3" id="divCategorias">
                
            </div>
            <div class="col-9" id="">
                
            </div>
        </div>
        <div class="row divMargin" id="divArticulosInventario">

        </div>

        <div class="row divBackgroundOne">
            <div class="col-12 mainFooter">
                <b>Natural Blue</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
    <!--Ventana modal para ver las existencias de un artículo-->
    <div class="modal fade" id="modalExistencias" tabindex="-1" role="dialog" aria-labelledby="modalExistencias" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Existencias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row divMargin divCenter">
                        <div class="col-12 divMargin">
                            Existencias en el almacén 2
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbExistenciaAlmacen2" value="0"></input>
                        </div>
                        <div class="col-12 divMargin" id="divSinRegistro">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposExistencias()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardarExistencias()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        obtenerCategoriasSelect();
        obtenerArticulosInventarioAlmacen1();
        $("#aInventarios").addClass("currentPage");
    });
</script>
</html>