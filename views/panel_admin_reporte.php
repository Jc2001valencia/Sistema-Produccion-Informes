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
            margin-top: 20px; /* Añadido para separar el contenido del sidebar */
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

    <div class="container content" style=" padding: 2rem;"> <!-- Añadida la clase "content" al contenedor principal -->
        <h1>Reportes</h1>

        <table class="table">
        <thead>
                    <tr>
                        
                        <th>Operario (Nombre Comppleto)</th>
                        <th>Máquina</th>
                        <th>Fecha</th>
                        <th>Turno</th>
                        <th>Código</th>
                        <th>Hora</th>
                        <th>Cliente</th>
                        <th>Número de Rollo</th>
                        <th>OP/OPC</th>
                        <th>Ancho Rollo</th>
                        <th>Producción</th>
                        <th>Ancho Largo</th>
                        <th>Observaciones</th>
                        <th>Firma</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se insertan los datos de los reportes desde el backend -->

                    <?php
session_start();
        include "../model/conexion.php";
        $sql=$conn->query("
        SELECT reportes.id_reporte, operarios.nombre, clientes.nombre AS nombre_cliente, reportes.maquina, reportes.fecha, reportes.turno, reportes.codigo, reportes.hora, reportes.id_cliente, reportes.num_rollo, reportes.op_opc, reportes.ancho_r, reportes.produccion, reportes.ancho_largo, reportes.observaciones, reportes.firma, reportes.id_operario FROM reportes INNER JOIN operarios ON reportes.id_operario = operarios.id_operario INNER JOIN clientes ON reportes.id_cliente = clientes.id_cliente;");
        while($datos=$sql->fetch_object()){
        ?>
                    <tr>
                        
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->maquina ?></td>
                        <td><?= $datos->fecha ?></td>
                        <td><?= $datos->turno ?></td>
                        <td><?= $datos->codigo ?></td>
                        <td><?= $datos->hora ?></td>
                        <td><?= $datos->nombre_cliente ?></td>
                        <td><?= $datos->num_rollo ?></td>
                        <td><?= $datos->op_opc ?></td>
                        <td><?= $datos->ancho_r ?></td>
                        <td><?= $datos->produccion ?></td>
                        <td><?= $datos->ancho_largo ?></td>
                        <td><?= $datos->observaciones ?></td>
                        <td><?= $datos->firma ?></td>
                        <td>
        <a href="form_edit_r.php ?id=<?= $datos->id_reporte?>" class="btn btn-small btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a>
                           
        <!-- Botón para eliminar la cotización -->
        <a href="../controller/reports/delete_r.php ?id=<?= $datos->id_reporte?>" class="btn btn-small btn-danger">
                 <i class="fa-solid fa-trash"></i>
             </a>
        </td>
                        </tr>
                        <?php
}
    ?>
                </tbody>
        </table>

        <div class="export-buttons">
        <a href="../Libraries/fpdf/export_pdf.php" target="_blank" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
</svg> Exportar a PDF</a>



 <a href="../controller/export_excel.php" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xls" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM6.472 15.29a1.176 1.176 0 0 1-.111-.449h.765a.578.578 0 0 0 .254.384c.07.049.154.087.25.114.095.028.202.041.319.041.164 0 .302-.023.413-.07a.559.559 0 0 0 .255-.193.507.507 0 0 0 .085-.29.387.387 0 0 0-.153-.326c-.101-.08-.255-.144-.462-.193l-.619-.143a1.72 1.72 0 0 1-.539-.214 1.001 1.001 0 0 1-.351-.367 1.068 1.068 0 0 1-.123-.524c0-.244.063-.457.19-.639.127-.181.303-.322.527-.422.225-.1.484-.149.777-.149.305 0 .564.05.78.152.216.102.383.239.5.41.12.17.186.359.2.566h-.75a.56.56 0 0 0-.12-.258.625.625 0 0 0-.247-.181.923.923 0 0 0-.369-.068c-.217 0-.388.05-.513.152a.472.472 0 0 0-.184.384c0 .121.048.22.143.3a.97.97 0 0 0 .405.175l.62.143c.217.05.406.12.566.211a1 1 0 0 1 .375.358c.09.148.135.335.135.56 0 .247-.063.466-.188.656a1.216 1.216 0 0 1-.539.439c-.234.105-.52.158-.858.158-.254 0-.476-.03-.665-.09a1.404 1.404 0 0 1-.478-.252 1.13 1.13 0 0 1-.29-.375Zm-2.945-3.358h-.893L1.81 13.37h-.036l-.832-1.438h-.93l1.227 1.983L0 15.931h.861l.853-1.415h.035l.85 1.415h.908L2.253 13.94l1.274-2.007Zm2.727 3.325H4.557v-3.325h-.79v4h2.487v-.675Z"/>
</svg>Exportar a Excel</a>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

