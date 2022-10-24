<?php
include ("Backend\conection.php");
$nombres = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT nombres FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['nombres'];
$apellidos = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT apellidos FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['apellidos'];
$rut = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT rut FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['rut']; 
$telefono = mysqli_fetch_assoc(mysqli_query($enlace, "SELECT telefono FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['telefono']; 
$id =  mysqli_fetch_assoc(mysqli_query($enlace, "SELECT idPersona FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['idPersona'];                    
$Administrador =  mysqli_fetch_assoc(mysqli_query($enlace, "SELECT Administrador FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['Administrador'];                    
$verificado =  mysqli_fetch_assoc(mysqli_query($enlace, "SELECT verificado FROM nuevocabanasdb.persona WHERE correo = '$correo'"))['verificado'];                    
mysqli_close($enlace);
session_start();
$_SESSION['id'] = $id;
$_SESSION['nombre'] = $nombres;
$_SESSION['apellidos'] = $apellidos;
$_SESSION['rut'] = $rut;
$_SESSION['correo'] = $correo;
$_SESSION['telefono'] = $telefono;
$_SESSION['administrador'] = $Administrador;
$_SESSION['verificado'] = $verificado;
header("location:index.php"); 
?>