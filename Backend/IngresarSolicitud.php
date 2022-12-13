<?php
//SESSION
session_start();

//Conección a DB
include("conection.php");

//Ingresar Solicitud
$idPersona = $_SESSION['id'];
$mensaje = $_POST["Mensaje"];
$FechaEntrada = $_POST["FechaInicio"];
$FechaSalida = $_POST["FechaTermino"];
$idcabana = $_GET["idCabana"];
$insert = "INSERT INTO `nuevocabanasdb`.`arriendo` (`Estado`, `Mensaje`, `Persona_idPersona`, `Cabana_idCabana`, `FechaEntrada`, `FechaSalida`) VALUES ('En Solicitud', '$mensaje', '$idPersona', '$idcabana', '$FechaEntrada', '$FechaSalida');";
mysqli_query($enlace, $insert);

//Cerrar DB
mysqli_close($enlace);

//Crear mensaje
$mensaje = "La soliciud se ha enviado correctamente.";

//Enviar a Index
header("location:..\zdetalle.php?idCabana=$idcabana&mensaje=$mensaje");
?>