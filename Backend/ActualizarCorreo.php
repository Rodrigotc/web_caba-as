<?php
//Iniciar SESSION
session_start();

//Conección a DB
include("conection.php");

//Recuperar datos
$correo = $_POST["correo"];
$idPersona = $_SESSION['id'];

//Actualizar Correo
$actualizacion = "UPDATE `nuevocabanasdb`.`persona` SET `Correo` = '$correo' WHERE (`idPersona` = '$idPersona')";
mysqli_query($enlace, $actualizacion);
$_SESSION['correo'] = $correo;

//Cerrar DB
mysqli_close($enlace);
?>

<form action="../Configuracion.php?mensaje=Correo%20Actualizado." Method = "POST" id="formularioMensaje">
    <script>
        document.getElementById("formularioMensaje").submit();
    </script>
</form>