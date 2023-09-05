<?php
include "../../model/conexion.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id_reporte = $_GET["id"];

    $sql = "DELETE FROM reportes WHERE id_reporte = $id_reporte";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("El reporte se ha eliminado correctamente");</script>';
        header("Location: ../../views/panel_admin_reporte.php");
        exit(); // Agrega esta línea para evitar que el resto del código se ejecute después de la eliminación exitosa
    } else {
        echo '<script>alert("Error al eliminar el reporte");</script>';
    }
} else {
    echo '<script>alert("ID de reporte no válido");</script>';
}

?>
