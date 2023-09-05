<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Panel de Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/6da46d7f52.js" crossorigin="anonymous"></script>
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
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
        }
        .sidebar ul li a:hover {
            color: #007bff;
        }
        .form-container {
            padding: 20px;
            background-color: #f8f9fa;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="../controller/logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
    <ul>
            <li>
                <a href="panel_admin_reporte.php">Reportes</a>
            </li>
            <li>
                <a href="panel_admin_operario.php">Operarios</a>
            </li>
            <li>
                <a href="panel_admin_cliente.php">Clientes</a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Clientes</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo Cliente</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Aquí se insertan los datos de los reportes desde el backend -->

                    <?php

        include "../model/conexion.php";
        $sql=$conn->query("SELECT * FROM `clientes`");
        while($datos=$sql->fetch_object()){
        ?>
                    <tr>
                        
                        <td><?= $datos->id_cliente ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->tipo_cliente ?></td>
                       
                       
                        <td>
                        <a href="form_edit_c.php ?id=<?= $datos->id_cliente?>" class="btn btn-small btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                           
                    
                           <a href="../controller/clients/delete_c.php ?id=<?= $datos->id_cliente?>" class="btn btn-small btn-danger">
                                   <i class="fa-solid fa-trash"></i>
                               </a>
        </td>
                        </tr>
                        <?php
}
    ?>
                </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="form-container">
                    <h3>Crear Cliente</h3>
                    <form action="/reportes/controller/clients/add_c.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                        <label for="cliente"> Tipo Cliente:</label>
                        <select class="form-control" id="cliente" name="cliente">
                        <option value="A">A</option>
                         <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            </form>
                </div>
     </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>