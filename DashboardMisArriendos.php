<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");

/////Recuperar datos de Cabañas/////
include("Backend\conection.php");
$idPersona = $_SESSION['id'];
$nombrePersona = $_SESSION['nombre'];
$solicitudes = mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.arriendo 
INNER JOIN cabana ON arriendo.Cabana_idCabana = cabana.idCabana
WHERE arriendo.Persona_idPersona = $idPersona AND arriendo.Estado = 'Aceptado'");
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

function dias_restantes($fecha_final)
{
  $fecha_actual = date("Y-m-d");
  $s = strtotime($fecha_final) - strtotime($fecha_actual);
  $d = intval($s / 86400);
  $diferencia = $d;
  return $diferencia;
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
          <a href="DashboardCabanas.php"><i class="fa-solid fa-house-circle-check"></i><span>Mis Cabañas</span></a>
        </nav>
        Arrendatario
        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="DashboardMisSolicitudes.php"><i class="fa-solid fa-envelope"></i><span>Mis solicitudes</span></a>
          <a class="active" href="DashboardMisArriendos.php"><i class="fa-sharp fa-solid fa-house-circle-exclamation"></i><span>Mis Arriendos</span></a>
        </nav>
      </div>


      <!-- Contenido -->
      <main class="main col">
        <div class="row justify-content-center align-content-center text-center">
          <div class="columna cal-lg-6">
            <h4>Mis Arriendos</h4>

            <!-- Card Solicitudes -->
            <?php
            while ($solicitud = mysqli_fetch_array($solicitudes)) {
            ?>
              <div class="card-group">
                <div class="cartaMisArriendos card">
                  <div class="solicitudesCard card-body">
                    <!-- Título -->
                    <div class="tituloIzquierdo"><?php echo ($solicitud['Titulo']) ?></div>

                    <div class="tituloDerecho"></div><br>
                    <div class="container text-center">
                      <div class="row">
                        <div class="col">
                          <img src=<?php echo "Fotos_Cabanas/" . $solicitud["Cabana_idCabana"] . ".jpg"; ?> class="imgCabanaMisArriendos img-fluid" alt="...">
                        </div>
                        <div class="col">
                          <div class="row">
                            <p class="titulo">Mensaje: <?php echo $solicitud["Mensaje"] ?> </p>
                            <p class="titulo">
                              <?php
                              //Calcular en que fase del arriendo estamos
                              if (dias_restantes($solicitud["FechaEntrada"]) > 0) {
                                $diasrestantes = dias_restantes($solicitud["FechaEntrada"]);
                                echo  "Quedan $diasrestantes días para la fecha de ingreso";
                              } elseif (dias_restantes($solicitud["FechaSalida"]) > 0) {
                                $diasrestantes = dias_restantes($solicitud["FechaSalida"]);
                                echo "Quedan $diasrestantes días para la fecha de salida";
                              } else {
                                $diasrestantes = abs(dias_restantes($solicitud["FechaSalida"]));
                                echo "Han pasado $diasrestantes días desde la fecha de salida  ";
                              ?>

                              <?php
                              }
                              ?>
                            </p>
                          </div>
                        </div>


                        <!-- Mostrar comentario solo si se superó la fecha de salida -->
                        <div class="comentarios col">
                          <?php
                          if (dias_restantes($solicitud["FechaSalida"]) < 0) {
                          ?>
                            <form method="POST" action="./Backend/enviarcomentario.php">

                              <div class="input-group input-group-sm mb-3">
                                <input type="hidden" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="nombre" type="text" id="nombre" value="<?php echo $nombrePersona ?>" required readonly>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <input type="hidden" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="idcabana" type="text" id="idcabana" value="<?php echo $solicitud["Cabana_idCabana"] ?>" required readonly>
                              </div>

                              <input type="hidden" name="idArriendo" value="<?php echo $solicitud["idArriendo"] ?>" />


                              <label for="comentario" class="titulo form-label ">Comentario:</label>
                              <textarea class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario" placeholder="Escribe tu comentario..."></textarea>
                              <br>
                              <input class="btn btn-primary" type="submit" value="Enviar Comentario">
                              <input class="m-1 btn btn-secondary btn-danger" onclick="location.href='Backend/Eliminararriendo.php?idArriendo=<?php echo $solicitud['idArriendo'] ?>'" value="Eliminar">
                            </form>

                          <?php
                          } else {
                          ?>
                            <form method="POST">
                              <div class="input-group input-group-sm mb-3">
                                <input type="hidden" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="nombre" type="text" id="nombre" value="<?php echo $nombrePersona ?>" required readonly>
                              </div>
                              <div class="input-group input-group-sm mb-3">
                                <input type="hidden" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="idcabana" type="text" id="idcabana" value="<?php echo $solicitud["Cabana_idCabana"] ?>" required readonly>
                              </div>

                              <input type="hidden" name="idArriendo" value="<?php echo $solicitud["idArriendo"] ?>" />


                              <label for="comentario" class="titulo form-label ">Comentario:</label>
                              <textarea readonly class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario" placeholder="Escribe tu comentario..."></textarea>
                              <br>
                              <input class="btn btn-primary" type="submit" value="Enviar Comentario" disabled>
                              <input class="m-1 btn btn-secondary btn-danger" onclick="location.href='Backend/Eliminararriendo.php?idArriendo=<?php echo $solicitud['idArriendo'] ?>'" value="Eliminar" disabled>
                            </form>
                          <?php
                          }
                          ?>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div><br>
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