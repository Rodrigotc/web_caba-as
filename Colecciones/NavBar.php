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