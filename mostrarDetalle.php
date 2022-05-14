<?php
if(isset($_SESSION['logueado'])){//SI ESTA LOGUEADO MUESTRA BOTON MODIFICAR
    $message="<a href='index.php?alta=0&id=".$pokemonId."'><button class='btn btn-danger'>MODIFICAR</button></a>";
}else{
    $message=" ";
}
echo "

<div class='row justify-content-center align-items-center contenedor-detalles'>

<div class='col-3 '>
        <img src='" . mostrar_imagen('img/pokemones', $pokemonImagen) . "' class='img-fluid'>  
</div>
<div class='col-5'>
    <div>
        <img src='" . mostrar_imagen('img/tipos', $pokemonImgTipo) . "' class='img-fluid img-tipo'>      
    </div>
    <div>
        <h2>" . $pokemonNombre . "</h2>      
    </div>
    <div >
        <p>" . $pokemonDescripcion . "</p>      
    </div>
</div>
<div>
".$message."
</div>
</div>"
;
?>