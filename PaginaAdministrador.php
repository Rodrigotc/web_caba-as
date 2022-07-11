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
    <link rel="stylesheet" href="css/PaginaAdministrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Página Administrador</title>
</head>

<body>
    <!-- NavBar -->
    <?php
    include("Colecciones/NavBar.php");
    ?>

<div class="wrapper">
	<div class="header">Cabañas sin publicar</div>

	<div class="cards_wrap">
		
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
        $id = $fila["idCabana"];
    ?>
<div class="card ho">
      <a class="link" href="PaginaCabana.php?idCabana=<?php echo $id ?>" id="Cabaña">
        <img src=<?php echo "Fotos_Cabanas/" . $fila["idCabana"] . ".jpg"; ?> class="card-img-top" alt="imgcab">
        <div class="card-body">
          <h5 class="card-title">Cabaña en: <?php echo ($fila["Ciudad"]); ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">ID Cabaña: <?php echo ($fila["idCabana"]); ?></li>
          <li class="list-group-item">Dirección: <?php echo ($fila["Direccion"]); ?></li>
          <li class="list-group-item">Precio: <?php echo ($fila["Precio"]); ?></li>
        </ul>
      </a>
     
    </div>

        <?php
    }
    ?>
	
	</div>
</div>  </a>


   


</body>