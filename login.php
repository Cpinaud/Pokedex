<?php
    $usuario = $_POST["usuario"];
    $password = $_POST["clave"];
    $enviado = $_POST["enviar"];
    if($enviado){

    
        $config = parse_ini_file("config.ini");
        
        $conexion =mysqli_connect($config["host"],$config["usuario"],$config["clave"],$config["base"]);

        if (!$conexion) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            $sql = "SELECT * FROM tipos_pokemon ";
            $comando = $conexion->prepare($sql);
            $password = md5($password);

           
            
            $comando->execute();
            $resultado = $comando->get_result();
            $fila = $resultado->fetch_assoc();
    
            var_dump($fila);
    
            $conexion->close();

        }
        
        



        
    }
    ?>
      
    

<!--
    


       

!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<form action="prueba.php" method="post">
    <input type="text" name="usuario" value=""><br>
    <input type="password" name="clave" value=""><br>
    <input type="submit">


</form>
</body>
</html>-->