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
        
        <div class="row divMargin">
        <?php
            require_once('php/connection.php');

            $idCategoria = "%";
            $estado = "ACTIVO";
            $tipoInventario = "PRODUCTOS";

            if (!$idCategoria) {
                echo "Error. Faltan variables.";
                exit(1);
            }

            $tabla = "productos";

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "SELECT *
                    FROM $tabla
                    WHERE idcategoria Like '$idCategoria' And estado Like '$estado'";

            $result = $con->query($sql);

                echo "<table>";
                echo "<tr>";
                
                echo "<td>";
                echo "Código";
                echo "</td>";
                echo "<td>";
                echo "Producto";
                echo "</td>";
                echo "<td>";
                echo "Precio Distribuidor sin IVA";
                echo "</td>";
                echo "<td>";
                echo "IVA";
                echo "</td>";
                echo "<td>";
                echo "Precio distribuidor con IVA";
                echo "</td>";
                echo "<td>";
                echo "Precio público";
                echo "</td>";
                echo "<td>";
                echo "Valor Negocio";
                echo "</td>";
                echo "<td>";
                echo "";
                echo "</td>";
                
                echo "</tr>";
                while ($row = $result->fetch_array()) {
                    echo "<tr>";

                    echo "<td>";
                    echo $row["codigo"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["producto"];
                    echo "</td>";
                    echo "<td>";
                    echo "$ " . $row["preciodistribuidor"];
                    echo "</td>";
                    echo "<td>";
                    echo "$ " . $row["iva"];
                    echo "</td>";
                    echo "<td>";
                    echo "$ " . $row["preciodistribuidoriva"];
                    echo "</td>";
                    echo "<td>";
                    echo "$ " . $row["preciopublico"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["valornegocio"] . " PTS.";
                    echo "</td>";
                    echo "<td>";
                    
                    echo "</td>";

                    echo "</tr>";
                }

                echo "</table>";
        ?>
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
    });
</script>
</html>