<?php
include "../../model/conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $operario = $_POST["operario"];
    $maquina = $_POST["maquina"];
    $cliente = $_POST["cliente"];
    $num_rollo = $_POST["num_rollo"];
    $op_opc = $_POST["op_opc"];
    $ancho_r = $_POST["ancho_r"];
    $produccion = $_POST["produccion"];
    $ancho_largo = $_POST["ancho_largo"];
    $observaciones = $_POST["observaciones"];
    $firma = $_POST["firma"];
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $codigo = $_POST["codigo"];

    // Preparar la consulta SQL para insertar los datos en la tabla "reportes"
    $sql = "INSERT INTO reportes (id_operario, maquina, id_cliente, num_rollo, op_opc, ancho_r, produccion, ancho_largo, observaciones, firma, fecha, hora, codigo)
            VALUES ('$operario', '$maquina', '$cliente', '$num_rollo', '$op_opc', '$ancho_r', '$produccion', '$ancho_largo', '$observaciones', '$firma', '$fecha', '$hora', '$codigo')";

    if ($conn->query($sql) === TRUE) {
       
        echo '<script>alert("El reporte se ha guardado correctamente");</script>';
       
        
        header("Location: ../../views/crear_reportes.php.");
    } else {
      
        echo '<script>alert("Error al Guardar");</script>';


    }
}

?>

