<?php
//Recibir datos POST
$correo = ComprobarPost("correo");
$contrasena = ComprobarPost("contrasena");

//Validar campos
function ComprobarPost($campo)
{
    $resultado = "";
    if (isset($_POST[$campo])) {
        $resultado = trim($_POST[$campo]);
    }
    return $resultado;
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="CSS/SinBootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>

<body>
    <form action="InicioSesion.php" method="POST">
        <section class="form-register">
            <h4>Inicio de sesión</h4>
            Correo
            <input class="controls" type="text" name="correo" id="correo" placeholder="Correo@dominio.com" value="<?php echo $correo; ?>">
            Contraseña
            <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" value="<?php echo $contrasena; ?>">
            <input class="boton" type="submit" value="Iniciar Sesión">
        </section>
    </form>
    <?php
    if (isset($_POST['correo'])) {
        //Arreglo
        $errores = array();

    //Verificación de errores
        //Campos vacíos
        if ($correo == "" || $contrasena == "") {
            array_push($errores, "Debe rellenar todos los datos.");
        }
        //Correo
        if ((!filter_var($correo, FILTER_VALIDATE_EMAIL)) && ($correo != "")) {
            array_push($errores, "Debe ingresar un correo válido.");
        }
        //Comprobar si existe cuenta
        include("Backend\conection.php");
        $consulta = "SELECT * FROM nuevocabanasdb.persona WHERE correo = '$correo' and contrasena = '$contrasena'";
        $resultado = mysqli_num_rows(mysqli_query($enlace, $consulta));
        mysqli_close($enlace);
        if (!$resultado && count($errores) == 0) {
            array_push($errores, "Correo o contraseña incorrectas.");
        }

    //Resultado de POST
        //Si existen errores
        if (count($errores) > 0) {
            foreach ($errores as $i => $value) {
                echo $value . "</br>";
            }
            //Si los datos son ingresados correctamente  
        } else {
            include("Backend\IniciarSesion.php");
        }
    }
    ?>
</body>

</html>