<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

//Recuperar datos de cabaña y arrendador
include("Backend\conection.php");
$idCabana = $_GET['idCabana'];
$cabana = mysqli_fetch_array(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE idCabana = '$idCabana'"));
$idArrendador = $cabana['Persona_idPersona'];
$arrendador = mysqli_fetch_array(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.persona WHERE idPersona = '$idArrendador'"));
mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="e">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS/Detalle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Leaflet-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title><?php echo $cabana['Titulo'] ?></title>
</head>

<body>
  <!-- Sumar vista a cabaña -->
  <?php
  $visitasCabana = $cabana['Visitas'] + 1;
  include("Backend\conection.php");
  $insertar = "UPDATE `nuevocabanasdb`.`cabana` SET `Visitas` = '$visitasCabana' WHERE (`idCabana` = '$idCabana');";
  mysqli_query($enlace, $insertar);
  mysqli_close($enlace);
  ?>

  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>

  <!-- Verificar mensaje -->
  <?php
  if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
  } else {
    $mensaje = "";
  }

  if ($mensaje != "") {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo ($mensaje) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
  }
  ?>

  <!--Mostrar mensaje admin-->
  <?php
  if (ComprobarSesión()) {
    if (ComprobarAdmin() == 1 && $cabana['Estado'] == 0) {
  ?>
      <div class="header bg-danger "> Esta cabaña está en revisión. ¿Desea aprobarla?<br>
        <input class="btn btn-dark  m-1" type="button" onclick="location.href='Backend/PublicarCabana.php?id=<?php echo $cabana['idCabana'] ?>'" value="Publicar">
        <input class="btn btn-dark  m-1" type="button" onclick="location.href='Backend/RechazarCabana.php?id=<?php echo $cabana['idCabana'] ?>'" value="Rechazar">
      </div>
  <?php
    }
  }
  ?>

  <!--Pagina cabaña-->
  <div class="container mt-3 bg-light border border-2 rounded border-warning">
    <div class="grid">
      <img class="grid-izquierdo" src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?>>

      <div class=griz-derecho>
        <div class="alert alert-primary" role="alert">
          <h4>Información de contacto</h4>
          <strong>Nombre: </strong>
          <?php echo $arrendador['Nombres'] ?>
          <?php echo $arrendador['Apellidos'] ?><br>
          <strong>Número telefónico: </strong>
          <?php echo $arrendador['Telefono'] ?><br>
          <strong>Correo electrónico: </strong>
          <?php echo $arrendador['Correo'] ?><br>
        </div>

        <!--Formulario Solicitud-->
        <form method="POST" action="Backend/IngresarSolicitud.php?idCabana=<?php echo ($idCabana) ?>">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Solicitud de Arrendamiento</label>
            <textarea class="form-control" placeholder="Ingrese los datos de su solicitud aquí." name="Mensaje" required></textarea>
            <div id="emailHelp" class="form-text">El mensaje se le enviará directamente al arrendador.</div>
            Fecha de Entrada:<input type="date" name = "FechaInicio"><br>
            Fecha de Salida:<input type="date" name = "FechaTermino">
          </div>
          <button type="submit" class="btn btn-primary">Enviar solicitud</button>
        </form>

      </div>
    </div>

    <h2 class="d-inline"><?php echo ($cabana["Titulo"] . " "); ?></h2><i class="fa-regular fa-eye d-inline"> </i><?php echo (" " . $visitasCabana) ?><br>

    <?php echo ($cabana["Descripcion"]); ?><br><br>

    <h4>Detalles</h4>
    <strong>Dirección:</strong>
    <?php echo ($cabana["Direccion"]); ?><br>
    <strong>Habitaciones:</strong>
    <?php echo ($cabana["NroPiezas"]); ?><br>
    <strong>Precio por día: </strong>$
    <?php echo number_format($cabana["Precio"]); ?><br><br>

    <h4>Extras y Características de la cabaña</h4>
    <?php
    if ($cabana["Wifi"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Wifi
        </label>
      </div>
    <?php
    }
    if ($cabana["Estacionamiento"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Estacionamiento
        </label>
      </div>
    <?php
    }
    if ($cabana["Quincho"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Quincho
        </label>
      </div>
    <?php
    }
    if ($cabana["Piscina"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Piscina
        </label>
      </div>
    <?php
    }
    if ($cabana["Bodega"]) {
    ?><div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Bodega
        </label>
      </div>
    <?php
    }
    if ($cabana["CalefaccionGas"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Calefaccion a Gas
        </label>
      </div>
    <?php
    }
    if ($cabana["CalefaccionElectrica"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Calefaccion Electrica
        </label>
      </div>
    <?php
    }
    if ($cabana["CombustionLenta"]) {
    ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="flexCheckCheckedDisabled">
          Combustion lenta
        </label>
      </div>
    <?php
    }
    ?><br><br>

    <!--Configurar mapa-->
    <?php
    $lat = $cabana["Latitud"];
    $lng = $cabana["Longitud"];
    ?>
    <div id="map"></div>

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
    <br>
    <div>
      <h3>comentarios</h3> <br>

      <?php

$conexion=mysqli_connect("localhost","root","","nuevocabanasdb"); 

$resultado= mysqli_query($conexion, "SELECT * FROM comentarios WHERE idCabana = '$idCabana'");

while($comentario = mysqli_fetch_object($resultado)){

    ?>

    <b><?php echo($comentario->nombre);  ?></b> (<?php echo  ($comentario->fecha); ?>): 
    <br />
    <?php echo ($comentario->comentario);?>
    <br />
    <hr />




    <?php
}

                                    ?>

    </div>
  </div>

  <!--Fontawesome-->
  <script src="https://kit.fontawesome.com/1e5f0e0661.js" crossorigin="anonymous"></script>
  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>