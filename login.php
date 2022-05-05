<?php
    $usuario = $_POST["usuario"];
    $password = $_POST["clave"];
    $enviado = $_POST["enviar"];
    if($enviado){
        $config = parse_ini_file("config.ini");
        
        if($config["usuario"]==$usuario && $config["clave"]==$password){
            $config = parse_ini_file("config.ini");
            $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{

                $sql = "SELECT Count(id) FROM tipos_pokemon ";
                $comando = $conexion->prepare($sql);
                $password = md5($password);
    
               
                
                $comando->execute();
                $resultado = $comando->get_result();
                $cantTipos = $resultado->fetch_assoc();
                $cantTipos= $cantTipos["Count(id)"];

                $sql = "SELECT * FROM tipos_pokemon ";
                $comando = $conexion->prepare($sql);
                         
                
                $comando->execute();
                $resultado = $comando->get_result();
                for($i=0;$i<$cantTipos;$i++){
                    $fila = $resultado->fetch_assoc();
        
                echo"el Tipo: ".$fila["nombre"]." tiene el id: ".$fila["id"]."<br/>";
                }
                
        
                $conexion->close();
    
            }
            
    
        }else{
            echo"User y/o Pass invalidos";
        }
        
    }
?>