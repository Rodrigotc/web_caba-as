<?php
//Iniciar SESSION
session_start();

//Conección a DB
include("conection.php");

//Recuperar datos
$telefono = $_POST["telefono"];
$idPersona = $_SESSION['id'];

//Actualizar télefono
$actualizacion = "UPDATE `nuevocabanasdb`.`persona` SET `Telefono` = '$telefono' WHERE (`idPersona` = '$idPersona')";
mysqli_query($enlace, $actualizacion);
$_SESSION['telefono'] = $telefono;

//Cerrar DB
mysqli_close($enlace);
?>

<form action="../Configuracion.php?mensaje=Telefono%20Actualizado." Method = "POST" id="formularioMensaje">
    <script>
        document.getElementById("formularioMensaje").submit();
    </script>
</form>