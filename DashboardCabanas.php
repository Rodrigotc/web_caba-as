<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar datos de Cabañas/////
include("Backend\conection.php");
$idPersona = $_SESSION['id'];
$Cabanas = mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.cabana WHERE Persona_idPersona = $idPersona;");
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

  <div class="container-fluid">
    <!-- Barra lateral -->
    <div class="row">
      <div class="barra-lateral col-12 col-sm-auto">
        Arrendador
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="Dashboard.php"><i class="fa-solid fa-gauge"></i><span>Resumen</span></a>
          <a href="DashboardSolicitudes.php"><i class="fa-solid fa-bell"></i><span>Solicitudes</span></a>
          <a class="active" href="DashboardCabanas.php"><i class="fa-solid fa-house-circle-check"></i><span>Mis Cabañas</span></a>
        </nav>
        Arrendatario
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="DashboardMisSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Mis solicitudes</span></a>
          <a href="DashboardMisArriendos.php"><i class="fa-sharp fa-solid fa-house-circle-exclamation"></i><span>Mis Arriendos</span></a>
        </nav>
      </div>

      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h4>Mis Cabañas</h4>

            <!-- Card cabañas -->
            <?php
            include("Backend\conection.php");
            while ($cabana = mysqli_fetch_array($Cabanas)) {
              //Consultas MYSQL
              $idCabana = $cabana['idCabana'];
              $CantidadSolicitudes = mysqli_fetch_assoc(mysqli_query(
                $enlace,
                "SELECT COUNT(*) FROM arriendo
                INNER JOIN cabana ON arriendo.Cabana_idCabana = cabana.idCabana
                WHERE cabana.Persona_idPersona = $idPersona AND Cabana_idCabana = $idCabana AND arriendo.Estado != 'Aceptado';"
              ));
              $CantidadSolicitudesAceptadas = mysqli_fetch_assoc(mysqli_query(
                $enlace,
                "SELECT COUNT(*) FROM arriendo
              INNER JOIN cabana ON arriendo.Cabana_idCabana = cabana.idCabana
              WHERE cabana.Persona_idPersona = $idPersona AND Cabana_idCabana = $idCabana AND arriendo.Estado = 'Aceptado';"
              ));
            ?>
              <div class="card-group">
                <div class="cabanaCard card">
                  <div class="card-body">

                    <!-- Título -->
                    <div class="tituloIzquierdo"><?php echo ($cabana['Titulo']) ?></div>
                    <div class="tituloDerecho"><?php echo ($cabana['Ciudad']) ?></div><br>

                    <!-- Cuerpo -->
                    <ul class="list-group list-group-flush">
                      <li class="lista list-group-item">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <a href="zdetalle.php?idCabana=<?php echo $cabana['idCabana'] ?>"><img src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?> class="imgCabana" alt="Cabaña"></a>
                          </div>

                          <div class="col-md-8">
                            <div class="cuerpo card-body">
                              <div class="row">
                                <div class="col">
                                  <p class="titulo">
                                    Estado:                                    
                                    <?php
                                    if ($cabana['Estado'] == 1) {
                                      echo "Publicado <img class = 'Icono' src='Imagenes\Estado_Verde.png'>";
                                    } else {
                                      echo "En Revisión <img class = 'Icono' src='Imagenes\Estado_Rojo.png'>";
                                    }
                                    ?>
                                  </p>
                                  <p class="titulo">Valor por día: $<?php echo (number_format($cabana['Precio'])) ?></p>
                                  <p class="titulo">Vistas: <?php echo ($cabana['Visitas']) ?></p>
                                </div>
                                <div class="col">
                                  <p class="titulo">Solicitudes Pendientes: <?php echo ($CantidadSolicitudes['COUNT(*)']) ?></p>
                                  <p class="titulo">Solicitudes Confirmadas: <?php echo ($CantidadSolicitudesAceptadas['COUNT(*)']) ?></p>
                                </div>
                              </div>

                              <!--Eliminar Cabania-->
                              <input class="btnEliminar btn btn-secondary btn-lg btn-danger" onclick="location.href='Backend/EliminarCabania.php?idCabania=<?php echo $cabana['idCabana'] ?>'" value="Eliminar Cabaña">
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>

                  </div>
                </div>
              </div><br>
            <?php
            }
            mysqli_close($enlace);
            ?>

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