<?php
    include_once("header.php");
?>
<body>
<header>
    <div class="row justify-content-between align-items-center">
        <div class="col-5 logo">
            <img class="img-fluid" src="img/pokebola.png" alt="" style="border:2px solid black">
            <img class="img-fluid" src="img/logopokedex.png" alt="" style="border:2px solid black">
        </div>
            <div class='col-5 row'>
                        
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
                        ?>
            </div>    
    </div>  
</header>

<div class="wrapper">
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

        include_once("pokemones.php");
        include_once("footer.php");
    ?>
    </div>
</body>
</html>
   
   
   