<nav style="background:rgba(250,250,222,255)" class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="Imagenes/logo2.png" alt="logo" height="40"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse position-absolute top-0 end-0" id="navbarNav">
      <ul class="navbar-nav mt-2 me-2">
        <?php
        if (ComprobarSesión()) {
          /////Sesión iniciada/////
        ?>
          <li class="nav-item"><a class="nav-link" href="IngresoCabana.php">Publicar Cabaña</a></li>
          <!--Dropdown-->
          <div class="collapse navbar-collapse" id="navbarDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Opciones
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <!--Configuración-->
                  <li><a class="dropdown-item" href="Configuracion.php">Configuracion</a></li>
                  <?php
                  if (ComprobarAdmin()) {
                  ?>
                    <!--Página Administrador-->
                    <li><a class="dropdown-item" href="PaginaAdministrador.php">Página Administrador</a></li>
                  <?php
                  }
                  ?>
                  <!--Cerrar Sesión-->
                  <li><a class="dropdown-item" href="Backend/CerrarSesion.php">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
          </div>
        <?php
        } else {
          /////Sesión Cerrada/////
        ?>
          <li class="nav-item  ">
            <a class="nav-link  border-bottom border-3 m-1 border-info" aria-current="page" href="Registro.php">Crear Cuenta</a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link  border-bottom border-3 m-1 border-info" href="InicioSesion.php">Iniciar Sesión</a>
          <?php
        }
          ?>

    </div>
  </div>
</nav>