<?php

    include_once "Database.php";

    if(isset($_SESSION["logueado"])){
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $database= new Database("config.ini");
            $sqlConnect = $database->isConnected();
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
            echo "<h1>PROBANDO PAPA</h1>         ";
            $agregando = true;
        }
    }

?>

<?php
    include_once("mostrarImagen.php");


?>




<?php
    if($agregando){
        echo " <div class='mb-3'>
                  <label for='formFile' class='form-label'>Cógido</label>
                  <input class='form-control' type='text' id='codigo' name='codigo'>
                </div>
                <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Nombre</label>
                  <input class='form-control' type='text' id='nombre' name='nombre' multiple>
                </div>
                <div class='mb-3'>
                  <label for='formFileDisabled' class='form-label'>Descripción</label>
                  <input class='form-control' type='text' id='descripcion' name='descripcion'>
                </div>
               
                <div class='mb-3'>
                  <label for='formFileLg' class='form-label'>Cargue su imágen</label>
                  <input class='form-control form-control-lg' id='imagen' type='file'>
                </div> <div class='mb-3'>
                  <label for='formFileSm' class='form-label'>Tipo</label>
                   <div class='dropdown'>
                 <a class='btn btn-danger dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                    Dropdown link
                  </a>
                 <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                        <li><a class='dropdown-item href='#'>aaaaaa</a></li>
                       <li><a class='dropdown-item href='#'>bbbbbbb</a></li>
                 </ul>
                    </div>
                </div>
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
    



