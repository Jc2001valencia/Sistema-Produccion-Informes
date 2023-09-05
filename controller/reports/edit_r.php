<?php
include "../../model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_reporte = $_POST["id_reporte"];
    $operario = $_POST["operario"];
    $maquina = $_POST["maquina"];
    $cliente = $_POST["cliente"];
    $num_rollo = $_POST["num_rollo"];
    $op_opc = $_POST["op_opc"];
    $ancho_r = $_POST["ancho_r"];
    $produccion = $_POST["produccion"];
    $ancho_largo = $_POST["ancho_largo"];
    $observaciones = $_POST["observaciones"];
    $firma = $_POST["firma"];
    $codigo = $_POST["codigo"];

    $sql = "UPDATE reportes SET
            id_operario = '$operario',
            maquina = '$maquina',
            id_cliente = '$cliente',
            num_rollo = '$num_rollo',
            op_opc = '$op_opc',
            ancho_r = '$ancho_r',
            produccion = '$produccion',
            ancho_largo = '$ancho_largo',
            observaciones = '$observaciones',
            firma = '$firma',
            codigo = '$codigo'
            WHERE id_reporte = '$id_reporte'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("El reporte se ha actualizado correctamente");</script>';
        header("Location: ../../views/panel_admin_reporte.php");
    } else {
        echo '<script>alert("Error al actualizar el reporte");</script>';
    }
} elseif (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id_reporte = $_GET["id"];
    
    $sql = "SELECT * FROM reportes WHERE id_reporte = '$id_reporte'";
    $resultado = $conn->query($sql);
    $reporte = $resultado->fetch_assoc();

  
}
?>


 