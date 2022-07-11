<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

//Recuperar datos cabana
include("Backend\conection.php");
$idCabana = $_GET['idCabana'];
$cabana = mysqli_fetch_array(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE idCabana = '$idCabana'"));
mysqli_close($enlace);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

 <!--Leaflet-->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
  
  <title>Detalle</title>
</head>
<body>

<!-- NavBar -->
<?php
  include("Colecciones/NavBar.php");
  ?>



<div class="container mt-3">
 
<div class="container-fluid ">
  <div class="row content">
    <div class="col-sm-3 sidenav me-1">
    <h2>Cabaña ubicada en <?php echo ($cabana["Ciudad"]); ?><br></h2>
  
    
    <div class="alert alert-primary" role="alert">
    Dirección: <?php echo ($cabana["Direccion"]); ?><br>
</div>
  
<div class="alert alert-primary" role="alert"> 
  Precio por día: $<?php echo number_format($cabana["Precio"]); ?>
</div>
 

<h4>Descripción</h4>
  <?php echo ($cabana["Descripcion"]); ?>

  <h4>Extras y Características de la cabaña</h4>
  <?php
  if ($cabana["Wifi"]) {
    echo '<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
    <label class="form-check-label" for="flexCheckCheckedDisabled">
     Wifi
    </label>
  </div>'; ?><?php
                        }
                        if ($cabana["Estacionamiento"]) {
                          echo '<div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                          <label class="form-check-label" for="flexCheckCheckedDisabled">
                           Estacionamiento
                          </label>
                        </div>'; ?><?php
                                  }
                                  if ($cabana["Quincho"]) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                     Quincho
                                    </label>
                                  </div>'; ?><?php
                                  }
                                  if ($cabana["Piscina"]) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                     Piscina
                                    </label>
                                  </div>'; ?><?php
                                  }
                                  if ($cabana["Bodega"]) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                     Bodega
                                    </label>
                                  </div>'; ?><?php
                                  }
                                  if ($cabana["CalefaccionGas"]) {
                                    echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                     Calefaccion a Gas
                                    </label>
                                  </div>'; ?><?php
                                    }
                                    if ($cabana["CalefaccionElectrica"]) {
                                      echo '<div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                      <label class="form-check-label" for="flexCheckCheckedDisabled">
                                       Calefaccion Electrica
                                      </label>
                                    </div>'; ?><?php
                                        }
                                        if ($cabana["CombustionLenta"]) {
                                          echo '<div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                          <label class="form-check-label" for="flexCheckCheckedDisabled">
                                           Combustion lenta
                                          </label>
                                        </div>'; ?><?php
                                        }
                                    ?>
  </div>

    <div class="col-sm-6">
    <img class="img-cabana" src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?> style="width:100%; height:40vh; margin:3px ">
      
      <div class="row ">
    
      <?php
  $lat = $cabana["Latitud"];
  $lng = $cabana["Longitud"];
  ?>

  <!--Configurar mapa-->
  <div  style="width:96%;  height:40vh; margin:1rem" id="map"></div>
 

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
    </div>
    </div>
  </div>
</div>

</div>









   <!--Boostrap-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>