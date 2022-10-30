<?php
/////Inicializar SESSION y funciones/////
include("Backend/FuncionesSesion.php");

/////Verificar si hay una sesión iniciada//////
include("Backend/VerificarSesionIniciada.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>Cab Lagos</title>
</head>

<body>
  <!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>

  <!--Mensaje de entrada-->
  <?php
  if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
  } else {
    $mensaje = "";
  }

  if ($mensaje != "") {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo ($mensaje) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
  }
  ?>

  <!--Datos Usuario-->
  <h3>Datos de la Cuenta</h3>
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">ID: <?php echo ($_SESSION['id']) ?></li>
      <li class="list-group-item">Privilegios de Administrador:
        <?php
        if ($_SESSION['administrador'] == "1") {
          echo ("Sí");
        } else {
          echo ("No");
        }
        ?>
      </li>
      <li class="list-group-item">Cueta Verificada:
        <?php
        if ($_SESSION['verificado'] == "1") {
          echo ("Sí");
        } else {
          echo ("No");
        }
        ?>
      </li>
    </ul>
  </div>

  <h3>Datos Personales</h3>
  <div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nombre: <?php echo ($_SESSION['nombre'] . " " . $_SESSION['apellidos']) ?></li>
      <li type="button" class="list-group-item" data-bs-toggle="modal" data-bs-target="#CorreoModal">Correo: <?php echo ($_SESSION['correo']) ?></li>
      <li type="button" class="list-group-item" data-bs-toggle="modal" data-bs-target="#RutModal">Rut: <?php echo ($_SESSION['rut']) ?></li>
      <li type="button" class="list-group-item" data-bs-toggle="modal" data-bs-target="#TelefonoModal">Número Telefónico: <?php echo ($_SESSION['telefono']) ?></li>
      <li type="button" class="list-group-item" data-bs-toggle="modal" data-bs-target="#contrasenaModal">Contraseña: ********** </li>
    </ul>
  </div>

  <!-- Modal Correo-->
  <div class="modal fade" id="CorreoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="correoModalLabel">Cambiar Correo Electrónico</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="Backend/ActualizarCorreo.php" method="POST">
          <div class="modal-body">
            Nuevo Correo:<br>
            <input type="text" name="correo" placeholder="correo@dominio.com" required><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="Enviar">Actualizar Teléfono</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Rut-->
  <div class="modal fade" id="RutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="RutModalLabel">Cambiar Número Telefónico</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <p>Para corregir errores en su rut, debe contactarse con servicio al cliente, en dónde se le solicitará una foto de su documento de identidad. Si desea cambiar de propietario esta cuenta, debe iniciar una solicitud de trtansferencia. </p>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Teléfono-->
  <div class="modal fade" id="TelefonoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="TelefonoModalLabel">Cambiar Número Telefónico</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="Backend/ActualizarTelefono.php" method="POST">
          <div class="modal-body">
            Nuevo Teléfono:<br>
            <input type="text" name="telefono" placeholder="+569 12345678" required><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="Enviar">Actualizar Teléfono</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Contraseña-->
  <div class="modal fade" id="contrasenaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="contrasenaModalLabel">Cambiar Contraseña</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="Backend/ActualizarContrasena.php" method="POST" id="formContrasena">
          <div class="modal-body">
            Nueva Contraseña:<br>
            <input type="password" name="contrasena" id="contrasena" placeholder="Nueva Contraseña"><br>
            Repetir nueva contraseña:<br>
            <input type="password" name="contrasena2" id="contrasena2" placeholder="Nueva Contraseña">
            <div id="liveAlertPlaceholder"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="Enviarcont">Actualizar Contraseña</button>
            <!-- Comprobar si las contraseñas coinciden-->
            <script>
              document.getElementById("Enviarcont").addEventListener('click', () => {
                function comparar() {
                  var con1 = document.getElementById("contrasena").value;
                  var con2 = document.getElementById("contrasena2").value;
                  if (con1 == "" || con2 == "") {
                    alert("Debe rellenar todos los datos.")
                  } else if (con1 != con2) {
                    alert("Las contraseñas no coinciden.");
                  } else {
                    document.getElementById("formContrasena").submit();
                  }
                }
                comparar()
              })
            </script>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>