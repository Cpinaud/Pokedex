<?php
    if(isset($_POST["close"])){
        header("location: Index.php");
        
    }
    if(isset($_POST["delete"])){

       
        $config = parse_ini_file("config.ini");
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);
        

       
            if(isset($_POST["id"])){
                $busqueda = $_POST["id"];
                $sql = "SELECT id FROM pokemones WHERE  id = '$busqueda'";
                $comando = $conexion->prepare($sql);
                $comando->execute();
                $pokemones = $comando->get_result();
                $fila = $pokemones->fetch_assoc();
                if(!empty($fila)){
                    $sql = "DELETE FROM pokemones WHERE id = '$busqueda'";
                    $comando = $conexion->prepare($sql);
                    $comando->execute();
                    if($comando){
                        header("location: Index.php?deleted=1");
                    }else{
                        header("location: Index.php?deleted=0");
                    }
                }
                }

            }
?>