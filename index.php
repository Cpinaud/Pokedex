<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pokedex</title>
</head>
<body>
    <?php
        include_once("pop_up.php");
        include_once("Valida.php");
        include_once("Login.php");


        if(isset($_SESSION["logueado"])){
            $log = new Login(1);
            $log->mostrarMenu();
        }else{
            $log = new Popup();
            $log->mostrarPopUp();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</html>