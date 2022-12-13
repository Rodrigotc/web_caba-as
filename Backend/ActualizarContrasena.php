<?php
//Iniciar SESSION
session_start();

//Conección a DB
include("conection.php");

//Recuperar datos
$contrasena = $_POST["contrasena"];
$idPersona = $_SESSION['id'];

//Actualizar contraseña
$actualizacion = "UPDATE `nuevocabanasdb`.`persona` SET `Contrasena` = '$contrasena' WHERE (`idPersona` = '$idPersona')";
mysqli_query($enlace, $actualizacion);

//Cerrar DB
mysqli_close($enlace);
?>

<form action="../Configuracion.php?mensaje=Contraseña%20Actualizada." Method = "POST" id="formularioMensaje">
    <script>
        document.getElementById("formularioMensaje").submit();
    </script>
</form>