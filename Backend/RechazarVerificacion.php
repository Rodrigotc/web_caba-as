<?php


//Actualizar tabla
$id = $_GET["id"];
unlink("C:/xampp/htdocs/web_caba-as-main/foto-carnet2/". $id .".jpg");


header("location:..\AdminSolicitudesVerificados.php");
?>