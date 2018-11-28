<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/naturalblue.css" />
    <link rel="stylesheet" type="text/css" href="css/slider.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/naturalblue.js"></script>
    <script src="js/modificardistribuidor.js"></script>

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
                Modificar distribuidor
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-2">
                Número de distribuidor
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbIdDistribuidor" />
            </div>            
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Nombre
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbNombre" />
            </div>
            <div class="col-1">
                Ap. Paterno
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbPaterno" />
            </div>
            <div class="col-1">
                Ap. Materno
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbMaterno" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Calle
            </div>
            <div class="col-5">
                <input type="text" class="form-control inputUpper" id="tbCalle" />
            </div>
            <div class="col-1">
                Núm. Interior
            </div>
            <div class="col-2">
                <input type="text" class="form-control inputUpper" id="tbNumInterior" />
            </div>
            <div class="col-1">
                Núm. Exterior
            </div>
            <div class="col-2">
                <input type="text" class="form-control inputUpper" id="tbNumExterior" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Entre calles
            </div>
            <div class="col-11">
                <input type="text" class="form-control inputUpper" id="tbEntreCalles" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Colonia
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbColonia" />
            </div>
            <div class="col-1">
                Ciudad
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbCiudad" />
            </div>
            <div class="col-1">
                Estado
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbEstado" value="NAYARIT" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                C.P.
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbCodigoPostal" maxlength="5" />
            </div>
            <div class="col-1">
                Tel. Particular
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbTelParticular" />
            </div>
            <div class="col-1">
                Tel. Celular
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbTelCelular" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Banco
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbBanco" />
            </div>
            <div class="col-1">
                Clabe
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbClabe" maxlength="18" />
            </div>
            <div class="col-1">
                E-mail
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbEmail" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                R.F.C.
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbRfc" />
            </div>
            <div class="col-1">
                CURP
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbCurp" />
            </div>
            <div class="col-1">
                INE
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbIne" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Fecha de nacimiento
            </div>
            <div class="col-2">
                <select id="selDia" class="form-control">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
            <div class="col-2">
                <select id="selMes" class="form-control">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-2">
                <input type="text" id="tbAño" class="form-control" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-1">
                Beneficiario
            </div>
            <div class="col-5">
                <input type="text" class="form-control inputUpper" id="tbBeneficiario" />
            </div>
            <div class="col-1">
                Patrocinador
            </div>
            <div class="col-5">
                <input type="text" class="form-control inputUpper" id="tbPatrocinador" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-4">
                <label class="switch s-350">
                    <input id="cbUsuario" type="checkbox" onchange="verificarCreacionUsuario()" />
                    <span class="slider round">
                        Tiene usuario para el sitio web
                    </span>
                </label>
            </div>
            <div class="col-1">
                Usuario
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbUsuario" disabled="disabled" />
            </div>
            <div class="col-1">
                Contraseña
            </div>
            <div class="col-3">
                <input type="text" class="form-control inputUpper" id="tbPassword" disabled="disabled" />
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">
                <button type="button" class="btn btn-secondary" onclick="limpiarCamposModificarDistribuidor()">Limpiar campos</button>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success" onclick="actualizarDistribuidor()">Guardar cambios</button>
            </div>
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
        limpiarCamposModificarDistribuidor();
        checkSession();
        $("#aDistribuidores").addClass("currentPage");
    });
    $(function() {     
        $("#tbBuscar").autocomplete({
            source: "php/obtenerDistribuidoresJSON.php",
            minLength: 2,
            select: function(event, ui) {
                elegirDistribuidor(ui.item.id, ui.item.value);
                this.value = '';
                return false;
            }
        });
    });
    $(function() {     
        $("#tbPatrocinador").autocomplete({
            source: "php/obtenerDistribuidoresJSON.php",
            minLength: 2,
            select: function(event, ui) {
                elegirPatrocinador(ui.item.id, ui.item.value);
                //this.value = '';
                //return false;
            }
        });
    });
    $(document).ready(function () {
        var inputs = $(':input').keypress(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                var nextInput = inputs.get(inputs.index(this) + 1);
                if (nextInput) {
                    nextInput.focus();
                }
            }
        });
     });
</script>
</html>