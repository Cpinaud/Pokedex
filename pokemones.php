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
        for($i=0;$i<$cantPokemones;$i++){
            $fila = $pokemones->fetch_assoc();

        echo"el Pokemon con id : ".$fila["id"]." tiene el nombre: ".$fila["nombre"]."</br>";
        }
        ?>