<?php
    session_start();
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
        }else{
                echo"<span id='errorConexion'>No se puedo conectar con la base de datos</span>";
            }
        }
    }

?>

<?php
    include_once("mostrarImagen.php");
?>
<!--ACA VA EL INCLUDE DE HEADER-->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    echo"
   
    <div class='row justify-content-center align-items-center contenedor-detalles'>
        
        <div class='col-3 '>
                <img src='".mostrar_imagen('img/pokemones',$pokemonImagen)."' class='img-fluid'>  
        </div>
        <div class='col-5'>
            <div>
                <img src='".mostrar_imagen('img/tipos',$pokemonImgTipo)."' class='img-fluid img-tipo'>      
            </div>
            <div>
                <h2>".$pokemonNombre."</h2>      
            </div>
            <div >
                <p>".$pokemonDescripcion."</p>      
            </div>
        </div>
    
    </div>"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
    </html>




