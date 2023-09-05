<?php
$servername = "localhost";  
$username = "root";     
$password = "";     
//$password = "contraseña";       
$database = "reportdb_web"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}



?>
