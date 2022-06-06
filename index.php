<?php
    session_start();
    //Comprobar si existe una sesión
    function ComprobarSesión(){
        if(isset($_SESSION['nombre'])){
            return true;
        }else{
            return false;
        }
    }      
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="Index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Web cabañas</title>
</head>
<body>
  <!-- NavBar -->
  <nav class="navbar-custom navbar fixed-top navbar-expand-lg bg-light"> 
      <div class="container-fluid">
        <img class="img-logo mx-auto" src="Imagenes/png-clipart-logo-icon-design-graphics-illustration-company-text.png" alt="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">     
            <li class="nav-item">
              <a class="nav-link" href="#">Algo por aqui</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Algo por aca
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">a</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">a2</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">a3</a></li>
              </ul>
            </li>
          </ul>
          <!-- Botones Sesión -->
          <?php
              if(ComprobarSesión()){
                  ?>
                  <button type = "button" class = "btn btn-outline-primary" onclick = "location.href='CerrarSesion.php'")>Cerrar sesión</button>
                  <?php
              }else{
                  ?>
                  <button type = "button" class = "btn btn-outline-primary" onclick = "location.href='InicioSesion.php'")>Iniciar sesion</button>
                  <button type = "button" class = "btn btn-outline-primary" onclick = "location.href='Registro.php'">Crear cuenta</button>
                  <?php
              }
          ?>
        </div>
      </div>
    </nav>
   <main>
    <div class="buscador-inicio">
      <div class="formulario-busqueda">
        <form class="formulario" action="">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="datetime-local" name="a" id="">
          <input type="submit" value="Buscar">
        </form>
      </div>
      </div>
    
     <div class="lista-cards">
       <div class="card" >
        <img src="Imagenes/puerto-img.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit impedit unde est cupiditate tenetur ab explicabo, pariatur temporibus earum, maxime numquam sint neque dolore quaerat quasi sit laborum asperiores aut!</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card" >
        <img src="Imagenes/puerto-img.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit impedit unde est cupiditate tenetur ab explicabo, pariatur temporibus earum, maxime numquam sint neque dolore quaerat quasi sit laborum asperiores aut!</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card" >
        <img src="Imagenes/puerto-img.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit impedit unde est cupiditate tenetur ab explicabo, pariatur temporibus earum, maxime numquam sint neque dolore quaerat quasi sit laborum asperiores aut!</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card" >
        <img src="Imagenes/puerto-img.jpg" class="card-img card-img-top" alt="puerto-imagen">
        <div class=" card-body">
          <h5 class="card-title">Puerto montt</h5>
          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit impedit unde est cupiditate tenetur ab explicabo, pariatur temporibus earum, maxime numquam sint neque dolore quaerat quasi sit laborum asperiores aut!</p>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Buscar</button>
          </div>
        </div>
      </div>    
  </div>
    <footer>
      <div class="footer">
        <h4>Footer </h4>
        
      </div>
    </footer>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>