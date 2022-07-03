<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

//Verificar si hay una sesión iniciada
include("Backend/VerificarSesionIniciada.php");

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
    <link rel="stylesheet" href="CSS/PaginaAdministrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Página Administrador</title>
</head>

<body>
    <!-- NavBar -->
    <?php
    include("Colecciones/NavBar.php");
    ?>


    <!-- Mostrar Cabañas con solicitud -->
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
        $id = $fila["idCabana"];
    ?>
        <a class="btn-Cabana" href="PaginaCabana.php?idCabana=<?php echo $id ?>" id="Cabaña">
            <img class="img-cabana" src=<?php echo "Fotos_Cabanas/" . $fila["idCabana"] . ".jpg"; ?> width="250" height="200">
            <p>ID Cabaña: <?php echo ($fila["idCabana"]); ?></p>
            <p>Ciudad: <?php echo ($fila["Ciudad"]); ?></p>
            <p>Dirección: <?php echo ($fila["Direccion"]); ?></p>
            <p>Precio: <?php echo ($fila["Precio"]); ?></p>
        </a>
    <?php
    }
    ?>
</body>