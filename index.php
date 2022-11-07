<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Owl Carousel-->
  <link rel="stylesheet" href="Extensiones/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="Extensiones/owlcarousel/owl.theme.default.min.css">
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>Cab Lagos</title>
</head>

<body>
  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>
  
  <main>
    <!--Cuadro de búsqueda-->
    <?php
    include("Colecciones/CuadroBusqueda.php");
    ?>

    <!--Carrusel de cards-->
    <h1 style="text-align:center; color:white;">Ciudades Principales</h1>
    <div class="owl-carousel owl-theme border-bottom">
      <div class="card card-body flex-fill">
        <img style="height:35vh" src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top " alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text" align = "justify">La ciudad de Puerto Montt, capital de la Región de Los Lagos, está ubicada en el extremo norte del seno de Reloncaví. Es el punto de inicio de la Carretera Austral y la puerta de entrada a la Patagonia norte y sur del país.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card card-body flex-fill">
        <img style="height:35vh" src="Imagenes/Osorno.jpg" class="card-img card-img-top" alt="Osorno-imagen">
        <div class=" card-body">
          <h5 class="card-title">Osorno</h5>
          <p class="card-text" align = "justify">Entre los disímiles atractivos que caracteriza a la comuna de Osorno se encuentra el Parque Nacional Puyehue, dotado éste de una vegetación colorida y aromática, de ríos, cascadas y el inigualable Volcán Osorno al que se puede acceder y excursionar de manera segura.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card card-body flex-fill">
        <img style="height:35vh" src="Imagenes/PuertoVaras.jpg" class="card-img card-img-top" alt="puertov-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto Varas</h5>
          <p class="card-text" align = "justify">Puerto vara es considerada una de las ciudades mas lindas de Chile y está ubicada en la región de los lagos, fue creada a partid de la colonización alemana y construyeron la ciudad a las orillas del lago Llanquihue.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card card-body flex-fill">
        <img style="height:35vh" src="Imagenes/Frutillar.jpg" class="card-img card-img-top" alt="Frutillar-imagen">
        <div class=" card-body">
          <h5 class="card-title">Frutillar</h5>
          <p class="card-text" align = "justify">Frutillar se caracteriza por las vistas a los volcanes y a la ribera de la bahía junto al horizonte del gran lago Llanquihue. Es conocida por las tradiciones alemanas de sus fundadores y de las Semanas Musicales de Frutillar.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card card-body flex-fill">
        <img style="height:35vh" src="Imagenes/castro.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Castro</h5>
          <p class="card-text" align = "justify">Castro es la capital provincial de Chiloé, cuenta con una hermosa arquitectura, como lo son los palafitos y la iglesia San Francisco que fue declarada Patrimonio de la Humanidad. Otros atractivos son el Parque Nacional Chiloé o la Feria Artesanal de Castro, el Museo de Arte Contemporáneo de Chiloé</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
    </div>

    <img src="Imagenes/PuertoMontt.jpg" alt="Cosa" style="width: 100%; border-radius: 1%; margin-top: 20px">

  </main>

  <!--Footer-->
  <?php
  include("Colecciones/Footer.php");
  ?>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <!--Owl Carousel-->
  <script src="Extensiones/owlcarousel/jquery.min.js"></script>
  <script src="Extensiones/owlcarousel/owl.carousel.min.js"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      nav: true,
      autoplay: true,
      margin: 1,
      responsiveClass: false,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        750: {
          items: 2
        },
        1150: {
          items: 3
        }
      }
    })
  </script>
</body>

</html>