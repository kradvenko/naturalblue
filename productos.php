<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/naturalblue.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/naturalblue.js"></script>
    <script src="js/productos.js"></script>

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
        <div class="row divMargin divBackgroundTwo divCenter">
            <div class="col-12">
                Control de artículos
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalAgregarCategoria' value="Agregar categoría"  />
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalModificarCategoria' onclick='obtenerCategoriasModificar()' value="Modificar categoría"  />
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalAgregarArticulo' onclick='obtenerCategoriasNuevoArticulo()' value="Agregar Artículo"  />
            </div>
        </div>
        <div class="row divMargin divBackgroundTwo divCenter">
            <div class="col-12">
                Inventario
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
    <!--Ventana modal para agregar una nueva categoría-->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoria" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12">
                            Categoría
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaCategoria"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevaCategoria()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaCategoria()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modifcar una categoría-->
    <div class="modal fade" id="modalModificarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalModificarCategoria" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12">
                            Elija una categoría
                        </div>
                        <div class="col-12 divMargin" id="divCategoriasModificar">
                
                        </div>
                        <div class="col-12">
                            Nuevo nombre
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbModificarCategoria"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposModificarCategoria()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificarCategoria()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo artículo-->
    <div class="modal fade" id="modalAgregarArticulo" tabindex="-1" role="dialog" aria-labelledby="modalAgregarArticulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12 divMargin">
                            Código
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloCodigo"></input>
                        </div>
                        <div class="col-12 divMargin">
                            Producto
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloProducto"></input>
                        </div>
                        <div class="col-12 divMargin">
                            Categoría
                        </div>
                        <div class="col-12 divMargin" id="divCategoriasNuevoArticulo">
                            
                        </div>
                        <div class="col-3 divMargin">
                            Precio Distribuidor sin IVA
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloPrecioDistribuidor" value="0"></input>
                        </div>
                        <div class="col-3 divMargin">
                            I.V.A.
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloIVA" value="0"></input>
                        </div> 
                        <div class="col-3 divMargin">
                            Precio Distribuidor con IVA
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloPrecioDistribuidorIVA" value="0"></input>
                        </div>                                               
                        <div class="col-3 divMargin">
                            Precio Público
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloPrecioPublico" value="0"></input>
                        </div>
                        <div class="col-3 divMargin">
                            Valor Negocio
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArticuloValorNegocio" value="0"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevoArticulo()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoArticulo()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modificar un artículo-->
    <div class="modal fade" id="modalModificarArticulo" tabindex="-1" role="dialog" aria-labelledby="modalModificarArticulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row divMargin divCenter">
                        <div class="col-12 divMargin">
                            Código
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloCodigo"></input>
                        </div>
                        <div class="col-12 divMargin">
                            Producto
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloProducto"></input>
                        </div>
                        <div class="col-12 divMargin">
                            Categoría
                        </div>
                        <div class="col-12 divMargin" id="divCategoriasModificarArticulo">
                            
                        </div>
                        <div class="col-3 divMargin">
                            Precio Distribuidor sin IVA
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloPrecioDistribuidor" value="0"></input>
                        </div>
                        <div class="col-3 divMargin">
                            I.V.A.
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloIVA" value="0"></input>
                        </div> 
                        <div class="col-3 divMargin">
                            Precio Distribuidor con IVA
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloPrecioDistribuidorIVA" value="0"></input>
                        </div>                       
                        <div class="col-3 divMargin">
                            Precio Público
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloPrecioPublico" value="0"></input>
                        </div>
                        <div class="col-3 divMargin">
                            Valor Negocio
                        </div>
                        <div class="col-3 divMargin">
                            <input type="text" class="form-control" id="tbModificarArticuloValorNegocio" value="0"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposModificarArticulo()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificarArticulo()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        obtenerCategoriasSelect();
        obtenerArticulosInventario();
        $("#aInventarios").addClass("currentPage");
    });
    $('#modalAgregarCategoria').on('shown.bs.modal', function() {
        $('#tbNuevaCategoria').focus();
    });
    $('#modalAgregarArticulo').on('shown.bs.modal', function() {
        $('#tbNuevoArticuloCodigo').focus();
    });
    $('#modalModificarArticulo').on('shown.bs.modal', function() {
        $('#tbModificarArticuloCodigo').focus();
    });
</script>
</html>