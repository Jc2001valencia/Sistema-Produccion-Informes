<?php
include "../../model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $tipo_cliente = $_POST["cliente"]; // Cambio en la variable para capturar el tipo de cliente

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO clientes (nombre, tipo_cliente) VALUES ('$nombre', '$tipo_cliente')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Cliente creado exitosamente");</script>';
        header("Location: ../../views/panel_admin_cliente.php");
    } else {
        echo '<script>alert("Error al crear el cliente");</script>';
    }
}
?>
