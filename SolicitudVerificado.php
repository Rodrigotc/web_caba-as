<?php

$idpersona = $_POST['idpersona'];
$ruta = "foto-carnet2/";
            $fichero = $ruta . basename($_FILES['carnet']['name']);
            if (move_uploaded_file($_FILES['carnet']['tmp_name'], $ruta . $idpersona . '.jpg')) {
            }
            header("location:DashboardVerificado.php");
?>

