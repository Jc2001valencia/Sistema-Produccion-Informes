<?php
include "../../model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_p"];  // ID del cliente a actualizar
    $nombre = $_POST["nombre"];
    $tipo_cliente = $_POST["cliente"];

    // Realizar la actualización en la base de datos
    $sql = "UPDATE clientes SET nombre = '$nombre', tipo_cliente = '$tipo_cliente' WHERE id_cliente = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro actualizado exitosamente");</script>';
        header("Location: ../../views/panel_admin_cliente.php");  // Redirigir a la página de administración de clientes
    } else {
        echo '<script>alert("Error al actualizar el registro");</script>';
    }
}

// Cerrar la conexión a la base de datos (si es necesario)
$conn->close();
?>
