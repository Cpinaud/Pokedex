<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
    <?php
        include_once("Valida.php");
        include_once("Login.php");


        if(isset($_SESSION["logueado"])){
            $log = new Login(1);
            $log->mostrarMenu();
        }else{
            $log = new Login(0);
            $log->mostrarLogin();
        }
       /* if(!isset($_POST["exit"])) {
            $log = new Login(0);
            $log->mostrarLogin();
        }else if(isset($_SESSION["logueado"])){
            $log = new Login(0);
            $log->mostrarLogin();
        }else{
            $log = new Login(1);
            $log->mostrarMenu();
        }*/

    ?>
    <div class="contenido">
    <?php
        include_once("pokemones.php");
    ?>
        
    </div>
</body>
</html>