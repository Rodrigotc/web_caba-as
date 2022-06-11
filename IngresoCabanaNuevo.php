<?php
//Iniciar SESSION
session_start();
$idPersona = $_SESSION['id'];

//Almacenamiento buffer de salida (Solución error línea 177)
ob_start();

//Recibir datos POST
$Direccion = ComprobarPost("Direccion");
$Ciudad = ComprobarPost("Ciudad");
$nroPiezas = ComprobarPost("nroPiezas");
$Precio = ComprobarPost("Precio");
$Descripcion = ComprobarPost("Descripcion");
$Wifi = ComprobarCheckbox("Wifi");
$Estacionamiento = ComprobarCheckbox("Estacionamiento");
$Quincho = ComprobarCheckbox("Quincho");
$Piscina = ComprobarCheckbox("Piscina");
$Bodega = ComprobarCheckbox("Bodega");
$CalefacciónGas = ComprobarCheckbox("CalefacciónGas");
$CalefacciónElectrica = ComprobarCheckbox("CalefacciónElectrica");
$CalefacciónLenta = ComprobarCheckbox("CalefacciónLenta");
$Imagen = ComprobarPost("Imagen");

//Función - Comprobar POST
function ComprobarPost($campo)
{
    $resultado = "";
    if (isset($_POST[$campo])) {
        $resultado = trim($_POST[$campo]);
    }
    return $resultado;
}

//Función - Comprobar Estado de Checkbox
function ComprobarCheckbox($campo)
{
    $resultado = ComprobarPost($campo);
    if ($resultado) {
        $resultado = "Checked";
    }
    return $resultado;
}

//Función - Transformar on en 1
function TransformarON($campo)
{
    $resultado = 0;
    if ($campo == "Checked") {
        $resultado = 1;
    }
    return $resultado;
}

?>

<!--Html-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <title>Web cabañas</title>
</head>

