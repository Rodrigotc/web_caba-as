<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>
    <form action = "Registro.php" method = "POST">
        <section class = "form-register">
            <h4>Formulario Registro</h4>
            Nombres
            <input class = "controls" type = "text" name = "nombres" id = "nombres" placeholder = "Nombres" value = "<?php
            if(isset($_POST['nombres'])){
                $nombres = $_POST['nombres'];
                echo trim($nombres);
            }
            ?>
            ">
            Apellidos
            <input class = "controls" type = "text" name = "apellidos" id = "apellidos" placeholder = "Apellidos">
            Rut
            <input class = "controls" type = "text" name = "rut" id = "rut" placeholder = "12345678-9">
            Correo
            <input class = "controls" type = "email" name = "correo" id = "correo" placeholder = "correo@dominio.com">
            Contraseña
            <input class = "controls" type = "password" name = "contrasena" id = "contrasena" placeholder = "Contraseña">
            <input class = "boton" type = "submit" value = "Registrar">
            <?php
                if(isset($_POST['nombres'])){
                    //Recivir datos
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $rut = $_POST['rut'];
                    $correo = $_POST['correo'];
                    $contrasena = $_POST['contrasena'];

                    //Arreglo
                    $errores = array();

                    //Verificación de errores
                    if($nombres == ""){
                        array_push($errores, "Ingresar sus nombres.");
                    }

                    //Comprobar si existen errores
                    if(count($errores) > 0){
                        echo "Hay errores";
                        //https://www.youtube.com/watch?v=uhjAJ3pFBrA&t=359s
                    }

                }
            ?>
        </section>
    </form>
</body>
</html>