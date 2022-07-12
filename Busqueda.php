<?php
//////Inicializar SESSION y funciones//////
include("Backend/FuncionesSesion.php");

//////Funciones//////
//Filtrar cabañas//
function filtrarCabanas()
{
  //Definir variables
  $query = "SELECT * FROM nuevocabanasdb.cabana Where Estado = '1' ";

  //Recibir datos GET
  $Ciudad = $_GET["Ciudad"];

  //Filtros de búsqueda
  if ($Ciudad != "") {
    $query .= "AND Ciudad = '$Ciudad' ";
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
      <a class="link" href="zdetalle.php?idCabana=<?php echo $cabana['idCabana'] ?>">
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
  //place
  ?>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <div class="card item" style="width: 14rem;"></div>
  <?php
  return $count;
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
      L.marker([<?php echo $cabana['Latitud'] ?>, <?php echo $cabana['Longitud'] ?>]).addTo(map);
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
  <link rel="stylesheet" href="css/Busqueda.css">
  <!--Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Leaflet-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  <title>Búsqueda</title>
</head>

<body style="background-image: url('Imagenes/fondo_azul.jpg');">
  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>

  <!-- Cuadro de búsqueda -->
  <?php
  include("Colecciones/CuadroBusqueda.php");
  ?>

  <!-- Main -->
  <main>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="bg-light nav-item nav-link active border  border-warning" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Cabañas y mapa</a>
      <a class="bg-light nav-item nav-link ms-1 border  border-warning" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cabañas</a>
    </div>

    <!--Mostrar solo cabañas-->
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="row" style="--bs-gutter-x: 0rem;">
          <div class="col scroll">
            <div class="card-bsq-2">
              <?php
               $count = mostrarCabana();
              if ($count == 0) {
                ?>
                <img src="Imagenes/advertencia.png" width="80%" alt="">
              <?php } 
              ?>
            </div>
          </div>

          <div class="col mapa">
            <div id="map"></div>
            <style>
              #map {
                width: 100%;
                height: 100vh;
              }
            </style>
            <script>
              //Bajar pantalla
              //window.scrollTo(0, document.body.scrollHeight);
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
                case "Puerto Montt":
                  var lat = -41.4693;
                  var lng = -72.94237;
                  var zoom = 13;
                  break;
                default:
                  var lat = -41.7500000;
                  var lng = -73.0000000;
                  var zoom = 8;
              }
              var map = L.map('map', {
                closePopupOnClick: false
              }).setView([lat, lng], zoom);
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);
            </script>
            <?php
            
            agregarMarcadores();
            ?>
          </div>
        </div>
      </div>

      <!--Mostrar cabañas y mapa-->
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="card-bsq">
          <?php
          
          $count = mostrarCabana();
         if ($count == 0) {
           ?>
           <img src="Imagenes/advertencia.png" width="50%" alt="">
         <?php } 
         ?>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>