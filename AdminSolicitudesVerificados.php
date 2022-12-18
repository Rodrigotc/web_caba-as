<?php

include("Backend\conection.php");

//Inicializar SESSION y funciones
include("Backend/FuncionesSesion.php");

//Verificar si hay una sesión iniciada
include("Backend/VerificarSesionIniciada.php");

?>

<!--Html-->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/PaginaAdministrador.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!--Title e ícono-->
  <link rel="shortcut icon" href="Imagenes/Marcador.png">
  <title>Página Administrador</title>
</head>

<body>
  
<!-- NavBar -->
  <?php
  include("Colecciones/NavBar.php");
  ?>


  <div class="wrapper">
    <div class="header">Solicitudes de verificacion</div>

    <div class="cards_wrap">


    <?php
foreach (glob("./foto-carnet2/*.jpg") as $filename) {
        $cont = 1;
        $delimiters = ['.', '/'];
$newStr = str_replace($delimiters, $delimiters[0], $filename); 
$arr = explode($delimiters[0], $newStr);
$idpersona = $arr[($cont+2)];
        $solicitudes = mysqli_query($enlace, "SELECT * FROM nuevocabanasdb.persona WHERE idPersona = '$idpersona' ");
        $solicitud = mysqli_fetch_array($solicitudes);
     ?> 
   
 

     <div  class="card mb-3">
     <img   src="<?php echo $filename ?>"  class="card-img-top" alt="imgcab">
     <div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo  $solicitud["Nombres"] . " " . $solicitud["Apellidos"]?></li>
        <li class="list-group-item"><?php echo  $solicitud["Rut"] ?></li>
    </ul>
    <input class="btn btn-success  m-1" type="button" onclick="location.href='Backend/AceptarVerificacion.php?id=<?php echo $idpersona ?>'" value="Aceptar">
    <input class="btn btn-danger  m-1" type="button" onclick="location.href='Backend/RechazarVerificacion.php?id=<?php echo $idpersona ?>'" value="Rechazar">
     
  </div>
</div>

    <?php   
    }
    mysqli_close($enlace);
    ?>
    </div>
  </div> 


  
</body>