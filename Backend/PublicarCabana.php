<?php
//Conección a DB
include("conection.php");

//Actualizar tabla
$idCabana = $_GET["id"];
$actualizacion = "UPDATE `nuevocabanasdb`.`cabana` SET `Estado` = '1' WHERE (`idCabana` = '$idCabana')";
mysqli_query($enlace, $actualizacion);

//Cerrar DB
mysqli_close($enlace);

//Cerrar conección
header("location:..\index.php");
?>