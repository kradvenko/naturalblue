<?php
    require('php/fpdf.php');
    require('php/api.php');

    try
    {
        require_once('php/connection.php');

        $idVenta = $_GET["idVenta"];

        if (!$idVenta) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $prefijo = $_COOKIE["nb_prefijo"];

        $tablaVentas = "ventas";
        $tablaDetalleVentas = "detalleventa";
        $tablaArticulos = "productos";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select $tablaArticulos.producto As Articulo, $tablaDetalleVentas.cantidad As Cantidad, $tablaDetalleVentas.total AS Total,
                $tablaArticulos.codigo As Codigo, $tablaArticulos.preciodistribuidoriva As Precio,
                $tablaVentas.totalventa As TotalVenta, distribuidores.nombre As Cliente, distribuidores.iddistribuidor As IdCliente,
                $tablaVentas.fecha As FechaVenta, usuarios.nombre As Usuario, distribuidores.rfc As rfc, distribuidores.calle As Calle,
                distribuidores.numexterior As Numero, distribuidores.colonia As Colonia, distribuidores.ciudad As Ciudad, distribuidores.estado As Estado,
                distribuidores.codigopostal As CP
                From $tablaVentas
                Inner Join $tablaDetalleVentas
                On $tablaVentas.idventa = $tablaDetalleVentas.idventa
                Inner Join $tablaArticulos
                On $tablaArticulos.idproducto = $tablaDetalleVentas.idproducto
                Inner Join distribuidores
                On distribuidores.iddistribuidor = $tablaVentas.iddistribuidor
                Inner Join usuarios
                On usuarios.idusuario = $tablaVentas.idusuario
                Where $tablaVentas.idventa = $idVenta";

        //echo $sql;
        
        $result = $con->query($sql);

        $row = $result->fetch_array();

        $rows = $result->num_rows;

        $Cliente = $row["Cliente"];

        $idCliente = $row["IdCliente"];

        $FechaVenta = $row["FechaVenta"];

        $Usuario = $row["Usuario"];

        $RFC = $row["rfc"];

        $Domicilio = $row["Calle"] . " " . $row["Numero"];
        $Colonia = $row["Colonia"];
        $Ciudad = $row["Ciudad"];
        $Estado = $row["Estado"];
        $CP = $row["CP"];

        //echo "Total " . $result->num_rows;
        

        mysqli_close($con);

    }
    catch (Throwable $t)
    {
        echo $t;
        return;
    }
    
    $TotalVenta = 0;
    
    //$pdf = new FPDF('P', 'mm', 'Letter');
    

    $pdf = new FPDF('P', 'cm', array(7.5, $rows + 16));

    $pdf->SetMargins(0.1, 0.0, 0.1, 10);

    $pdf->SetFont('Arial','B',12);
    
    $pdf->AddPage();

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Ticket de compra'), '0', 0, 'C', false);

    $pdf->SetFont('Arial', 'B', 7);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Comercializadora Areda S. de R.L. de C.V.'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'CAR110221QW3'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Pedraza No. 686'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Col. Santa Teresita'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'C.P. 63020'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Tepic, Nayarit'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'P.V. Tepic 001'), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Cliente: ' . $idCliente . ' - ' . $Cliente), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Venta No.: ' . $idVenta), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Fecha: ' . $FechaVenta . ' ' . $Usuario), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'R.F.C.: ' . $RFC), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Domicilio: ' . $Domicilio . " Colonia: " . $Colonia), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', 'Lugar: ' . $Ciudad . ", " . $Estado . " C.P.: " . $CP), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', ""), 'B', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', "Clave"), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', "Cantidad"), '0', 0, 'C', false);
    $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "Precio"), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', "Total"), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', ""), 'B', 0, 'C', false);    

    $pdf->Ln(0.5);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', $row["Codigo"]), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', $row["Cantidad"]), '0', 0, 'C', false);
    $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "$ " . $row["Precio"]), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', "$ " . $row["Total"]), '0', 0, 'C', false);
    $TotalVenta = $row["TotalVenta"];

    while ($row = $result->fetch_array()) {
        $pdf->Ln(0.5);
        $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', $row["Codigo"]), '0', 0, 'C', false);
        $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', $row["Cantidad"]), '0', 0, 'C', false);
        $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "$ " . $row["Precio"]), '0', 0, 'C', false);
        $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', "$ " . $row["Total"]), '0', 0, 'C', false);        
    }

    $pdf->Ln(0.5);

    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', ""), 'B', 0, 'C', false);

    $Subtotal = $TotalVenta - $TotalVenta * 0.16;

    $pdf->Ln(0.5);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'L', false);
    $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "Total venta: "), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', " $ " . round($Subtotal, 2)), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'L', false);
    $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "I.V.A. : "), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', " $ " . round($TotalVenta * 0.16, 2)), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', ""), '0', 0, 'L', false);
    $pdf->Cell(1, 0, iconv('UTF-8', 'windows-1252', "Total venta: "), '0', 0, 'C', false);
    $pdf->Cell(2, 0, iconv('UTF-8', 'windows-1252', " $ " . round($TotalVenta, 2)), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Periodo: " . date('m') . date('Y')), '0', 0, 'L', false);

    $puntosAcumulados = obtenerPuntosAcumuladosPeridor(date('m'), date('Y'), $idCliente);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Puntos acumulados: " . $puntosAcumulados), '0', 0, 'L', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Pago hecho en una sola exhibición."), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Este comprobante no es válido para efectos fiscales."), '0', 0, 'C', false);

    $pdf->Ln(0.5);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Siembra la abundancia y cosecharás prosperidad."), '0', 0, 'C', false);

    $pdf->Output();
    
?>