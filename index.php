<?php
//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Album example · Bootstrap v5.2</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
  </head>
  <body>
    
<header>
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
              <a class="nav-link active" aria-current="page" href="Index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="IngresoCabana.php">Publicar Cabaña</a>
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
              <a class="nav-link" href="PaginaCabana.php">Pagina Cabaña</a>
            </li>
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

</header>
<main>

  <section class="py-2 text-center container border-bottom">
    <div class="row py-lg-5">
    <div class="formulario-busqueda">
    <form class="formulario" action="Busqueda.php" >
        <select name="Ciudad" id="Ciudad" selected="Ancud">
            <option value="0">---Seleccionar Ciudad---</option>
            <option value="Ancud">Ancud</option>
            <option value="Calbuco">Calbuco</option>
            <option value="Castro">Castro</option>
            <option value="Chaitén">Chaitén</option>
            <option value="Chonchi">Chonchi</option>
            <option value="Cochamó">Cochamó</option>
            <option value="Curaco de Vélez">Curaco de Vélez</option>
            <option value="Dalcahue">Dalcahue</option>
            <option value="Fresia">Fresia</option>
            <option value="Frutillar">Frutillar</option>
            <option value="Futaleufú">Futaleufú</option>
            <option value="Llanquihue">Llanquihue</option>
            <option value="Los Muermos">Los Muermos</option>
            <option value="Maullín">Maullín</option>
            <option value="Osorno">Osorno</option>
            <option value="Palena">Palena</option>
            <option value="Puerto Montt">Puerto Montt</option>
            <option value="Puerto Octay">Puerto Octay</option>
            <option value="Puerto Varas">Puerto Varas</option>
            <option value="Puqueldón">Puqueldón</option>
            <option value="Purranque">Purranque</option>
            <option value="Puyehue">Puyehue</option>
            <option value="Queilén">Queilén</option>
            <option value="Quellón">Quellón</option>
            <option value="Quemchi">Quemchi</option>
            <option value="Quinchao">Quinchao</option>
            <option value="Río Negro">Río Negro</option>
            <option value="San Juan de la Costa">San Juan de la Costa</option>
            <option value="San Pablo">San Pablo</option>
        </select>
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="text">
          <input placeholder="Hola" class="inpt" type="datetime-local" name="a" id="">
          <input type="submit" value="Buscar">
        </form>
    </div> 
    
    </div>
  </section>

    <div class="container"><br>
      <h3 class="titulo-ciudades">Principales ciudades de la region de los lagos</h3>
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
                  <button class="btn btn-primary" type="button">Buscar</button>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            
          <img class="card-img" src="Imagenes/PuertoVaras.jpg" alt="Puerto_montt">
            <div class="card-body">
            <h5>Puerto varas</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nulla repellat blanditiis! Dignissimos eligendi possimus porro distinctio quo iure, necessitatibus architecto dolor eveniet, totam quas iste itaque incidunt veniam! Quae?.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="d-grid gap-2">
                 <button class="btn btn-primary" type="button">Buscar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img class="card-img" src="Imagenes/Castro2.jpg" alt="Puerto_montt">
            <div class="card-body">
            <h5>Castro</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, provident tempore sint reiciendis quaerat, porro facere itaque consectetur animi iure unde praesentium commodi accusantium. Soluta hic expedita dolor quisquam voluptas.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">Buscar</button>
</div>
                </div>
              </div>
            </div>
        </div>

      </div>
    </div>
  </div>
<br>
</main>



    <!-- Inicio Footer -->
    <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-1 me-1 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="10" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <img style="width: 8rem;" src="Imagenes/CabLagos_Logo.png" class="img-footer" alt="puerto-imagen">

    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
<li>	
<a href="#" class="link-info">Inicio</a></li>
    <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
</svg></a></li>

      <li class="ms-3"><a class="text-muted" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg></a></li>

      <li class="ms-3"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg><a class="text-muted" href="#"></a></li>
      
     
    
    </ul>
  </footer>
</div>

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
