<?php
include "../../model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_p"];  // ID del operario a actualizar
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $sueldo = $_POST["sueldo"];

    // Realizar la actualización en la base de datos
    $sql = "UPDATE operarios SET nombre = '$nombre', documento = '$documento', salario = '$sueldo' WHERE id_operario = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registro actualizado exitosamente");</script>';
        header("Location: ../../views/panel_admin_operario.php");  // Redirigir a la página de administración
    } else {
        echo '<script>alert("Error al actualizar el registro");</script>';
    }
}

// Cerrar la conexión a la base de datos (si es necesario)
$conn->close();
?>
