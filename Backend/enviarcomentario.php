<?php  

// Llamando a los campos
$nombre = $_POST['nombre'];

$comentario= $_POST['comentario'];
$idcabana= $_POST['idcabana'];
$idArriendo= $_POST['idArriendo'];

$conexion=mysqli_connect("localhost","root","","nuevocabanasdb");  

$nombre= mysqli_real_escape_string($conexion,$nombre);
$comentario= mysqli_real_escape_string($conexion,$comentario);
$idcabana= mysqli_real_escape_string($conexion,$idcabana);
$idArriendo= mysqli_real_escape_string($conexion,$idArriendo);
$resultado=mysqli_query($conexion,'INSERT INTO comentarios (nombre, comentario, idcabana) VALUES ("'.$nombre.'", "'.$comentario.'", "'.$idcabana.'" )');
$eliminar=mysqli_query($conexion, 'DELETE FROM arriendo WHERE arriendo.idArriendo = "'.$idArriendo.'" ');
header('Location: ../DashboardMisArriendos.php');





?>