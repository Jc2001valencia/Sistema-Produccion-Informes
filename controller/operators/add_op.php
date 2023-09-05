<?php
include "../../model/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $sueldo = $_POST["sueldo"];

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO operarios (nombre, documento, salario) VALUES ('$nombre', '$documento', '$sueldo')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Empleado creado exitosamente");</script>';
        header("Location: ../../views/panel_admin_operario.php");
    } else {
        echo '<script>alert("Error al crear el empleado");</script>';
    }
}
?>
