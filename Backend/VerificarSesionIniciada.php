<?php
//Redireccionar a inicio de sesión si no hay una iniciada
if(!isset($_SESSION['id'])){
    header("location:InicioSesion.php"); 
}
?>