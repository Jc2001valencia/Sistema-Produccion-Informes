<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-form {
            width: 300px;
            margin: 0 auto;
            margin-top: 150px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
        }
        .login-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form action="controller/login.php" method="post">
            <h2 class="text-center">Iniciar sesión</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"  name="contrasena" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
