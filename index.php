<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS\index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Cab Lagos</title>
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

  <main>
    <div class="buscador-inicio">
      <div class="formulario-busqueda">
        <form class="formulario" action="">
          <input placeholder="Holaa" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="datetime-local" name="a" id="">
          <input type="submit" value="Buscar">
        </form>
      </div>
    </div>

    <!--Cards Ciudades-->
    <div class="lista-cards">
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Puerto Montt es una ciudad y comuna de la zona sur de Chile, capital de la provincia de Llanquihue y de la Región de Los Lagos. Se encuentra en frente al seno de Reloncaví y posee una población urbana y rural de 245 902 habitantes.4​ Limita al norte con Puerto Varas, al este con Cochamó, al suroeste con Calbuco y al oeste con Maullín y Los Muermos. Junto con Alerce y Puerto Varas y Llanquihue, forma el Área Metropolitana de Puerto Montt que según el censo de 2017 supera los 308.071 habitantes.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/Osorno.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Osorno</h5>
          <p class="card-text">Osorno es una ciudad y comuna de la zona sur de Chile, capital de la provincia de Osorno, en la Región de Los Lagos.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoVaras.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto Varas</h5>
          <p class="card-text">Puerto Varas es una ciudad y comuna de la zona sur de Chile, ubicada en la provincia de Llanquihue (región de Los Lagos) perteneciente al Área Metropolitana de Puerto Montt, en conjunto con la comuna homónima y la comuna de Llanquihue. Fue creada a partir de la colonización alemana con inmigrantes que se asentaron a orillas del lago Llanquihue entre los años 1852 y 1853.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/Frutillar.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Frutillar</h5>
          <p class="card-text">Frutillar es una comuna ubicada en la bahía oeste del lago Llanquihue, en la región de Los Lagos, en la zona sur de Chile. Se caracteriza por las vistas a los volcanes y a la ribera de la bahía junto al horizonte del gran lago Llanquihue. Es conocida por las tradiciones alemanas de sus fundadores y de las Semanas Musicales de Frutillar. Gracias a este festival y al Teatro del Lago la ciudad se ha convertido en la capital de la música en Chile. También se han incorporado otras actividades desde 1996 con la creación del primer club de yates del lago Llanquihue Cofradía Náutica de Frutillar, gracias a su actividad náutica hoy cuenta con un respetado prestigio en la navegación a vela del país, alternando las regatas en el lago cada año con la regata de Chiloe. En el año 2012 se incorporó la primera cancha de golf Nicklaus PGA Club de Golf Patagonia Virgin Frutillar. Así, la bahía de Frutillar complementa una diversificada gama de actividades que incluyen música, artes, pesca-casa deportiva, navegación a vela y golf.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
    </div>

    <!--Footer-->
    <footer>
      <div class="footer">
        <h4>Footer </h4>

      </div>
    </footer>
  </main>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>