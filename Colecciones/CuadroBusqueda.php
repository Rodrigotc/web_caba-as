<!--Estilo Formulario-->
<style>
  .formulario {
    display: flex;
    margin: auto;
    margin-top: 40px;
    margin-bottom: 40px;
    padding: 0.6rem;
    gap: 10px;
    width: 70%;
    background-color: rgba(140, 116, 6, 255);
    border-radius: 10px;
  }
</style>

<!--Formulario-->
<form class="formulario" action="Busqueda.php">
  <!--Select-->
  <select class="form-select" name="Ciudad" id="Ciudad" selected="Ancud" required>
    <option value="" hidden>---Seleccionar Ciudad---</option>
    <option value="" style="font-weight:bold">Todas las ciudades</option>
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
  </select>

  <!--Dropdown-->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      Filtros
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <div class="ps-4 pe-4" style="width: 208px">
        <input class="form-check-input" type="checkbox" name="Wifi" id="Wifi"><label class="form-check-label" for="flexCheckDefault">Wifi</label><br>
        <input class="form-check-input" type="checkbox" name="Estacionamiento" id="Estacionamiento"><label class="form-check-label" for="flexCheckDefault">Estacionamiento</label><br>
        <input class="form-check-input" type="checkbox" name="Quincho" id="Quincho"><label class="form-check-label" for="flexCheckDefault">Quincho</label><br>
        <input class="form-check-input" type="checkbox" name="Piscina" id="Piscina"><label class="form-check-label" for="flexCheckDefault">Piscina</label><br>
        <input class="form-check-input" type="checkbox" name="Bodega" id="Bodega"><label class="form-check-label" for="flexCheckDefault">Bodega</label><br>
        <input class="form-check-input" type="checkbox" name="CalefaccionGas" id="CalefaccionGas"><label class="form-check-label" for="flexCheckDefault">Calefacción a gas</label><br>
        <input class="form-check-input" type="checkbox" name="CalefaccionElectrica" id="CalefaccionElectrica"><label class="form-check-label" for="flexCheckDefault">Calefacción eléctrica</label><br>
        <input class="form-check-input" type="checkbox" name="CalefaccionLenta" id="CalefaccionLenta"><label class="form-check-label" for="flexCheckDefault">Combustión lenta</label><br>
      </div>
    </ul>
  </div>

  <!--Enviar-->
  <button type="submit" class="btn btn-primary">Buscar</button>
</form>