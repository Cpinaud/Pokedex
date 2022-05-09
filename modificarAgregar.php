<?php

    include_once "Database.php";
    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
    
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            
            if($sqlConnect){
                $sqlConsult = "SELECT tp.tipo_imagen 'imgTipo',p.* FROM pokemones p,tipos_pokemon tp WHERE p.tipo_id=tp.id AND p.id= '$id'";
                $comando = $sqlConnect->prepare($sqlConsult);
                $comando->execute();
                $buscarPokemon = $comando->get_result();
                $buscarPokemon = $buscarPokemon->fetch_assoc();
                $pokemonNombre= $buscarPokemon["nombre"];
                $pokemonImagen= $buscarPokemon["imagen"];
                $pokemonImgTipo= $buscarPokemon["imgTipo"];
                $pokemonDescripcion= $buscarPokemon["descripcion"];
                $agregando = false;
        }else{
                echo"<span id='errorConexion'>No se puedo conectar con la base de datos</span>";
            }
        }
        else {
           
            $agregando = true;
        }
    

?>

<?php
    include_once("mostrarImagen.php");


?>




<?php
    if($agregando){
        echo " <form method='POST' action='agregarPokemon.php'>
        
                <div class='mb-3'>
                  <label for='formFile' class='form-label'>Codigo</label>
                  <input class='form-control' type='text' id='codigo' name='codigo' required >
                </div>
                <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Nombre</label>
                  <input class='form-control' type='text' id='nombre' name='nombre' multiple required>
                </div>
                <div class='mb-3'>
                  <label for='formFileLg' class='form-label'>Cargue su imágen</label>
                  <input class='form-control form-control-lg' id='imagen' type='file' required>
                </div> <div class='mb-3'>
                <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Descripción</label>
                  <textarea class='form-control' id='descripcion' name='descripcion' rows='4' cols='50' required></textarea>
                
                </div>
               
                <div class='mb-3'>
                <label for='tipos_pokemon'>Tipo</label>

                <select name='tipos_pokemon' id='tipos_pokemon' required>
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
                <button type='submit' name='agregar'  >AGREGAR </button>
                </form>
               ";
    }else {
        echo "
   
    <div class='row justify-content-center align-items-center contenedor-detalles'>
        
        <div class='col-3 '>
                <img src='" . mostrar_imagen('img/pokemones', $pokemonImagen) . "' class='img-fluid'>  
        </div>
        <div class='col-5'>
            <div>
                <img src='" . mostrar_imagen('img/tipos', $pokemonImgTipo) . "' class='img-fluid img-tipo'>      
            </div>
            <div>
                <h2>" . $pokemonNombre . "</h2>      
            </div>
            <div >
                <p>" . $pokemonDescripcion . "</p>      
            </div>
        </div>
    
    </div>";
    }
    ?>
    



