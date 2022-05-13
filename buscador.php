<?php
    include_once("header.php");
    echo"
    
        <div class='container-fluid'>
        <nav class='navbar '>   
    <form action='index.php' method='POST' class='input-group'>
        <input class='form-control me-2 buscador' type='search' placeholder='Qué Pokemon estás buscando?' aria-label='Search' name='search' autofocus>
        <button class='btn btn-outline-success busqueda' type='submit'>Encontrarlo!</button>
    </form>

    </nav>
    </div>
    ";
    include_once("footer.php");
    
?>