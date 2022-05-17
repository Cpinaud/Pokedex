<?php



include_once("Database.php");
                $codigo=$_POST["codigo"];
                
                $nombre=$_POST["nombre"];
                $descripcion=$_POST["descripcion"];
                $tipos_pokemon=$_POST["tipos_pokemon"];
                if(!empty($_FILES['file']['name'])){
                    $ext = ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $path = './img/pokemones';
                    $imagen ="/".$nombre.$ext;
                    $imgFlag = 1;
                }else{
                    $imgFlag = 0;
                }
               
               
           //HASTA ACAAAAAA
   

    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
        if($sqlConnect){
            $sqlConsult = "SELECT nombre,imagen FROM pokemones WHERE numero_id= '$codigo'";
            $comando = $sqlConnect->prepare($sqlConsult);
            $comando->execute();
            $resultado = $comando->get_result();
            $resultado = $resultado->fetch_assoc();
            $img = $resultado["imagen"];
            if(isset($resultado["nombre"])){
                $originName = $resultado["nombre"];
                $resultado = 1;
            }else{
                $resultado = 0;
                $originName = $nombre;
            }
        
           if(isset($_POST["id"])){
                $id=$_POST["id"];
                $resultado=1;
           }else{
            $resultado=0;
           }
           if($resultado==0){
                //insert
                $sqlConsult = "INSERT INTO pokemones (numero_id,imagen,nombre,tipo_id,descripcion) VALUES ('$codigo','$imagen','$nombre',$tipos_pokemon,'$descripcion')";
                
            }else if($resultado==1){
                //UPDATE
                $newCodigo=$_POST["newCodigo"];
                if(isset($imagen)){
                    $sqlConsult = "UPDATE pokemones Set nombre='$nombre', imagen='$imagen', tipo_id=$tipos_pokemon, descripcion='$descripcion' where numero_id= '$codigo'";
                    unlink($path.$img);
                }else{
                    $sqlConsult = "UPDATE pokemones Set nombre='$nombre', tipo_id=$tipos_pokemon, descripcion='$descripcion' where numero_id= '$codigo'";
                    
                }
                
               
            }
           
            $comando = mysqli_query($sqlConnect, $sqlConsult);
                

            if($comando){
                
                function guardar_imagen(){
                    $nombre=$_POST["nombre"];
                    $path = './img/pokemones';
                    $archivo=$_FILES['file']['tmp_name'] ;
                    $ext = ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($archivo, $path ."/". basename($nombre).$ext);    
                }
                
                if($imgFlag==1){
                    guardar_imagen(); 
                }
                if($resultado==0){
                    header("location: Index.php?inserted=1");
					exit();
                }else if($resultado==1){
                    $database= new Database("config.ini");
                    $sqlConnect = $database->isConnected();
                    if($nombre!=$originName){
                        $pos = strpos($img, '.');
                        $imgName = substr($img, $pos);    
                        $imagen="/".$nombre.$imgName;
                        $originFile="/".$originName.$imgName;
                        
                        $sqlConsult = "UPDATE pokemones Set imagen='$imagen' where imagen = '$originFile'";
                        $comando = mysqli_query($sqlConnect, $sqlConsult);
                        $path = './img/pokemones';
                        function cambiarNombreImagen($donde, $que,$cambio ){
                            // Se comprueba que realmente sea la ruta de un directorio
                            
                            if (is_dir($donde)){
                                // Abre un gestor de directorios para la ruta indicada
                                $gestor = opendir($donde);
        
                                // Recorre todos los archivos del directorio
                                
                                    // Solo buscamos archivos sin entrar en subdirectorios
                                    if (is_file($donde."/".$que)) {
                                        rename($donde."/".$que,$donde.$cambio);
                                    }        
                                
        
                                // Cierra el gestor de directorios
                                closedir($gestor);
                            } else {
                                return  "No es una ruta de directorio valida<br/>";
                            }
                            
                        }
                        
                        cambiarNombreImagen($path, $originFile,$imagen );

                    }
                    if($codigo!=$newCodigo){
                        $sqlConsult = "SELECT id FROM pokemones WHERE numero_id= '$newCodigo'";
                        $comando = $sqlConnect->prepare($sqlConsult);
                        $comando->execute();
                        $comando = $comando->get_result();
                        $comando = $comando->fetch_assoc();
                        if(isset($comando["id"])){
                           header("location: index.php?exist=$resultado&id=$id");
						   exit();
                          
                        }else{
                            $sqlConsult = "UPDATE pokemones Set numero_id='$newCodigo' where numero_id= '$codigo'";
                            $comando = mysqli_query($sqlConnect, $sqlConsult);
                            
                            header("location: Index.php?inserted=0");
							exit();
                        }
                        
                    }else{
                        header("location: Index.php?inserted=0");
						exit();
                    }
                    
                  
                }
            }else{
                if($resultado==1){
                    header("location: index.php?exist=$resultado&id=$id");
					exit();
                }else{
                    header("location: index.php?exist=$resultado");
					exit();
                }
                
            }
        }else{
                echo"Error en la conexion a la base de datos";
        }
        
?>