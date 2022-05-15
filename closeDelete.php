<?php
    if(isset($_POST["close"])){
        if(isset($_GET["exist"])){
            if($_GET["exist"]==0){
                header("location: index.php?alta=1");
            }else{
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                }
                header("location: index.php?alta=1&id=$id");
            }
            
            
        }else{
            header("location: Index.php");
        }
        
        
    }
    if(isset($_POST["delete"])){

       
        $config = parse_ini_file("config.ini");
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);
        

       
            if(isset($_POST["id"])){
                $busqueda = $_POST["id"];
                $sql = "SELECT imagen FROM pokemones WHERE  id = '$busqueda'";
                $comando = $conexion->prepare($sql);
                $comando->execute();
                $pokemones = $comando->get_result();
                $fila = $pokemones->fetch_assoc();
                $img = $fila["imagen"];
                
                
                if(!empty($fila)){
                    $sql = "DELETE FROM pokemones WHERE id = '$busqueda'";
                    $comando = $conexion->prepare($sql);
                    $comando->execute();
                    unlink('./img/pokemones'.$img);
                    if($comando){
                        header("location: Index.php?deleted=1");
                    }else{
                        header("location: Index.php?deleted=0");
                    }
                }
                }

            }
?>