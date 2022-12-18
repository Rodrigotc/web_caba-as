<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar usuario/////
include("Backend\conection.php");
$nombrePersona = $_SESSION['nombre'];
$apeelidoPersona = $_SESSION['apellidos'];
$rutPersona = $_SESSION['rut'];
$idPersona = $_SESSION['id'];
$verificado = $_SESSION['verificado'];



mysqli_close($enlace);


/////Funciones/////
function iconoVerificado($cabana)
{
  if ($cabana['Verificado'] == '1') {
?>
<i class="fa-solid fa-circle-check fa-xs"></i>
<?php
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="CSS/Dashboard.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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

  <div class="container-fluid">
    <!-- Barra lateral -->
    <div class="row">
      <div class="barra-lateral col-12 col-sm-auto">
        Arrendador
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="Dashboard.php"><i class="fa-solid fa-gauge"></i><span>Resumen</span></a>
          <a href="DashboardSolicitudes.php"><i class="fa-solid fa-bell"></i><span>Solicitudes</span></a>
          <a href="DashboardCabanas.php"><i class="fa-solid fa-house-circle-check"></i><span>Mis Cabañas</span></a>
        </nav>
        Arrendatario
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="DashboardMisSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Mis solicitudes</span></a>
          <a href="DashboardMisArriendos.php"><i class="fa-sharp fa-solid fa-house-circle-exclamation"></i><span>Mis
              Arriendos</span></a>
        </nav>

        Verificado
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a class="active" href="DashboardVerificado.php"><i
              class="fa-solid fa-circle-check fa-xs"></i><span>Solicitar verificado</span></a>
        </nav>
      </div>


      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h3> Formulario - solicitar verificado</h3>

         
            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="email" value="<?php echo $nombrePersona ?>" class="form-control" name="Nombre" id="Nombre" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
              <label for="Nombre" class="form-label">Apellido</label>
              <input type="email" value="<?php echo $apeelidoPersona ?>" class="form-control" name="Nombre" id="Nombre" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
              <label for="Rut" class="form-label">Rut</label>
              <input type="text" value="<?php echo $rutPersona ?>" class="form-control" name="Rut" id="Rut" readonly>
            </div>
            <form  action="SolicitudVerificado.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <input type="text" name="idpersona" id="idpersona" value="<?php echo $idPersona ?>" hidden>
                <label for="carnet" class="form-label">Subir foto-carnet</label>
                <input type="file" class="form-control" id="carnet" name="carnet" aria-describedby="inputGroupFileAddon03" >
              </div>
            
              <button type="submit" class="btn btn-primary" <?php if($verificado != 0)  { ?> disabled <?php } ?> >Enviar solicitud</button>
            </form>

            <?php if ($verificado != 0)  { ?> <span class="badge rounded-pill text-bg-success">Actualmente ya estas verificado.</span> <?php } ?>
          </div>
        </div>

      </main>
    </div>
  </div>


  <!--Fontawesome-->
  <script src="https://kit.fontawesome.com/1e5f0e0661.js" crossorigin="anonymous"></script>
  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
</body>

</html>