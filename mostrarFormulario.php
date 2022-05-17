<?php
    include_once("Database.php");
    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
    $sqlConsult = "SELECT * FROM tipos_pokemon";
    $comando = $sqlConnect->prepare($sqlConsult);
    $comando->execute();
    $buscarPokemon = $comando->get_result();
    $tipos = $buscarPokemon->fetch_assoc();
    $combo = "";
    while($tipos){
        $tipo_id = $tipos["id"];
        $nombre_id = $tipos["nombre"];
        if($tipo==$nombre_id){
            $selected="selected";
        }else{
            $selected=" ";
        }
        $option =  "<option value='".$tipo_id."' $selected>".$nombre_id."</option> ";
        $combo = $combo.$option;
        $tipos = $buscarPokemon->fetch_assoc();
    }
    
      echo " 
      <form action='modificarAgregar.php' method='POST'  name='formulario' id='formulario' style='display: flex;flex-direction: column;'  enctype='multipart/form-data'>
      
              <div style='display: flex;flex-direction: row;text-align:center;justify-content:space-around'>
                  <div style='width: 40%;'>
                      <label for='formFile' class='form-label'>Codigo</label>
                      <input class='form-control' type='text' id='codigo' name='codigo' value='".$codigo."' style='border: 2px solid black;' required ".$flag2."  maxlength='6' minlength='6'>
                      ".$newCode."
                  </div>
                  <div style='width: 40%;'>
                      <label for='formFileDisabled' class='form-label'>Nombre</label>
                      <input class='form-control' type='text' id='name' name='nombre' multiple value='".$nombre."' style='border: 2px solid black;' required>
                  </div>
              </div>
              
              
                  ".$imagen1."

              
              <div>
              
                  <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Descripción</label>
                  <textarea class='form-control' id='descripcion' name='descripcion' rows='4' cols='50' style='border: 2px solid black;' required>$descripcion</textarea>
                  </div>
              
                  <div class='mb-3'>
                  <label for='tipos_pokemon'>Tipo</label>

                  <select name='tipos_pokemon' id='tipos_pokemon' >
                  ".$combo."
                  </select>
                  </div>
              </div>
              <div style='display:flex;justify-content:end' >
                  <input type='submit' name='agregar' class='btn btn-danger' style='box-shadow: 5px 4px 5px 2px rgba(0,0,0,0.75);' value='".$boton." POKEMON'> </input>
                  <script src='script.js'></script>
                  <script src='validacion.js'></script>
              </div>

              </form>
             ";
?>