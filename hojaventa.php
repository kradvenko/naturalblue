<?php
    require('php/fpdf.php');
    require_once('php/connection.php');

    $idVenta = $_GET["idventa"];

    $prefijo = $_COOKIE["v_prefijo"];
    $tablaVentas = "ventas";
    $tablaArticulos = "productos";
    $tablaDetalleVenta = "detalleventa";

    $con = new mysqli($hn, $un, $pw, $db);

    $totalEfectivo = 0;
    $totalTarjeta = 0;
    $totalVentas = 0;
    $totalPuntos = 0;

    $sql = "Select $tablaVentas.*, $tablaDetalleVenta.*, $tablaArticulos.producto As articulo, Concat(distribuidores.nombre, ' ', distribuidores.apellidopaterno, ' ', distribuidores.apellidomaterno) As Distribuidor
            From $tablaVentas
            Inner Join $tablaDetalleVenta
            On $tablaDetalleVenta.idventa = $tablaVentas.idventa
            Inner Join $tablaArticulos
            On $tablaArticulos.idproducto = $tablaDetalleVenta.idproducto
            Inner Join distribuidores
            On distribuidores.iddistribuidor = $tablaVentas.iddistribuidor
            Where $tablaVentas.idventa = $idVenta";

    $result = $con->query($sql);

    $row = $result->fetch_array();
    
    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->SetMargins(0,0);

    $pdf->SetFont('Arial','B',16);
    
    $pdf->AddPage();

    $pdf->Image('imgs/logo_small.png',0,0,40);

    $pdf->Cell(40);
    $pdf->SetFillColor(100,170,250);
    //$pdf->SetDrawColor(50,50,250);
    
    $pdf->Cell(0,10,iconv('UTF-8', 'windows-1252', 'Nota de venta'),'B',0,'C',true);

    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',9);

    
    $pdf->Image('imgs/loc.png',70,10,5);

    $pdf->Cell(120);
    
    $pdf->Cell(15,5,iconv('UTF-8', 'windows-1252', 'Pedráza No. 686 Altos Col. Santa Teresita C.P. 63020 Tepic Nayarit'),'0',0,'C',false);

    $pdf->Ln(10);

    $pdf->Image('imgs/tel.png',110,20,5);

    $pdf->Cell(120);

    $pdf->Cell(15,5,iconv('UTF-8', 'windows-1252', '(311) 216 25 02'),'0',0,'C',false);

    $pdf->Ln(10);

    $pdf->Image('imgs/www.png',100,30,5);

    $pdf->Cell(120);

    $pdf->Cell(15,5,iconv('UTF-8', 'windows-1252', 'www.naturalblue.com.mx'),'0',0,'C',false);

    $pdf->Ln(10);
    
    $pdf->SetFillColor(200,200,230);
    $pdf->Cell(15,10,'Folio',0,0,'L',true);
    $pdf->SetFillColor(235,235,235);
    $pdf->Cell(40,10,$row["idventa"],'0',0,'C',true);

    $pdf->SetFillColor(200,200,230);
    $pdf->Cell(15,10,'Fecha',0,0,'L',true);
    $pdf->SetFillColor(235,235,235);
    $pdf->Cell(0,10,$row["fecha"],'0',0,'C',true);

    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',11);
    
    $pdf->SetFillColor(200,200,230);
    $pdf->Cell(40,10,'Distribuidor',0,0,'L',true);
    $pdf->SetFillColor(235,235,235);
    $pdf->Cell(0,10,$row["Distribuidor"],'0',0,'C',true);

    $pdf->Ln(10);

    $pdf->SetFillColor(200,200,230);
    $pdf->Cell(0,10,iconv('UTF-8', 'windows-1252', 'Detalle de venta'),0,0,'C',true);
    //$pdf->Cell(0,10,iconv('UTF-8', 'windows-1252', $sql),0,0,'C',true);

    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',8);

    $pdf->SetFillColor(200,200,230);

    $pdf->Cell(100,10,iconv('UTF-8', 'windows-1252', "PRODUCTO"),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "CANTIDAD"),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "TOTAL"),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "PUNTOS"),0,0,'C',true);

    $pdf->SetFillColor(235,235,235);

    $totalVentas = $row["totalventa"];
    $totalPuntos = $row["totalpuntos"];

    $pdf->Ln(10);
    $pdf->Cell(100,10,iconv('UTF-8', 'windows-1252', $row["articulo"]),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["cantidad"]),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["total"]),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["puntos"]),0,0,'C',true);

    while ($row = $result->fetch_array()) {        
        $pdf->Ln(10);
        $pdf->Cell(100,10,iconv('UTF-8', 'windows-1252', $row["articulo"]),0,0,'C',true);
        $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["cantidad"]),0,0,'C',true);
        $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["total"]),0,0,'C',true);
        $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $row["puntos"]),0,0,'C',true);
    }

    $pdf->SetFillColor(200,200,230);

    $pdf->Ln(15);

    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "Total:"),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "$ " . $totalVentas),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', "Total Puntos:"),0,0,'C',true);
    $pdf->Cell(20,10,iconv('UTF-8', 'windows-1252', $totalPuntos),0,0,'C',true);

    $pdf->Output();
?>