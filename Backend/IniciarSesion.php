<?php
include ("Backend\conection.php");
$nombres = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT nombres FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['nombres'];
$rut = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT rut FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['rut']; 
$id =  mysqli_fetch_assoc(mysqli_query($enlace, "SELECT idPersona FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['idPersona'];                    
mysqli_close($enlace);
session_start();
$_SESSION['id'] = $id;
$_SESSION['nombre'] = $nombres;
$_SESSION['rut'] = $rut;
header("location:index.php"); 
?>