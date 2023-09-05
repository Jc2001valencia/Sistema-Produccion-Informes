<?php
include "../../model/conexion.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Realizar la eliminación en la base de datos
    $sql =  "DELETE FROM clientes WHERE `clientes`.`id_cliente` = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Empleado eliminado exitosamente");</script>';
        header("Location: ../../views/panel_admin_cliente.php"); // Redirigir a la página de listado de empleados
        exit(); // Detener el script después de la redirección
    } else {
        echo '<script>alert("Error al eliminar el cliente");</script>';
    }
} else {
    echo '<script>alert("ID de cliente no válido");</script>';
}
?>
