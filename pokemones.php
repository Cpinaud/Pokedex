<?php
        $config = parse_ini_file("config.ini");
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);
        $sql = "SELECT Count(id) FROM pokemones";
        $comando = $conexion->prepare($sql);
        $comando->execute();
        $cantPokemones = $comando->get_result();
        $cantPokemones = $cantPokemones->fetch_assoc();
        $cantPokemones= $cantPokemones["Count(id)"];

        $sql = "SELECT * FROM pokemones";
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
        for($i=0;$i<$cantPokemones;$i++){
            $fila = $pokemones->fetch_assoc();
            if(isset($_SESSION['logueado'])){
                echo "<tr>
                    <td>".$fila["id"]."</td>
                    <td>".$fila["nombre"]."</td>
                    <td><a href='modificar.php'>Modificar</a></td>
                    <td><a href='eliminar.php'>Eliminar</a></td>
                </tr>";
            }else{
            echo
            "<tr>
                <td>".$fila["id"]."</td>
                <td>".$fila["nombre"]."</td>
            </tr>";
            }
        }
        echo "</table>";
        ?>