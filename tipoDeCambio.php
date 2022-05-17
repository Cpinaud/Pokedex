<?php

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
    }elseif(isset($_SESSION["logueado"])){//VA A AGREGAR
        $modificando = false;
        $agregando = true;
    }else{
		header("location: Index.php?valid=0");
		exit();
	}
	
    ?>