<?php
//Recibir datos POST
$Descripcion = ComprobarPost("Descripcion");

//Función - Validar campos
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
  <link rel="stylesheet" href="Index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <title>Web cabañas</title>
</head>
<body>
    <!--formulario-->
    <form action="IngresoCabana.php" method = "POST">
        Ciudad
        <select name="Ciudad" id="Ciudad">
            <option value="Ancud">Ancud</option>
            <option value="Calbuco">Calbuco</option>
            <option value="Castro">Castro</option>
            <option value="Chaitén">Chaitén</option>
            <option value="Chonchi">Chonchi</option>
            <option value="Cochamó">Cochamó</option>
            <option value="Curaco de Vélez">Curaco de Vélez</option>
            <option value="Dalcahue">Dalcahue</option>
            <option value="Fresia">Fresia</option>
            <option value="Frutillar">Frutillar</option>
            <option value="Futaleufú">Futaleufú</option>
            <option value="Llanquihue">Llanquihue</option>
            <option value="Los Muermos">Los Muermos</option>
            <option value="Maullín">Maullín</option>
            <option value="Osorno">Osorno</option>
            <option value="Palena">Palena</option>
            <option value="Puerto Montt">Puerto Montt</option>
            <option value="Puerto Octay">Puerto Octay</option>
            <option value="Puerto Varas">Puerto Varas</option>
            <option value="Puqueldón">Puqueldón</option>
            <option value="Purranque">Purranque</option>
            <option value="Puyehue">Puyehue</option>
            <option value="Queilén">Queilén</option>
            <option value="Quellón">Quellón</option>
            <option value="Quemchi">Quemchi</option>
            <option value="Quinchao">Quinchao</option>
            <option value="Río Negro">Río Negro</option>
            <option value="San Juan de la Costa">San Juan de la Costa</option>
            <option value="San Pablo">San Pablo</option>
        </select><br>
        <!--Mapa-->
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([-41.471831, -72.939546], 18);
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                maxZoom: 18
            }).addTo(map);
            L.control.scale().addTo(map);
        </script>
        <style>
            #map{
            margin: left;
            width: 50%;
            height: 400px;
            box-shadow:5px 5px 5px #888;
        }
        </style>
        Descripción Cabaña<br>
        <textarea name = "Descripcion" id = "Descripcion" placeholder = "Descripción de cabaña." value = "<?php echo $Descripcion;?>" cols="30" rows="10"></textarea><br>
        <input type="submit" value = "Refrescar Mapa">
    </form> 
    <!--Validación-->
        <?php
            if(isset($_POST['Descripcion'])){  
            //Definir Mapa      
                $DescripcionValidada=str_replace(" ","+",$_POST["Descripcion"]);
                $Direccion="https://nominatim.openstreetmap.org/search?city=".$_POST['Ciudad']."&street=".$DescripcionValidada."&format=json";  
                $httpOptions = [
                    "http"=>[
                        "method"=>"GET",
                        "header"=>"User-Agent:Nominatim-Test"
                    ] 
                ];
                
            //Arreglo
                $errores = array();

            //Verificación de errores
                //Campos vacíos
                if($Descripcion == ""){
                    array_push($errores, "Debe rellenar todos los datos.");
                }
        
            //Resultado de POST
                //Si existen errores
                if(count($errores) > 0){
                    foreach ($errores as $i => $value) {
                        echo $value."</br>";
                    }                        
                //Si los datos son ingresados correctamente  
                }else{
                    $streamContext=stream_context_create($httpOptions);
                    $json=file_get_contents($Direccion,false,$streamContext);
                    $decoded=json_decode($json,true);
                    $lat=$decoded['0']["lat"];
                    $lng=$decoded['0']["lon"];
                    echo "<script>"."L.marker([".$lat.",".$lng."]).addTo(map);"."</script>";
                    echo $Direccion;
                }
            }    
        ?>
</body>
</html>