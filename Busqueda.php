<?php
//////Inicializar SESSION y funciones//////
include("Backend/FuncionesSesion.php");

//////Funciones//////
//Comprobar GET///
function ComprobarGet($campo)
{
  $resultado = "";
  if (isset($_GET[$campo])) {
    $resultado = trim($_GET[$campo]);
  }
  return $resultado;
}
//Filtrar cabañas//
function filtrarCabanas()
{
  //Definir variables
  $query = "SELECT * FROM nuevocabanasdb.cabana Where Estado = '1' ";

  //Recibir datos GET
  $Ciudad               = $_GET["Ciudad"];
  $Wifi                 = ComprobarGet("Wifi");
  $Estacionamiento      = ComprobarGet("Estacionamiento");
  $Quincho              = ComprobarGet("Quincho");
  $Piscina              = ComprobarGet("Piscina");
  $Bodega               = ComprobarGet("Bodega");
  $CalefaccionGas       = ComprobarGet("CalefaccionGas");
  $CalefaccionElectrica = ComprobarGet("CalefaccionElectrica");
  $CalefaccionLenta     = ComprobarGet("CalefaccionLenta");

  //Filtros de búsqueda
  if ($Ciudad != "") {
    $query .= "AND Ciudad = '$Ciudad' ";
  }
  if ($Wifi != "") {
    $query .= "AND Wifi = '1' ";
  }
  if ($Estacionamiento != "") {
    $query .= "AND Estacionamiento = '1' ";
  }
  if ($Quincho != "") {
    $query .= "AND Quincho = '1' ";
  }
  if ($Piscina != "") {
    $query .= "AND Piscina = '1' ";
  }
  if ($Bodega != "") {
    $query .= "AND Bodega = '1' ";
  }
  if ($CalefaccionGas != "") {
    $query .= "AND CalefaccionGas = '1' ";
  }
  if ($CalefaccionElectrica != "") {
    $query .= "AND CalefaccionElectrica = '1' ";
  }
  if ($CalefaccionLenta != "") {
    $query .= "AND CombustionLenta = '1' ";
  }

  //Retornar query
  return $query;
}

//Mostrar cabañas//
function mostrarCabana()
{
  //Recuperar query
  $query = filtrarCabanas();

  //Mostrar las cabañas filtradas
  include("Backend\conection.php");
  $resultado = mysqli_query($enlace, $query);
  mysqli_close($enlace);

  //Definir variables
  $count = 0;

  while ($cabana = mysqli_fetch_array($resultado)) {
    $count = $count + 1;
?>
    <div class="card ho">
      <a class="link" href="PaginaCabana.php?idCabana=<?php echo $cabana['idCabana'] ?>">
        <img src="Fotos_Cabanas/<?php echo $cabana['idCabana']; ?>.jpg" class="card-img-top" alt="imgcab">
        <div class="card-body">
          <h5 class="card-title"><?php echo $cabana['Ciudad']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Nro de Piezas: <br><?php echo $cabana['NroPiezas']; ?></li>
          <li class="list-group-item">Dirección: <br><?php echo $cabana['Direccion']; ?></li>
          <li class="list-group-item">Precio por día: <br><?php echo "$" . number_format($cabana['Precio']); ?></li>
        </ul>
      </a>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button" onclick="map.flyTo(<?php echo '[' . $cabana['Latitud'] . ',' . $cabana['Longitud'] . ']' ?>, 18, {duration: 2.5})">Ir a ubicación</button>
      </div>
    </div>
  <?php
  }
  //Mostrar mensaje si no hay cabañas
  if ($count == 0) {
    echo "No se encuentran cabañas con los filtros seleccionados.";
  }
  ?>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <?php
}

