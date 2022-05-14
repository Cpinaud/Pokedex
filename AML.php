<?php
    include_once("header.php");
    
    include_once "Database.php";
    //determina si está modificando o agregando
    include("tipoDeCambio.php")
    
     
?>

<?php
    include_once("mostrarImagen.php");


?>




<?php
 
    
        if($modificando==true || $agregando==true){
          if($modificando==true){//SI MODIFICA, CARGA VARIABLES CON LOS DATOS BAJADOS DE LA BD
            $codigo =$pokemonCodigo;
            $nombre = $pokemonNombre;
            $descripcion = $pokemonDescripcion;
            $tipo = $pokemonNameTipo;
            $boton = "MODIFICAR";
            $flag = " ";
            $imagen = "<div style='width:40%;'>
                            <p>Imagen actual</p>
                      
                        
                            <img src='" . mostrar_imagen('img/pokemones', $pokemonImagen) . "' class='img-fluid' style='border:2px solid #CB2C19;'>
                        </div> 
                        ";
          }else{//SI DA DE ALTA, CARGA VARIABLES VACIAS
            $codigo ="";
            $nombre ="";
            $imagen = "<div style='width:40%;'>
            <img src=''  class='img-fluid' style='border:2px solid #CB2C19;' name='file'>
                        </div> 
                        ";
            $descripcion ="";
            $tipo ="";
            $boton = "AGREGAR";
            $flag = "required";
          }
          //
          $imagen1 = "<div style='display: flex;flex-direction: row;  padding:2%;align-items:center;'>
          
            ".$imagen."
            <div style='width:20%;'>
                <label for='formFileLg' class='form-label' >Seleccione la nueva imagen</label>
                <input class = 'form-control form-control-lg' type='file' name='file' id='seleccionArchivos'  ".$flag.">
          </div>
            <div style='width:20%;'>
                <img id='imagenPrevisualizacion' class='img-fluid'  style='border:2px solid #CB2C19;'>
                <script src='script.js'></script>
          </div>
          
         
          </div>";
          //MUESTRA FORMULARIO CON/SIN DATOS SEGUN SI SE MODIFICA O AGREGA
          include_once("mostrarFormulario.php");
          
        }
        else{//MUESTRA DETALLES DEL POKEMON
        include_once("mostrarDetalle.php");
    }
    include_once("footer.php");
    ?>
    