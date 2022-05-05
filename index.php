<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<body>
    <div class="contenido">
        <form action="login.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="usuario">User: </label>
                <input type="text" name="usuario" id="usuario">
            </div>
            <div>
                <label for="clave">Password: </label>
                <input type="password" name="clave" id="clave">
            </div>
            <input type="submit" name="enviar" value='ENVIAR'>
        </form>
    </div>
</body>
</html>