<?php
    if(isset($_GET["valid"])){
        $valid=$_GET["valid"];
        if($valid==1){
            echo"<form action='leerlogin.php' method='POST' enctype='multipart/form-data'>
            <div>
                <label for='usuario'>User: </label>
                <input type='text' name='usuario' id='usuario'>
            </div>
            <div>
                <label for='clave'>Password: </label>
                <input type='password' name='clave' id='clave'>
            </div>
            <input type='submit' name='enviar' value='ENVIAR'>
        </form>";
        }else{
            echo"USUARIO LOGUEADO";
        }
        

    }else{
        echo"<form action='leerlogin.php' method='POST' enctype='multipart/form-data'>
            <div>
                <label for='usuario'>User: </label>
                <input type='text' name='usuario' id='usuario'>
            </div>
            <div>
                <label for='clave'>Password: </label>
                <input type='password' name='clave' id='clave'>
            </div>
            <input type='submit' name='enviar' value='ENVIAR'>
        </form>";
    }

?>