<?php
//Conección a DB
include("conection.php");

//Actualizar tabla
$idpersona = $_GET["id"];
$actualizacion = "UPDATE `nuevocabanasdb`.`persona` SET `Verificado` = '1' WHERE (`idPersona` = '$idpersona')";
mysqli_query($enlace, $actualizacion);

//Cerrar DB
mysqli_close($enlace);
unlink("C:/xampp/htdocs/web_caba-as-main/foto-carnet2/". $idpersona .".jpg");

//Cerrar conección
header("location:..\AdminSolicitudesVerificados.php");
?>