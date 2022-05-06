<?php
   if(isset($_GET["valid"])){
        
        $valid=$_GET["valid"];
        if(isset($_SESSION['logueado'])){
            
            echo"Logueado";
        }else{
            
                if($valid==1){
                    echo "User o Password inválidos";
                }
                
        }
    
    } 

?>