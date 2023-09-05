<?php
require('../../model/conexion.php'); 
require('./fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(45);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(200, 15, utf8_decode('NOMBRE EMPRESA'), 1, 1, 'C', 0);
        $this->Ln(3);
        $this->SetTextColor(103);

        $this->SetTextColor(0, 128, 128);
        $this->Cell(50);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(180, 10, utf8_decode("REPORTES DE PRODUCCION"), 0, 1, 'C', 0);
        $this->Ln(7);

        $this->SetFillColor(70, 130, 180);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 9);

        $this->Cell(10, 15, utf8_decode('N°'), 1, 0, 'C', 1);
        $this->Cell(30, 15, utf8_decode('Operario'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Máquina'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Fecha'), 1, 0, 'C', 1);
        $this->Cell(15, 15, utf8_decode('Turno'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Código'), 1, 0, 'C', 1);
        $this->Cell(15, 15, utf8_decode('Hora'), 1, 0, 'C', 1);
        $this->Cell(30, 15, utf8_decode('Cliente'), 1, 0, 'C', 1);
        $this->Cell(15, 15, utf8_decode('Número de Rollo'), 1, 0, 'C', 1);
        $this->Cell(15, 15, utf8_decode('OP/OPC'), 1, 0, 'C', 1);
        $this->Cell(10, 15, utf8_decode('Ancho Rollo'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Producción'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Ancho Largo'), 1, 0, 'C', 1);
        $this->Cell(25, 15, utf8_decode('Observaciones'), 1, 0, 'C', 1);
        $this->Cell(20, 15, utf8_decode('Firma'), 1, 1, 'C', 1);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(455, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

$pdf = new PDF('L');
$pdf->AddPage();
$pdf->AliasNbPages();

$consulta_reporte = $conn->query("SELECT reportes.id_reporte, operarios.nombre, clientes.nombre AS nombre_cliente, reportes.maquina, reportes.fecha, reportes.turno, reportes.codigo, reportes.hora, reportes.id_cliente, reportes.num_rollo, reportes.op_opc, reportes.ancho_r, reportes.produccion, reportes.ancho_largo, reportes.observaciones, reportes.firma, reportes.id_operario FROM reportes INNER JOIN operarios ON reportes.id_operario = operarios.id_operario INNER JOIN clientes ON reportes.id_cliente = clientes.id_cliente");

while ($datos_reporte = $consulta_reporte->fetch_object()) {
    $pdf->Cell(10, 15, utf8_decode($datos_reporte->id_reporte), 1, 0, 'C', 0);
    $pdf->Cell(30, 15, utf8_decode($datos_reporte->nombre), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->maquina), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->fecha), 1, 0, 'C', 0);
    $pdf->Cell(15, 15, utf8_decode($datos_reporte->turno), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->codigo), 1, 0, 'C', 0);
    $pdf->Cell(15, 15, utf8_decode($datos_reporte->hora), 1, 0, 'C', 0);
    $pdf->Cell(30, 15, utf8_decode($datos_reporte->nombre_cliente), 1, 0, 'C', 0);
    $pdf->Cell(15, 15, utf8_decode($datos_reporte->num_rollo), 1, 0, 'C', 0);
    $pdf->Cell(15, 15, utf8_decode($datos_reporte->op_opc), 1, 0, 'C', 0);
    $pdf->Cell(10, 15, utf8_decode($datos_reporte->ancho_r), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->produccion), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->ancho_largo), 1, 0, 'C', 0);
    $pdf->Cell(25, 15, utf8_decode($datos_reporte->observaciones), 1, 0, 'C', 0);
    $pdf->Cell(20, 15, utf8_decode($datos_reporte->firma), 1, 1, 'C', 0);
}

$pdf->Output('Reporte.pdf', 'I');
?>