//Agregar marcadores//
function agregarMarcadores()
{
  //Recuperar query
  $query = filtrarCabanas();

  //Hacer consulta a DB
  include("Backend\conection.php");
  $resultado = mysqli_query($enlace, $query);
  mysqli_close($enlace);

  //Agregar todos los marcadores
  while ($cabana = mysqli_fetch_array($resultado)) {
  ?>
    <script>
      L.marker([<?php echo $cabana['Latitud'] ?>, <?php echo $cabana['Longitud'] ?>], {
        icon: customIcon
      }).addTo(map);
    </script>
<?php
  }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/Busqueda.css">
  <!--Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Leaflet-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>Búsqueda</title>
</head>

<body>
  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>
  <!-- Main -->
  <main>
    <!-- Cuadro de búsqueda -->
    <?php
    include("Colecciones/CuadroBusqueda.php");
    ?>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Cabañas y mapa</a>
      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cabañas</a>
    </div>

    <!--Mostrar cabañas y mapa-->
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row" style="--bs-gutter-x: 0rem;">
          <div class="col scroll">
            <div class="card-bsq-2">
              <?php
              mostrarCabana();
              ?>
            </div>
          </div>

          <div class="col mapa">
            <div id="map"></div>
            <style>
              #map {
                width: 100%;
                height: 100%;
              }
            </style>
            <script>
              //Definir coordenadas de mapa
              switch ("<?php echo $_GET["Ciudad"] ?>") {
                case "Ancud":
                  var lat = -41.8707;
                  var lng = -73.81622;
                  var zoom = 14;
                  break;
                case "Calbuco":
                  var lat = -41.7667;
                  var lng = -73.1533;
                  var zoom = 14;
                  break;
                case "Castro":
                  var lat = -42.4721;
                  var lng = -73.77319;
                  var zoom = 14;
                  break;
                case "Chaitén":
                  var lat = -42.91996;
                  var lng = -72.70632;
                  var zoom = 15;
                  break;
                case "Chonchi":
                  var lat = -42.62387;
                  var lng = -73.775;
                  var zoom = 15;
                  break;
                case "Cochamó":
                  var lat = -41.487;
                  var lng = -72.307667;
                  var zoom = 15;
                  break;
                case "Curaco de Vélez":
                  var lat = -42.438438;
                  var lng = -73.598901;
                  var zoom = 16;
                  break;
                case "Dalcahue":
                  var lat = -42.372478;
                  var lng = -73.657047;
                  var zoom = 15;
                  break;
                case "Fresia":
                  var lat = -41.1531;
                  var lng = -73.4306;
                  var zoom = 14;
                  break;
                case "Frutillar":
                  var lat = -41.1167;
                  var lng = -73.05;
                  var zoom = 14;
                  break;
                case "Futaleufú":
                  var lat = -43.1833;
                  var lng = -71.8667;
                  var zoom = 15;
                  break;
                case "Llanquihue":
                  var lat = -41.2581;
                  var lng = -73.0086;
                  var zoom = 15;
                  break;
                case "Los Muermos":
                  var lat = -41.4;
                  var lng = -73.46;
                  var zoom = 14;
                  break;
                case "Maullín":
                  var lat = -41.6167;
                  var lng = -73.6;
                  var zoom = 15;
                  break;
                case "Osorno":
                  var lat = -40.5725;
                  var lng = -73.1353;
                  var zoom = 13;
                  break;
                case "Palena":
                  var lat = -43.6178;
                  var lng = -71.8039;
                  var zoom = 15;
                  break;
                case "Puerto Montt":
                  var lat = -41.4693;
                  var lng = -72.94237;
                  var zoom = 13;
                  break;
                case "Puerto Octay":
                  var lat = -40.971806;
                  var lng = -72.884410;
                  var zoom = 15;
                  break;
                case "Puerto Varas":
                  var lat = -41.3167;
                  var lng = -72.9833;
                  var zoom = 13;
                  break;
                default:
                  var lat = -41.7500000;
                  var lng = -73.0000000;
                  var zoom = 8;
              }

              //configurar mapa
              var map = L.map('map', {
                closePopupOnClick: false
              }).setView([lat, lng], zoom);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              //Cambiar ícono de amrcador
              var customIcon = new L.Icon({
                iconUrl: 'Imagenes/Marcador.png',
                iconSize: [50, 50],
                iconAnchor: [25, 50]
              });
            </script>
            <?php
            agregarMarcadores();
            ?>
          </div>
        </div>
      </div>

      <!--Mostrar solo cabañas-->
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="card-bsq">
          <?php
          mostrarCabana();
          ?>
        </div>
      </div>
    </div>

  </main>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>