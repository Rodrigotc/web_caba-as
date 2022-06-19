<?php
//Iniciar SESSION
session_start();

//Recuperar cabañas
include("Backend\conection.php");
$resultado = mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE Estado = 0");
mysqli_close($enlace);
?>

<!--Html-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/Index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Web cabañas</title>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar-custom navbar fixed-top navbar-expand-lg bg-light">
        <div class="container-fluid">
            <img class="img-logo mx-auto" src="Imagenes/png-clipart-logo-icon-design-graphics-illustration-company-text.png" alt="logo">
        </div>
    </nav>

    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <div id="Cabaña">
            <img src="">
            <p>Ciudad:<?php echo ($fila["Ciudad"]); ?></p>
            <p>Descripcion:<?php echo ($fila["Descripcion"]); ?></p>
            <p>Precio:<?php echo ($fila["Precio"]); ?></p>
        </div>
    <?php
    }
    ?>
</body>