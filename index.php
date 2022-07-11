<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/Index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Cab Lagos</title>
</head>

<body style="
    background-color: #020929;">
  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>
<main>
  <!--Cuadro de búsqueda-->
  <?php
  include("Colecciones/CuadroBusqueda.php");
  ?>

  <!--Cards Ciudades-->
 
  <div class="container border-bottom"><br>
      <h3  style="color: white; text-align:center;">Principales ciudades de la region de los lagos</h3>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3  ">
        
      <div class="col">
          <div class="card shadow-sm">
           
          <img class="card-img" src="Imagenes/PuertoMontt.jpg" alt="Puerto_montt">
            <div class="card-body">
              <h5>Puerto montt</h5>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla similique iste eaque nihil nam sapiente rerum cum. Aliquam, recusandae. Eos, possimus aspernatur sint consequuntur totam magnam inventore voluptas ex aut?</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="button">Buscar cabañas en Puerto Montt</button>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            
          <img class="card-img" src="Imagenes/PuertoVaras.jpg" alt="Puerto_varas">
            <div class="card-body">
            <h5>Puerto varas</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nulla repellat blanditiis! Dignissimos eligendi possimus porro distinctio quo iure, necessitatibus architecto dolor eveniet, totam quas iste itaque incidunt veniam! Quae?.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="d-grid gap-2">
                 <button class="btn btn-primary" type="button">Buscar cabañas en Puerto Varas</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img class="card-img" src="Imagenes/Castro2.jpg" alt="Castro">
            <div class="card-body">
            <h5>Castro</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, provident tempore sint reiciendis quaerat, porro facere itaque consectetur animi iure unde praesentium commodi accusantium. Soluta hic expedita dolor quisquam voluptas.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Buscar cabañas en Castro</button>
</div>
                </div>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
  
  <!--Footer-->
  <?php
  include("Colecciones/Footer.php");
  ?>
  </main>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>