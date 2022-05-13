<?php
    include_once("header.php");
    include_once("footer.php");
    include_once "Database.php";
    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
    
        if(isset($_GET["id"])){//SI EXISTE EL ID VA A MODIF O MOSTRAR
            $id = $_GET["id"];
            
            if($sqlConnect){
                $sqlConsult = "SELECT tp.tipo_imagen 'imgTipo',tp.nombre 'nombreTipo',p.* FROM pokemones p,tipos_pokemon tp WHERE p.tipo_id=tp.id AND p.id= '$id'";
                $comando = $sqlConnect->prepare($sqlConsult);
                $comando->execute();
                $buscarPokemon = $comando->get_result();
                $buscarPokemon = $buscarPokemon->fetch_assoc();
                $pokemonNombre= $buscarPokemon["nombre"];
                $pokemonImagen= $buscarPokemon["imagen"];
                $pokemonImgTipo= $buscarPokemon["imgTipo"];
                $pokemonId= $buscarPokemon["id"];
                $pokemonNameTipo= $buscarPokemon["nombreTipo"];
                $pokemonCodigo= $buscarPokemon["numero_id"];
                $pokemonDescripcion= $buscarPokemon["descripcion"];
                if(isset($_GET["alta"])){
                    $alta = $_GET["alta"];
                    if($alta==1){//VA A MOSTRAR DATOS
                        $modificando = false;
                        $agregando = false;
                    }else{//VA A MODIFICAR
                        $modificando = true;
                        $agregando = false;
                    }
                }
                
                
                
            }else{
                echo"<span id='errorConexion'>No se puedo conectar con la base de datos</span>";
            }
        }else{//VA A AGREGAR
            $modificando = false;
            $agregando = true;
        }
        
    

?>

<?php
    include_once("mostrarImagen.php");


?>




<?php
 
    
        if($modificando==true || $agregando==true){
          if($modificando==true){//CARGA VARIABLES CON LOS DATOS BAJADOS DE LA BD
            $codigo =$pokemonCodigo;
            $nombre = $pokemonNombre;
            $descripcion = $pokemonDescripcion;
            $tipo = $pokemonNameTipo;
            $boton = "MODIFICAR";
            $imagen = "<div style='width:40%;'>
                            <p>Imagen actual</p>
                      
                        
                            <img src='" . mostrar_imagen('img/pokemones', $pokemonImagen) . "' class='img-fluid' style='border:2px solid #CB2C19;'>
                        </div> 
                        ";
          }else{//CARGA VARIABLES VACIAS
            $codigo ="";
            $nombre ="";
            $imagen = "<div style='width:40%;'>
                            
                        </div> 
                        ";
            $descripcion ="";
            $tipo ="";
            $boton = "AGREGAR";
          }
          $imagen1 = "<div style='display: flex;flex-direction: row;  padding:2%;align-items:center;'>
          
            ".$imagen."
            <div style='width:25%;'>
                <label for='formFileLg' class='form-label' >Seleccione la nueva imagen</label>
                <input class = 'form-control form-control-lg' type='file' id='seleccionArchivos' accept='image/*'  required>
          </div>
            <div style='width:25%;'>
                <img id='imagenPrevisualizacion' class='img-fluid' style='border:2px solid #CB2C19;'>
                <script src='script.js'></script>
          </div>
          
         
          </div>";
          //MUESTRA FORMULARIO CON/SIN DATOS SEGUN SI SE MODIFICA O AGREGA
            echo " 
        <form method='POST' action='modificarAgregar.php' style='display: flex;flex-direction: column;' >
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
                </div>
                <div style='display:flex;justify-content:end' >
                    <button type='submit' name='agregar' class='btn btn-danger' style='box-shadow: 5px 4px 5px 2px rgba(0,0,0,0.75);' >".$boton." POKEMON </button>
                </div>
                </form>
               ";
        }
        else{//MUESTRA DETALLES DEL POKEMON
        if(isset($_SESSION['logueado'])){//SI ESTA LOGUEADO MUESTRA BOTON MODIFICAR
            $message="<a href='index.php?alta=0&id=".$pokemonId."'><button class='btn btn-danger'>MODIFICAR</button></a>";
        }else{
            $message=" ";
        }
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
        <div>
        ".$message."
        </div>
        </div>"
        ;
   
    }
    include_once("footer.php");
    ?>
    