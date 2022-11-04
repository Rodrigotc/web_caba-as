<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar datos de Cabañas/////
include("Backend\conection.php");
$idPersona = $_SESSION['id'];
$Cabanas = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE Persona_idPersona = '$idPersona'"));
$cantCabanasPublicadas = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) FROM nuevocabanasdb.cabana WHERE Estado = '1';"));
$cantCabanasPendientes = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT COUNT(*) FROM nuevocabanasdb.cabana WHERE Estado = '0';"));
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
  <?php
  include("Colecciones/NavBar.php");
  ?>

  <!-- Barra lateral -->
  <div class="container-fluid">
    <div class="row">
      <div class="barra-lateral col-12 col-sm-auto">
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="Dashboard.php"><i class="fa-solid fa-gauge"></i><span>Resumen</span></a>
          <a class="active" href="DashboardSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Solicitudes</span></a>
          <a href="#"><i class="fas fa-home"></i><span>Inicio</span></a>
          <a href="#"><i class="fas fa-home"></i><span>Inicio</span></a>
        </nav>
      </div>

      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h4>Solicitudes</h4>

            
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