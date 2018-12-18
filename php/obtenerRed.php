<?php
    try
    {

        $idDistribuidor = $_POST["idDistribuidor"];        

        if (!$idDistribuidor) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        require_once('connection.php');

        $idTienda = $_COOKIE["nb_idtienda"];
        $prefijo = $_COOKIE["nb_prefijo"];
        $idUsuario = $_COOKIE["nb_idusuario"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT *
                FROM distribuidores
                INNER JOIN relacion
                ON relacion.iddistribuidor = distribuidores.iddistribuidor
                WHERE relacion.idpatrocinador = $idDistribuidor";

        $result = $con->query($sql);

        //echo $sql;
        $total = 0;

        while ($row = $result->fetch_array()) {
            echo $row["nombre"] . " " . $row["apellidopaterno"] . " " . $row["apellidomaterno"];
            $total = $total + 1;
            $sql2 = "SELECT COUNT(*) AS C
                    FROM relacion
                    WHERE idpatrocinador = " . $row["iddistribuidor"];

            $count = $con->query($sql2);
            $row2 = $count->fetch_array();
            echo " - Patrocinador de " . $row2["C"] . " distribuidores. <br />";
        }

        echo "El distribuidor es patrocinador de " . $total . " distribuidores.";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>