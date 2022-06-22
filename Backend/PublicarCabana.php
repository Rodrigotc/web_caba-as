<?php
//Conección a DB
include("conection.php");
$actualizacion = "UPDATE `nuevocabanasdb`.`cabana` SET `Estado` = '1' WHERE (`idCabana` = '55')";
mysqli_query($enlace, $actualizacion);
mysqli_close($enlace);
header("location:..\index.php");
?>