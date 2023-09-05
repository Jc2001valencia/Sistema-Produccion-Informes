<?php
include "../../model/conexion.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id_empleado = $_GET["id"];

    // Realizar la eliminación en la base de datos
    $sql =  "DELETE FROM operarios WHERE `operarios`.`id_operario` = $id_empleado";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Empleado eliminado exitosamente");</script>';
        header("Location: ../../views/panel_admin_operario.php"); // Redirigir a la página de listado de empleados
        exit(); // Detener el script después de la redirección
    } else {
        echo '<script>alert("Error al eliminar el empleado");</script>';
    }
} else {
    echo '<script>alert("ID de empleado no válido");</script>';
}
?>
