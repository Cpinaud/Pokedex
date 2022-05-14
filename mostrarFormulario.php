<?php
      echo " 
      <form action='modificarAgregar.php' method='POST'  id='formulario' style='display: flex;flex-direction: column;'  enctype='multipart/form-data'>
      
              <div style='display: flex;flex-direction: row;text-align:center;justify-content:space-around'>
                  <div style='width: 40%;'>
                      <label for='formFile' class='form-label'>Codigo</label>
                      <input class='form-control' type='text' id='codigo' name='codigo' value='".$codigo."' style='border: 2px solid black;' required >
                  </div>
                  <div style='width: 40%;'>
                      <label for='formFileDisabled' class='form-label'>Nombre</label>
                      <input class='form-control' type='text' id='nombre' name='nombre' multiple value='".$nombre."' style='border: 2px solid black;' required>
                  </div>
              </div>
              
              
                  ".$imagen1."
              
              <div>
                  <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Descripción</label>
                  <textarea class='form-control' id='descripcion' name='descripcion' rows='4' cols='50' style='border: 2px solid black;' required>$descripcion</textarea>
                  </div>
              
                  <div class='mb-3'>
                  <label for='tipos_pokemon'>Tipo ".$tipo."</label>

                  <select name='tipos_pokemon' id='tipos_pokemon' >
                  <option value='1'>Planta</option>
                  <option value='2'>Veneno</option>
                  <option value='3'>Fuego</option>
                  <option value='4'>Volador</option>
                  <option value='5'>Agua</option>
                  <option value='6'>Bicho</option>
                  <option value='7'>Normal</option>
                  <option value='8'>Electrico</option>
                  <option value='9'>Tierra</option>
                  <option value='10'>Hada</option>
                  <option value='11'>Lucha</option>
                  <option value='12'>Psiquico</option>
                  <option value='13'>Roca</option>
                  <option value='14'>Dragon</option>
                  <option value='15'>Hielo</option>
                  <option value='15'>Fantasma</option>
                  <option value='18'>Acero</option>
                  
                  </select>
                  </div>
              </div>
              <div style='display:flex;justify-content:end' >
                  <input type='submit' name='agregar' class='btn btn-danger' style='box-shadow: 5px 4px 5px 2px rgba(0,0,0,0.75);' value='".$boton." POKEMON'> </input>
                  <script src='script.js'></script>
              </div>
              </form>
             ";
?>