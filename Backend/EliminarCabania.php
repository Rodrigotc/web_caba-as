<?php
//Conección a DB
include("conection.php");

//Eliminar Campos de tabla
$idCabana = $_GET['idCabania'];
$eliminar = "DELETE FROM `nuevocabanasdb`.`arriendo` WHERE (`Cabana_idCabana` = '$idCabana');";
mysqli_query($enlace, $eliminar);
$eliminar = "DELETE FROM `nuevocabanasdb`.`cabana` WHERE (`idCabana` = '$idCabana');";
mysqli_query($enlace, $eliminar);

//Eliminar Foto
unlink("../Fotos_Cabanas/" . $idCabana . ".jpg");

//Cerrar DB
mysqli_close($enlace);

//Cerrar conección
header("location:..\DashboardCabanas.php");
