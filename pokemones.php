<?php
        include_once("header.php");
        include_once("mostrarImagen.php");
        include_once("buscador.php");
        $config = parse_ini_file("config.ini");
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);
        if(isset($_POST["search"])){
            $busqueda = $_POST["search"];
            $sql = "SELECT tp.tipo_imagen 'imgTipo',p.* FROM pokemones p,tipos_pokemon tp WHERE p.tipo_id=tp.id AND p.nombre = '$busqueda'";
            $comando = $conexion->prepare($sql);
            $comando->execute();
            $pokemones = $comando->get_result();
            $fila = $pokemones->fetch_assoc();
           if(empty($fila)){
            echo$busqueda." no encontrado en la Pokedex";
           }
        }
        if(!isset($fila)){
          
            $sql = "SELECT tp.tipo_imagen 'imgTipo',p.* FROM pokemones p,tipos_pokemon tp WHERE p.tipo_id=tp.id";
        }
        
        $comando = $conexion->prepare($sql);
        $comando->execute();
        $pokemones = $comando->get_result();
        echo"</br></br>LOS POKEMONES SON:</br></br>";
        echo
        "<table class='table table-responsive'>
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>";
        $fila = $pokemones->fetch_assoc();
        while($fila){

            if(isset($_SESSION['logueado'])){
                echo "<tr>
                    <td>".$fila["id"]."</td>
                    <td>".$fila["nombre"]."</td>
                    <td><img src='".mostrar_imagen('img/pokemones',$fila["imagen"])."' class='img-fluid'style='width: 10%'></td>    
                    <td><img src='".mostrar_imagen('img/tipos',$fila["imgTipo"])."' class='img-fluid img-tipo' style='width: 10%'></td>  
                    <td><a href='modificarAgregar.php?id=".$fila["id"]."'>Modificar</a></td>
                    <td><a href='eliminar.php'>Eliminar</a></td>
                </tr>";
            }else{
            echo
            "<tr>
                <td>".$fila["id"]."</td>
                <td>".$fila["nombre"]."</td>
                <td><img src='".mostrar_imagen('img/pokemones',$fila["imagen"])."' class='img-fluid' style='width: 10%'></td>  
                <td><img src='".mostrar_imagen('img/tipos',$fila["imgTipo"])."' class='img-fluid' style='width: 10%'></td>  
            </tr>";
            }
            $fila = $pokemones->fetch_assoc();
        }
        echo "</table>";
        include_once("footer.php");
        ?>