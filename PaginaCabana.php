<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

//Recuperar datos cabana
include("Backend\conection.php");
$idCabana = $_GET['idCabana'];
$cabana = mysqli_fetch_array(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE idCabana = '$idCabana'"));
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
    <!--Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Página Cabaña</title>
</head>

<body>
    <!-- NavBar -->
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">CabLagos</a>
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
              <a class="nav-link active" href="IngresoCabana.php">Publicar Cabaña</a>
            </li>
            <?php
            if (ComprobarAdmin()) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href = "PaginaAdministrador.php">Página Administrador</a>
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

    <!--Mostrar mensaje admin-->
    <?php
    if($_SESSION['administrador'] == 1 && $cabana['Estado'] == 0){
    ?>
    <div>
        Esta cabaña está en revisión. ¿Desea aprobarla?<br>
        <input type="button" onclick = "location.href='Backend/PublicarCabana.php?id=<?php echo $cabana['idCabana']?>'" value = "Publicar">
        <input type="button" onclick = "location.href='Backend/RechazarCabana.php?id=<?php echo $cabana['idCabana']?>'" value = "Rechazar">
    </div>
    <?php
    }
    ?>

    <!--Definir Cabaña-->
    <img class="img-cabana" src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?> width="600" height="400">
    <?php
    $lat = $cabana["Latitud"];
    $lng = $cabana["Longitud"];
    ?>

    <!--Configurar mapa-->
    <div id="map"></div>
    <style>
        #map {
            width: 600px;
            height: 400px;
        }
    </style>

    <script>
        //Mostrar mapa
        var map = L.map('map').setView([<?php echo $lat ?>, <?php echo $lng ?>], 18);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        //Agregar marcador
        L.marker([<?php echo $lat ?>, <?php echo $lng ?>]).addTo(map)
            .bindPopup('<?php echo $cabana['Direccion'] ?>')
            .openPopup();
    </script>

    <!--Mostrar datos-->
    <h2>Información</h2>
    Ciudad: <?php echo ($cabana["Ciudad"]); ?><br>
    Dirección: <?php echo ($cabana["Direccion"]); ?><br>
    Precio por día: $<?php echo number_format($cabana["Precio"]); ?>

    <h2>Descripción</h2>
    <?php echo ($cabana["Descripcion"]); ?>

    <h2>Características</h2>
    <?php
    if($cabana["Wifi"]){
        echo "Wifi";?><br><?php 
    }
    if($cabana["Estacionamiento"]){
        echo "Estacionamiento";?><br><?php 
    }
    if($cabana["Quincho"]){
        echo "Quincho";?><br><?php 
    }
    if($cabana["Piscina"]){
    }
    if($cabana["Bodega"]){
        echo "Bodega";?><br><?php 
    }
    if($cabana["CalefaccionGas"]){
        echo "Calefacción a gas";?><br><?php 
    }
    if($cabana["CalefaccionElectrica"]){
        echo "Calefacción eléctrica";?><br><?php 
    }
    if($cabana["CombustionLenta"]){
        echo "Combustón lenta";?><br><?php 
    }
    ?>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>