<body>
    <!--formulario-->
    <form action="IngresoCabanaNuevo.php" method="POST" enctype = "multipart/form-data">
        Ciudad<br>
        <select name="Ciudad" id="Ciudad" selected="Ancud">
            <option value="">---Seleccionar Ciudad---</option>
            <option value="Ancud">Ancud</option>
            <option value="Calbuco">Calbuco</option>
            <option value="Castro">Castro</option>
            <option value="Chaitén">Chaitén</option>
            <option value="Chonchi">Chonchi</option>
            <option value="Cochamó">Cochamó</option>
            <option value="Curaco+de+Vélez">Curaco de Vélez</option>
            <option value="Dalcahue">Dalcahue</option>
            <option value="Fresia">Fresia</option>
            <option value="Frutillar">Frutillar</option>
            <option value="Futaleufú">Futaleufú</option>
            <option value="Llanquihue">Llanquihue</option>
            <option value="Los+Muermos">Los Muermos</option>
            <option value="Maullín">Maullín</option>
            <option value="Osorno">Osorno</option>
            <option value="Palena">Palena</option>
            <option value="Puerto+Montt">Puerto Montt</option>
            <option value="Puerto+Octay">Puerto Octay</option>
            <option value="Puerto+Varas">Puerto Varas</option>
            <option value="Puqueldón">Puqueldón</option>
            <option value="Purranque">Purranque</option>
            <option value="Puyehue">Puyehue</option>
            <option value="Queilén">Queilén</option>
            <option value="Quellón">Quellón</option>
            <option value="Quemchi">Quemchi</option>
            <option value="Quinchao">Quinchao</option>
            <option value="Río+Negro">Río Negro</option>
            <option value="San+Juan+de+la+Costa">San Juan de la Costa</option>
            <option value="San+Pablo">San Pablo</option>
        </select><br>
        Calle y número<br>
        <input name="Direccion" id="Direccion" placeholder="Dirección de cabaña." value="<?php echo $Direccion; ?>"><br>
        Número de Piezas<br>
        <input type="number" name = "nroPiezas" id = "nroPiezas" min = 1 placeholder="Número de piezas" value="<?php echo $nroPiezas; ?>"><br>
        Precio por día<br>
        <input type="number" name = "Precio" id = "Precio" min = 1 placeholder = "Precio" value="<?php echo $Precio; ?>"><br>
        Descripción<br>
        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" placeholder="Descripción de la cabaña"><?php echo $Descripcion; ?></textarea><br>
        Características<br>
        <section>
            <label for=""><input type="checkbox" name="Wifi" id="Wifi" <?php echo $Wifi; ?>>Wifi</label><br>
            <label for=""><input type="checkbox" name="Estacionamiento" id="Estacionamiento" <?php echo $Estacionamiento; ?>>Estacionamiento</label><br>
            <label for=""><input type="checkbox" name="Quincho" id="Quincho" <?php echo $Quincho; ?>>Quincho</label><br>
            <label for=""><input type="checkbox" name="Piscina" id="Piscina" <?php echo $Piscina; ?>>Piscina</label><br>
            <label for=""><input type="checkbox" name="Bodega" id="Bodega" <?php echo $Bodega; ?>>Bodega</label><br>
            <label for=""><input type="checkbox" name="CalefacciónGas" id="CalefacciónGas" <?php echo $CalefacciónGas; ?>>Calefacción a gas</label><br>
            <label for=""><input type="checkbox" name="CalefacciónElectrica" id="CalefacciónElectrica" <?php echo $CalefacciónElectrica; ?>>Calefacción eléctrica</label><br>
            <label for=""><input type="checkbox" name="CalefacciónLenta" id="CalefacciónLenta" <?php echo $CalefacciónLenta; ?>>Combustión lenta</label><br>
        </section>
        <input type="file" name = "Imagen"><br>
        <input type="submit"><br>
    </form>

    <!--Validación-->
    <?php
    if (isset($_POST['Direccion'])) {
    //Ejecución de programa
        //Crear link de dirección - Leaflet
        $DireccionValidada=str_replace(" ","+",$_POST["Direccion"]);
        $Link="https://nominatim.openstreetmap.org/search?city=".$_POST['Ciudad']."&street=".$DireccionValidada."&format=json";  
        $httpOptions = [
            "http"=>[
                "method"=>"GET",
                "header"=>"User-Agent:Nominatim-Test"
            ] 
        ];
        $streamContext=stream_context_create($httpOptions);
        $json=file_get_contents($Link,false,$streamContext);
        $decoded=json_decode($json,true);

    //Verificación de errores
        //Definir arrelgo
        $errores = array();

        //Campos vacíos
        if ($Direccion == "" || $nroPiezas == "" || $Descripcion == "" || $Precio == "") {
            array_push($errores, "Debe rellenar todos los datos.");
        }

        //Ciudad seleccionada
        if ($Ciudad == "") {
            array_push($errores, "Debe Seleccionar una ciudad.");
        }

        //Dirección válida
        if(!$decoded){
            array_push($errores, "Debe ingresar una dirección válida.");
        }else{           
            $lat=$decoded['0']["lat"];
            $lng=$decoded['0']["lon"];       
        }

    //Resultado de POST
        //Si existen errores
        if (count($errores) > 0) {
            foreach ($errores as $i => $value) {
                echo $value . "</br>";
            }

        //Si los datos son ingresados correctamente  
        } else {
            //Transformar checkbox
            $Wifi = TransformarON($Wifi);

            //Insertar cabaña en DB
            include ("Backend\conection.php");
            $insertar = "INSERT INTO `nuevocabanasdb`.`cabana` (`Ciudad`, `Estado`, `Wifi`, `NroPiezas`, `Estacionamiento`, `Precio`, `Descripcion`, `Direccion`, `Latitud`, `Longitud`, `Persona_idPersona`) VALUES ('$Ciudad', '0', '$Wifi', '$nroPiezas', '$Estacionamiento', '$Precio', '$Descripcion' , '$Direccion' , '$lat' , '$lng' , '$idPersona')";
            mysqli_query($enlace, $insertar);              
            
            //Recuperar ID de cabaña
            $idCabana =  mysqli_fetch_assoc(mysqli_query($enlace, "SELECT MAX(idCabana) FROM nuevocabanasdb.cabana where Persona_idPersona = '$idPersona'"));    
            mysqli_close($enlace);

            //Subir foto al servidor
            $ruta = "Fotos Cabanas/";
            $fichero = $ruta.basename($_FILES['Imagen']['name']);
            if(move_uploaded_file($_FILES['Imagen']['tmp_name'], $ruta.$idCabana['MAX(idCabana)'].'.jpg')){
                echo "Subió";
            }

            //Volver a index
            header("location:index.php"); 
        }
    }
    ?>
</body>

</html>