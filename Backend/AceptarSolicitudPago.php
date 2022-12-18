<?php
//SESSION
session_start();

//Conección a DB
include("conection.php");

//Ingresar Solicitud
$idPersona = $_SESSION['id'];
$FechaEntrada = $_POST["FechaEntrada"];
$FechaSalida = $_POST["FechaSalida"];
$idSolicitud = $_GET["idSolicitud"];

$insert = "UPDATE `nuevocabanasdb`.`arriendo` SET `Estado` = 'Aceptado', `FechaEntrada` = $FechaEntrada, `FechaSalida` = $FechaSalida  WHERE (`idArriendo` = '$idSolicitud');";
mysqli_query($enlace, $insert);

$insert= "UPDATE `nuevocabanasdb`.`arriendo` SET `FechaEntrada` = '$FechaEntrada', `FechaSalida` = '$FechaSalida' WHERE (`idArriendo` = '$idSolicitud');";
mysqli_query($enlace, $insert);

//Cerrar DB
mysqli_close($enlace);

//Enviar a Dashboard Solicitudes
header("location:..\DashboardSolicitudes.php");
?>