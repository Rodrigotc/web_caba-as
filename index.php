<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="aaa.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web cabañas</title>
</head>
<body>
    <h2>Página web </h2>
    <a href="./Registro.php">Registrar Usuario</a></br>
    <a href="./InicioSesion.php">Iniciar sesión</a></br>
    <?php
    session_start();
        echo "Sesión actual: ", $_SESSION['nombre'];?></br><?php
        echo "Rut: ", $_SESSION['rut'];
    ?>
</body>
</html>