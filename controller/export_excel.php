<?php
require_once '../Libraries/PHPExcel-1.8/PHPExcel.php';

$objPHPExcel = new PHPExcel();

// Agregar datos a la hoja de Excel (similartu estructura)

// Configurar el encabezado de respuesta para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporte.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
