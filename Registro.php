<?php
//Recibir datos POST
$nombres = ComprobarPost("nombres");
$apellidos = ComprobarPost("apellidos");
$rut = ComprobarPost("rut");
$correo = ComprobarPost("correo");
$contrasena = ComprobarPost("contrasena");

//Validar campos
function ComprobarPost($campo){
    $resultado="";
    if(isset($_POST[$campo])){
        $resultado = trim($_POST[$campo]);
    }
    return $resultado;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="SinBootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>
    <form action = "Registro.php" method = "POST">
        <section class = "form-register">
            <h4>Formulario Registro</h4>
            Nombres
            <input class = "controls" type = "text" name = "nombres" id = "nombres" placeholder = "Nombres" value = "<?php echo $nombres;?>">
            Apellidos
            <input class = "controls" type = "text" name = "apellidos" id = "apellidos" placeholder = "Apellidos" value = "<?php echo $apellidos;?>">
            Rut
            <input class = "controls" type = "text" name = "rut" id = "rut" placeholder = "12345678-9" value = "<?php echo $rut;?>">
            Correo
            <input class = "controls" type = "text" name = "correo" id = "correo" placeholder = "Correo@dominio.com" value = "<?php echo $correo;?>">
            Contraseña
            <input class = "controls" type = "password" name = "contrasena" id = "contrasena" placeholder = "Contraseña" value = "<?php echo $contrasena;?>">
            <input class = "boton" type = "submit" value = "Registrar">
            <?php
                if(isset($_POST['nombres'])){               
                //Arreglo
                    $errores = array();

                //Verificación de errores
                    //Campos vacíos
                    if($nombres == "" || $apellidos == "" || $rut == "" || $correo == "" || $contrasena == ""){
                        array_push($errores, "Debe rellenar todos los datos.");
                    }
                    //Rut
                    if((preg_match("/^[0-9]+-[0-9kK]{1}$/",$rut)==0) && ($rut != "")){
                        array_push($errores, "Debe ingresar un rut válido.");
                    }
                    //Correo
                   if((!filter_var($correo,FILTER_VALIDATE_EMAIL)) && ($correo != "")){
                       array_push($errores,"Debe ingresar un correo válido.");
                    }
                    //Rut ya existente
                    include ("conection.php");
                    $consulta = "SELECT * FROM nuevocabanasdb.persona WHERE rut = '$rut'";
                    $resultado = mysqli_num_rows(mysqli_query($enlace, $consulta));
                    if($resultado){
                        array_push($errores,"Ya existe una cuenta con ese rut.");
                    }
                    //Correo ya existente
                    $consulta = "SELECT * FROM nuevocabanasdb.persona WHERE correo = '$correo'";
                    $resultado = mysqli_num_rows(mysqli_query($enlace, $consulta));
                    mysqli_close($enlace);
                    if($resultado){
                        array_push($errores,"Ya existe una cuenta con ese correo.");
                    }


                //Resultado de POST
                    //Si existen errores
                    if(count($errores) > 0){
                        foreach ($errores as $i => $value) {
                            echo $value."</br>";
                        }                        
                    //Si los datos son ingresados correctamente  
                    }else{
                        include ("conection.php");
                        $insertar = "INSERT INTO `nuevocabanasdb`.`persona` (`Nombres`, `Apellidos`, `Correo`, `Contrasena`, `Rut`) VALUES ('$nombres', '$apellidos', '$correo', '$contrasena', '$rut')";
                        mysqli_query($enlace, $insertar);   
                        mysqli_close($enlace);
                        session_start();
                        $_SESSION['nombre'] = $nombres;
                        $_SESSION['rut'] = $rut;
                        header("location:index.php");
                    }
                }
            ?>
        </section>
    </form>
</body>
</html>