<?php



include_once("Database.php");
                $codigo=$_POST["codigo"];
                $nombre=$_POST["nombre"];
                $descripcion=$_POST["descripcion"];
                $tipos_pokemon=$_POST["tipos_pokemon"];
                $ext = ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $path = './img/pokemones/';
                $imagen ="/".$nombre.$ext;
                
    
   
    

    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
        if($sqlConnect){
            $sqlConsult = "SELECT id FROM pokemones WHERE numero_id= '$codigo'";
            $comando = $sqlConnect->prepare($sqlConsult);
            $comando->execute();
            $resultado = $comando->get_result();
            $resultado = $resultado->fetch_assoc();
            if(isset($resultado["id"])){
                $resultado = 1;
            }else{
                $resultado = 0;
            }
               
           if($resultado==0){
                //insert
                $sqlConsult = "INSERT INTO pokemones (numero_id,imagen,nombre,tipo_id,descripcion) VALUES ('$codigo','$imagen','$nombre',$tipos_pokemon,'$descripcion')";
                
            }else{
                //update
                $sqlConsult = "UPDATE pokemones Set nombre='$nombre', imagen='$imagen', tipo_id=$tipos_pokemon, descripcion='$descripcion' where numero_id=$codigo";
               
            }
           
                $comando = mysqli_query($sqlConnect, $sqlConsult);
                

            if($comando){
                
                function guardar_imagen(){
                    $agregar = $_REQUEST["agregar"];
                    if($agregar){
                        $nombre=$_POST["nombre"];
                        $path = './img/pokemones/';
                        $archivo=$_FILES['file']['tmp_name'] ;
                        $ext = ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($archivo, $path . basename($nombre).$ext);
                    }
                }
                guardar_imagen(); 
                if($resultado==0){
                    header("location: Index.php?inserted=1");
                }else if($resultado==1){
                    header("location: Index.php?inserted=0");
                }else{
                    echo"Error al modificar / insertar";
                }
            }else{
                echo"Error en la conexion a la base de datos";
            }
        }   
?>