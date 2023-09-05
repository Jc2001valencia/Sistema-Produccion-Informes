<!DOCTYPE html>
<html>
<head>
    <title>Operario - Crear Reporte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 60px;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }
        .content {
            margin-top: 80px;
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Operario</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="crear_reportes.php">Crear Reporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php">Reportes</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="../controller/logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <h2>Crear Reporte</h2>
        <form action="/reportes/controller/reports/crear_reporte.php" method="post">
    <div class="form-column">
        <div class="form-group">
            <label for="operario">Operario:</label>
            <select class="form-control" id="operario" name="operario" required>
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
            <input type="text" class="form-control" id="maquina" name="maquina" required>
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select class="form-control" id="cliente" name="cliente" required>
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
            <input type="text" class="form-control" id="num_rollo" name="num_rollo" required>
        </div>
        <div class="form-group">
            <label for="op_opc">OP/OPC:</label>
            <input type="text" class="form-control" id="op_opc" name="op_opc" required>
        </div>
        <div class="form-group">
            <label for="ancho_r">Ancho Rollo:</label>
            <input type="text" class="form-control" id="ancho_r" name="ancho_r" required>
        </div>
        <div class="form-group">
            <label for="produccion">Producción:</label>
            <input type="text" class="form-control" id="produccion" name="produccion" required>
        </div>
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required>
        </div>
    </div>
    <div class="form-group">
        <label for="ancho_largo">Ancho Largo:</label>
        <input type="text" class="form-control" id="ancho_largo" name="ancho_largo" required>
    </div>
    <div class="form-group">
        <label for="observaciones">Observaciones:</label>
        <textarea class="form-control" id="observaciones" name="observaciones" rows="5" ></textarea>
    </div>
    <div class="form-group">
        <label for="firma">Firma:</label>
        <input type="text" class="form-control" id="firma" name="firma" required>
    </div>
    <div class="form-group">
        <label for="turno">Turno:</label>
        <select class="form-control" id="turno" name="turno" required>
            <option value="Turno2">Turno 1(6 am - 2 pm)</option>
            <option value="Turno2">Turno 2(2 pm - 10 pm)</option>
            <option value="Turno3">Turno 3( 10 pm - 6 am) </option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Reporte</button>
</form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


