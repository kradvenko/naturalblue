<?php    
    try
    {
        require_once('php/connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT *
                FROM distribuidores
                ";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo $row["iddistribuidor"] . " - " . $row["nombre"] . " " . $row["apellidopaterno"] . " " . $row["apellidomaterno"] . "<br />";
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>