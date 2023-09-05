<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6da46d7f52.js" crossorigin="anonymous"></script>
</head>
<body>

<h1 class="text-center p-3">MODIFICAR</h1>

<div class="container-fluid row">
    <!-- formulario -->
    <form class="col-4 p-2 m-auto" method="POST" action="/reportes/controller/operators/edit_op.php">
 
        <?php
        include "../model/conexion.php";

        $id = $_GET["id"];

        $sql = $conn->query("SELECT * FROM `operarios` WHERE id_operario = $id");

        if ($data = $sql->fetch_object()) {
        ?>
        <h2 class="text-center text-secondary">Modificar Registro de Operario</h2>

        <input type="hidden" class="form-control" name="id_p" value="<?= $_GET["id"] ?>">
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data->nombre ?>">
        </div>
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" value="<?= $data->documento ?>">
        </div>
        <div class="form-group">
            <label for="sueldo">Sueldo:</label>
            <input type="text" class="form-control" id="sueldo" name="sueldo" value="<?= $data->salario ?>">
        </div>
        <?php
        }
        ?>
        <br>
        <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Modificar</button>
        <a href="./panel_admin_operario.php" class="btn btn-secondary">Volver</a>
    </form>
</div>

</body>
</html>
