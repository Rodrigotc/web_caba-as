<?php
//Recibir variables
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rut = $_POST['rut'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

//Conectar base de datos
include('conection.php');

$insertar = "INSERT INTO `nuevocabanasdb`.`persona` (`Nombres`, `Apellidos`, `Correo`, `Contrasena`, `Rut`) VALUES ('$nombres', '$apellidos', '$contrasena', '$correo', '$rut')";
mysqli_query($enlace, $insertar);
mysqli_close($enlace);
?>