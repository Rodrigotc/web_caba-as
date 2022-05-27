<?php 
$ExpresionRegularRut="/^[0-9]+-[0-9kK]{1}$/";
 //Definir variables
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
            <input class = "controls" type = "text" name = "nombres" id = "nombres" placeholder = "Nombres" value = "<?php echo $nombres;?>">
            Apellidos
            <input class = "controls" type = "text" name = "apellidos" id = "apellidos" placeholder = "Apellidos" value = "<?php echo $apellidos;?>">
            Rut
            <input class = "controls" type = "text" name = "rut" id = "rut" placeholder = "12345678-9" value = "<?php echo $rut;?>">
            Correo
            <input class = "controls" type = "text" name = "correo" id = "correo" placeholder = "correo@dominio.com" value = "<?php echo $correo;?>">
            Contraseña
            <input class = "controls" type = "password" name = "contrasena" id = "contrasena" placeholder = "Contraseña" value = "<?php echo $contrasena;?>">
            <input class = "boton" type = "submit" value = "Registrar">
            <?php
                if(isset($_POST['nombres'])){
                    //Recibir datos
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $rut = $_POST['rut'];
                    $correo = $_POST['correo'];
                    $contrasena = $_POST['contrasena'];

                    //Arreglo
                    $errores = array();

                    //Verificación de errores
                    if($nombres == "" || $apellidos == "" || $rut == "" || $correo == "" || $contrasena == ""){
                        array_push($errores, "Debe rellenar todos los datos");
                    }
                    if(preg_match($ExpresionRegularRut,$rut)==0){
                        array_push($errores, "Debe ingresar un rut valido");
                    }
                   

                    //Comprobar si existen errores
                    if(count($errores) > 0){
                        foreach ($errores as $i => $value) {
                            echo $value."</br>";
                        }                        
                        //https://www.youtube.com/watch?v=uhjAJ3pFBrA&t=359s
                    }

                }
            ?>
        </section>
    </form>
</body>
</html>