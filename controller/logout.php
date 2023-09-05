<?php
// Iniciar la sesión
session_start();

// Destruir la sesión
session_destroy();

// Redirigir a otra página
header("Location: ../index.php");
exit;
?>
