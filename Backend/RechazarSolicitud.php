<?php
//Conección a DB
include("conection.php");

//Eliminar tabla
$idArriendo = $_GET['idArriendo'];
$eliminar = "DELETE FROM `nuevocabanasdb`.`arriendo` WHERE (`idArriendo` = '$idArriendo');";
mysqli_query($enlace, $eliminar);

//Cerrar DB
mysqli_close($enlace);

//Cerrar conección
header("location:..\DashboardSolicitudes.php");
