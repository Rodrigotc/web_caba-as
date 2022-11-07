<?php
//Conección a DB
include("conection.php");

//Eliminar tabla
$idCabana = $_GET['id'];
$eliminar = "DELETE FROM `nuevocabanasdb`.`cabana` WHERE (`idCabana` = '$idCabana');";
mysqli_query($enlace, $eliminar);

//Eliminar Foto
unlink("../Fotos_Cabanas/" . $idCabana . ".jpg");

//Cerrar DB
mysqli_close($enlace);

//Cerrar conección
header("location:..\index.php");
