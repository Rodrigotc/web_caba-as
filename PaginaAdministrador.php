<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

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
    <title>Web cabañas</title>
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CabLagos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                    if (ComprobarSesión()) {
                    ?>
                        <!--Sesión Iniciada-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="IngresoCabana.php">Publicar Cabaña</a>
                        </li>
                        <?php
                        if (ComprobarAdmin()) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="PaginaAdministrador.php">Página Administrador</a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Backend/CerrarSesion.php">Cerrar Sesión</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <!--Sesión Cerrada-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Registro.php">Crear Cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="InicioSesion.php">Iniciar Sesión</a>
                        <?php
                    }
                        ?>
                        </li>
            </div>
        </div>
    </nav>

    <!-- Mostrar Cabañas con solicitud -->
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
        <a class="btn-Cabana" href="#" id="Cabaña">
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