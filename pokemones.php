<?php
        include_once("header.php");
        
        include_once("buscador.php");
        $config = parse_ini_file("config.ini");
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);
        if(isset($_POST["search"])){
            $busqueda = $_POST["search"];
            $sql = "SELECT * FROM pokemones WHERE nombre = '$busqueda'";
            $comando = $conexion->prepare($sql);
            $comando->execute();
            $pokemones = $comando->get_result();
            $fila = $pokemones->fetch_assoc();
           if(empty($fila)){
            echo$busqueda." no encontrado en la Pokedex";
           }
        }
        if(!isset($fila)){
          
            $sql = "SELECT * FROM pokemones";
        }
        
        $comando = $conexion->prepare($sql);
        $comando->execute();
        $pokemones = $comando->get_result();
        echo"</br></br>LOS POKEMONES SON:</br></br>";
        echo
        "<table>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                </tr>";
        $fila = $pokemones->fetch_assoc();
        while($fila){
            
            if(isset($_SESSION['logueado'])){
                echo "<tr>
                    <td>".$fila["id"]."</td>
                    <td>".$fila["nombre"]."</td>
                    <td><a href='modificarAgregar.php?id=".$fila["id"]."'>Modificar</a></td>
                    <td><a href='eliminar.php'>Eliminar</a></td>
                </tr>";
            }else{
            echo
            "<tr>
                <td>".$fila["id"]."</td>
                <td>".$fila["nombre"]."</td>
            </tr>";
            }
            $fila = $pokemones->fetch_assoc();
        }
        echo "</table>";
        
        ?>