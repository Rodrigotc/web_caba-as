<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS\Index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Owl Carousel-->
  <link rel="stylesheet" href="Extensiones/owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="Extensiones/owlcarousel/owl.theme.default.min.css">
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>CabLagos</title>
</head>

<body style="background-color: rgba(250,250,222,255);">
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
    <h1>Ciudades Principales</h1>
    <div class="owl-carousel owl-theme">
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Osorno</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto Varas</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Frutillar</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Frutillar</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card">
        <img src="Imagenes/PuertoMontt.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Frutillar</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam dui, rutrum quis tincidunt in, vulputate a dui. Ut orci leo, dictum ac libero in, vulputate consectetur ante.</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
    </div>

    <img class = "img-prueba" src="Imagenes/puerto-img.jpg">

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
      responsiveClass: true,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        700: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    })
  </script>

</body>

</html>