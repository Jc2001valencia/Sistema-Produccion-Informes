<?php

include "../model/conexion.php";

session_start();

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Realizar la conexión a la base de datos


$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND passwd = '$contrasena'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $rol = $row['rol'];

    // Almacenar los datos de la sesión

    $_SESSION['usuario'] = $usuario;

    // Redirigir al usuario a la página correspondiente

    if ($rol == 'operario') {
        header("Location: ../views/crear_reportes.php");
    } elseif ($rol == 'administrador') {
        header("Location: ../views/panel_admin_reporte.php");
    } else {

        echo '<script>alert("Rol desconocido");</script>';
    }
} else {

    echo '<script>alert("Usuario o contraseña incorrectos");</script>';

}


?>

