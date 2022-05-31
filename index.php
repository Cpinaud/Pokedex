<?php
    include_once("header.php");
?>
<body>
    <style>
        body{
    padding: 2%;
    font-family:"animeace2_reg";
    font-size:0.8em;

  }
  @font-face {
    font-family: "animeace2_reg";
    src: url('animeace2_reg.otf') format('truetype');
    font-style: normal;
    
 
    
  } 
    </style>
<header>
    <div class="row justify-content-between align-items-center">
        <div class="col-5 logo">
            <img class="img-fluid" src="img/pokebola.png" alt="">
            <a href="index.php"><img class="img-fluid" src="img/logopokedex.png" alt="" style=" width:75% "></a>
        </div>
            <div class='col-5 row'>
                        
                        <?php
                            include_once("pop_up.php");
                            include_once("Valida.php");
                            include_once("Login.php");


                            if(isset($_SESSION["logueado"])){
                                $log = new Login(1);
                                $log->mostrarMenu();
                                $log1 = new Popup();
                                $log1->mostrarPopUpEliminarPokemon();
                                $log2 = new Popup();
                                $log2->mostrarPopUpPokemonEliminado();
                                $log3 = new Popup();
                                $log3->mostrarPopUpPokemonAgregado();
                                $log4 = new Popup();
                                $log4->mostrarPopUpCodigoONombreExistente();
                            }else{
                                $log = new Popup();
                                $log->mostrarPopUpCredencialesInvalidas();
                                $log = new Login(0);
                                $log->mostrarLogin();
                            }
                        ?>
            </div>    
    </div>  
</header>

<div class="wrapper" style="background:img\pokefondo.png">
<ul class="bg-bubbles">
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>
            <li> <img src="img\pokefondo.png"></li>		
	</ul>
</div>

   
    
<div class="contenido-general">
    <?php
        if(isset($_GET["alta"])){
            $alta=$_GET["alta"];
            
            
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                }
                include_once("AML.php");
            


        }else{
            include_once("pokemones.php");
        }

        include_once("footer.php");
    ?>
    </div>
       
</body>
</html>
   
   
   