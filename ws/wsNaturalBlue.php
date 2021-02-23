<?php
    try 
    {
        header('Content-type: application/json');

        $functionId = $_POST["functionId"];

        if (!$functionId) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        switch ($functionId)
        {
            case "wsF001":
                $IdDistribuidor = $_POST["IdDistribuidor"];
                obtenerDatosDistribuidor($IdDistribuidor);
            break;

            case "wsLogin":
                $Usuario = $_POST["Usuario"];
                $Contraseña = $_POST["Contraseña"];
                login($Usuario, $Contraseña);
            break;
        }


    }
    catch (Throwable $t)
    {
        echo $t;
    }

    //wsF001
    function obtenerDatosDistribuidor($IdDistribuidor)
    {
        require('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "SELECT *
                From distribuidores
                WHERE iddistribuidor = $IdDistribuidor";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $item = array(
                "id" => $row["iddistribuidor"],
                "nombre" => ($row["nombre"]),
                "apellido_paterno" => $row["apellidopaterno"],
                "apellido_materno" => $row["apellidomaterno"]
            );
            array_push($data, $item);
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }

    //wsF001
    function login($Usuario, $Contraseña)
    {
        require('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "SELECT *
                FROM usuarios
                WHERE usuario = '$Usuario' AND pass = '$Contraseña'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $item = array(
                    "respuesta" => "OK",
                    "nombre" => ($row["nombre"]),
                    "apellido_paterno" => $row["apellidopaterno"],
                    "apellido_materno" => $row["apellidomaterno"]
                );
                array_push($data, $item);
            }
        } else {
            $item = array(
                "respuesta" => "ERROR AL INICIAR SESIÓN"
            );
            array_push($data, $item);
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }
?>