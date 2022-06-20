<?php
//Iniciar SESSION
session_start();

//Comprobar si existe una sesión
function ComprobarSesión()
{
  if (isset($_SESSION['nombre'])) {
    return true;
  } else {
    return false;
  }
};

function ComprobarAdmin()
{
  $admin = $_SESSION['administrador'];
  if ($admin == 1) {
    return true;
  } else {
    return false;
  }
};
?>