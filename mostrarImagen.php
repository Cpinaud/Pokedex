<?php  
                function mostrar_imagen($rutaImagen,$nombreImagen){
                    // Se comprueba que realmente sea la ruta de un directorio
                    
                    if (is_dir($rutaImagen)){
                        // Abre un gestor de directorios para la ruta indicada
                        $gestor = opendir($rutaImagen);

                        // Recorre todos los archivos del directorio
                        
                            // Solo buscamos archivos sin entrar en subdirectorios
                            if (is_file($rutaImagen.$nombreImagen)) {
                                return "$rutaImagen.$nombreImagen";
                            }else{
                                return "Imagen no encontrada";
                            }         
                        

                        // Cierra el gestor de directorios
                        closedir($gestor);
                    } else {
                        return  "No es una ruta de directorio valida<br/>";
                    }
                    
                }
                          
            ?>