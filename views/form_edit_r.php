<!DOCTYPE html>
<html>
<head>
    <title>Operario - Crear Reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        .content {
           
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-column {
            column-count: 2;
        }
        .form-column .form-group {
            break-inside: avoid;
        }
    </style>
</head>
<body>
    

<?php

include "../model/conexion.php";

$id=$_GET["id"];

$sql=$conn->query("
SELECT reportes.id_reporte, operarios.nombre, clientes.nombre AS nombre_cliente, reportes.maquina, reportes.fecha, reportes.turno, reportes.codigo, reportes.hora, reportes.id_cliente, reportes.num_rollo, reportes.op_opc, reportes.ancho_r, reportes.produccion, reportes.ancho_largo, reportes.observaciones, reportes.firma, reportes.id_operario FROM reportes INNER JOIN operarios ON reportes.id_operario = operarios.id_operario INNER JOIN clientes ON reportes.id_cliente = clientes.id_cliente WHERE `id_reporte` = '$id';");
while($data=$sql->fetch_object()){
?>

    <div class="content">
        <h2>Editar Reporte</h2>
        <form action="/reportes/controller/reports/edit_r.php" method="post">
    <div class="form-column">

    <div class="form-group">
            <label for="maquina">ID Reporte:</label>
            <input type="text" class="form-control" id="id_reporte" name="id_reporte" readonly value="<?= $data->id_reporte ?>">


        </div>

        <div class="form-group">
            <label for="operario">Operario:</label>
            <select class="form-control" id="operario" name="operario" required value="<?= $data->nombre ?>" >
                <option value="<?= $data->id_operario ?>"><?= $data->nombre ?></option>
                <?php
          
                include "../model/conexion.php";
                $sql = $conn->query("SELECT * FROM `operarios`");
                while ($datos = $sql->fetch_object()) {
                    ?>
                    <option value="<?= $datos->id_operario ?>"><?= $datos->nombre ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="maquina">Máquina:</label>
            <input type="text" class="form-control" id="maquina" name="maquina" required  value="<?= $data->maquina ?>">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select class="form-control" id="cliente" name="cliente" required values="<?= $datos->cliente?>">
            <option value="<?= $data->id_cliente ?>"><?= $data->nombre ?></option>
                <?php
                include "../model/conexion.php";
                $sql = $conn->query("SELECT * FROM `clientes`");
                while ($datos = $sql->fetch_object()) {
                    ?>
                    <option value="<?= $datos->id_cliente ?>"><?= $datos->nombre ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="num_rollo">Número de Rollo:</label>
            <input type="text" class="form-control" id="num_rollo" name="num_rollo" required value="<?= $data->num_rollo?>">
        </div>
        <div class="form-group">
            <label for="op_opc">OP/OPC:</label>
            <input type="text" class="form-control" id="op_opc" name="op_opc" required value="<?= $data->op_opc?>">
        </div>
        <div class="form-group">
            <label for="ancho_r">Ancho Rollo:</label>
            <input type="text" class="form-control" id="ancho_r" name="ancho_r" required value="<?= $data->ancho_r?>">
        </div>
        <div class="form-group">
            <label for="produccion">Producción:</label>
            <input type="text" class="form-control" id="produccion" name="produccion" required value="<?= $data->produccion?>">
        </div>
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required value="<?= $data->codigo?>">
        </div>
    </div>
    <div class="form-group">
        <label for="ancho_largo">Ancho Largo:</label>
        <input type="text" class="form-control" id="ancho_largo" name="ancho_largo" required value="<?= $data->ancho_largo?>">
    </div>
    <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="5" value="<?= $data->observaciones?>"><?= $data->observaciones?></textarea >
    </div>
    <div class="form-group">
        <label for="firma">Firma:</label>
        <input type="text" class="form-control" id="firma" name="firma" required value="<?= $data->firma?>">
    </div>
    <div class="form-group">
        <label for="turno">Turno:</label>
        <select class="form-control" id="turno" name="turno" required >
        <option value="<?= $data->turno ?>"><?= $data->turno ?></option>
            <option value="Turno2">Turno 1(6 am - 2 pm)</option>
            <option value="Turno2">Turno 2(2 pm - 10 pm)</option>
            <option value="Turno3">Turno 3( 10 pm - 6 am) </option>
        </select>
    </div>

    <?php
    }
        ?>
    <button type="submit" class="btn btn-primary">Actualizar Reporte</button>
</form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

