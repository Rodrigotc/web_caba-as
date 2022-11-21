<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar datos de Cabañas/////
include("Backend\conection.php");
$idPersona = $_SESSION['id'];
$Cabanas = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE Persona_idPersona = '$idPersona'"));
$CananasMasVistas = mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE Persona_idPersona = '$idPersona' AND Estado = '1' ORDER BY Visitas desc Limit 5");
$cantCabanasPublicadas = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) FROM nuevocabanasdb.cabana WHERE Estado = '1' AND Persona_idPersona = '$idPersona';"));
$cantCabanasPendientes = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) FROM nuevocabanasdb.cabana WHERE Estado = '0' AND Persona_idPersona = '$idPersona';"));
mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS/Dashboard.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>Dashboard</title>
</head>

<body>
  <!-- NavBar -->
  <header>
    <?php
    include("Colecciones/NavBar.php");
    ?>
  </header>

  <!-- Barra lateral -->
  <div class="container-fluid">
    <div class="row">
      <div class="barra-lateral col-12 col-sm-auto">
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a class="active" href="Dashboard.php"><i class="fa-solid fa-gauge"></i><span>Resumen</span></a>
          <a href="DashboardSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Solicitudes</span></a>
          <a href="DashboardCabanas.php"><i class="fa-solid fa-house-circle-check"></i><span>Mis Cabañas</span></a>
          <a href="DashboardMisSolicitudes.php"><i class="fa-sharp fa-solid fa-house-circle-exclamation"></i><span>Mis solicitudes</span></a>
        </nav>
      </div>

      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h4>Resumen</h4>

            <!-- Card contador cabañas -->
            <div class="card-group">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo ($cantCabanasPublicadas['COUNT(*)']) ?></h5>
                  <p class="card-text">Cabañas Publicadas</p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo ($cantCabanasPendientes['COUNT(*)']) ?></h5>
                  <p class="card-text">Cabañas en Revisión</p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pendiente</h5>
                  <p class="card-text">Cabañas Arrendadas</p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pendiente</h5>
                  <p class="card-text">Cabañas Disponibles</p>
                </div>
              </div>
            </div><br>

            <!-- Card Solicitudes -->
            <div class="card-group">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Últimas Solicitudes</h5>
                  <p class="card-text">Primera<br>Segunda<br>Tercera<br>Cuarta<br>Quinta</p>
                </div>
              </div>
            </div><br>

            <!-- Card Cabañas más Visitadas -->
            <div class="card-group">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Cabañas más Visitadas</h5>
                  <?php
                  while ($cabana = mysqli_fetch_array($CananasMasVistas)) {
                  ?>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?> class="img-fluid" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo ($cabana['Titulo']) ?> </h5>
                              <p class="card-text"><i class="fa-regular fa-eye"></i><?php echo (" " . $cabana['Visitas']) ?></p>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </main>
    </div>
  </div>

  <!--Fontawesome-->
  <script src="https://kit.fontawesome.com/1e5f0e0661.js" crossorigin="anonymous"></script>
  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>