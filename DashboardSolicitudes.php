<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar datos de Cabañas/////
include("Backend\conection.php");
$idPersona = $_SESSION['id'];
$CabanasEnSolicitud = mysqli_query(
  $enlace,
  "SELECT idArriendo, idCabana, arriendo.Estado, Titulo, Precio, arriendo.Persona_idPersona AS idArrendatario, Nombres, Apellidos, Correo, Telefono, Verificado, Mensaje, FechaEntrada, FechaSalida
FROM nuevocabanasdb.arriendo 
INNER JOIN nuevocabanasdb.cabana ON arriendo.Cabana_idCabana = cabana.idCabana
INNER JOIN nuevocabanasdb.persona ON arriendo.Persona_idPersona = persona.idPersona
WHERE cabana.Persona_idPersona = $idPersona AND arriendo.Estado != 'Aceptado';"
);
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
          <a class="active" href="DashboardSolicitudes.php"><i class="fa-solid fa-bell"></i><span>Solicitudes</span></a>
          <a href="DashboardCabanas.php"><i class="fa-solid fa-house-circle-check"></i><span>Mis Cabañas</span></a>
        </nav>
        Arrendatario
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="DashboardMisSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Mis solicitudes</span></a>
          <a href="DashboardMisArriendos.php"><i class="fa-sharp fa-solid fa-house-circle-exclamation"></i><span>Mis Arriendos</span></a>
        </nav>  
        Verificado
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
         <a href="DashboardVerificado.php"><i class="fa-solid fa-circle-check fa-xs"></i><span>Solicitar verificado</span></a>
        </nav>
      </div>


      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h4>Solicitudes</h4>

            <!-- Card Solicitudes -->
            <?php
            while ($cabana = mysqli_fetch_array($CabanasEnSolicitud)) {
            ?>
              <div class="card-group">
                <div class="card">
                  <div class="solicitudesCard card-body">
                    <!-- Título -->
                    <div class="tituloIzquierdo">
                      Nombre de Solicitante: <?php echo ($cabana['Nombres'] . " " . $cabana['Apellidos']) ?>
                      <button class="btnContacto btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo ($cabana['idArrendatario']) ?>">Contacto</button><br>
                    </div>

                    <div class="tituloDerecho"><?php echo ($cabana['Titulo']) ?></div><br>

                    <ul class="list-group list-group-flush">
                      <li class="lista list-group-item">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <a href="zdetalle.php?idCabana=<?php echo $cabana['idCabana'] ?>"><img src=<?php echo "Fotos_Cabanas/" . $cabana["idCabana"] . ".jpg"; ?> class="imgCabana" alt="Cabaña"></a>
                          </div>

                          <div class="col-md-8">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <p class="titulo">Estado: <?php echo $cabana["Estado"] ?></p>
                                  <p class="titulo">Mensaje: <?php echo $cabana["Mensaje"] ?></p>
                                </div>
                                <div class="col">
                                  <?php
                                  if ($cabana['Estado'] == "En Solicitud") {
                                  ?>
                                    <!--Formulario Solicitud-->
                                    <form action="Backend/AceptarSolicitud.php?idSolicitud=<?php echo (" " . $cabana['idArriendo']) ?>" Method="POST">
                                      <p class="titulo"> Fecha de Entrada: <input name="FechaEntrada" type="date" value="<?php echo ($cabana['FechaEntrada']) ?>"></p>
                                      <p class="titulo">Fecha de Salida:<input name="FechaSalida" type="date" value="<?php echo ($cabana['FechaSalida']) ?>"></p>
                                      <p class="titulo">Valor Total: $<?php echo ($cabana['Precio']) ?></p>

                                      <!--Aceptar Solicitud-->
                                      <button type="submit" class="btnAceptar btn btn-primary btn-lg">Aceptar Solicitud</button>
                                      <!--Rechazar Solicitud-->
                                      <input class="btnRechazar btn btn-secondary btn-lg btn-danger" onclick="location.href='Backend/RechazarSolicitud.php?idArriendo=<?php echo $cabana['idArriendo'] ?>'" value="Eliminar Solicitud">
                                    </form>
                                  <?php
                                  } else {
                                  ?>
                                    <!--Formulario Pago-->
                                    <form action="Backend/AceptarSolicitudPago.php?idSolicitud=<?php echo (" " . $cabana['idArriendo']) ?>" Method="POST">
                                      <p class="titulo"> Fecha de Entrada: <input name="FechaEntrada" type="date" value="<?php echo ($cabana['FechaEntrada']) ?>"></p>
                                      <p class="titulo">Fecha de Salida:<input name="FechaSalida" type="date" value="<?php echo ($cabana['FechaSalida']) ?>"></p>
                                      <p class="titulo">Valor Total: $<?php echo ($cabana['Precio']) ?></p>
                                      <!--Aceptar Solicitud-->
                                      <button type="submit" class="btnAceptar btn btn-primary btn-lg btn-success">Confirmar Pago</button>
                                      <!--Rechazar Solicitud-->
                                      <input class="btnRechazar btn btn-secondary btn-lg btn-danger" onclick="location.href='Backend/RechazarSolicitud.php?idArriendo=<?php echo $cabana['idArriendo'] ?>'" value="Eliminar Solicitud">
                                    </form>
                                  <?php
                                  }
                                  ?>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>

                  </div>
                </div>
              </div><br>

              <!--Modal Contacto-->
              <div class="modal fade" id="exampleModal<?php echo ($cabana['idArrendatario']) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de Contacto</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Nombre:
                      <?php
                      echo ($cabana['Nombres'] . " " . $cabana['Apellidos']);
                      iconoVerificado($cabana);
                      ?>
                      <br>
                      Correo: <?php echo ($cabana['Correo']) ?><br>
                      Número Telefónico: <?php echo ($cabana['Telefono']) ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>

            <?php
            }
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