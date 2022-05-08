<?php
session_start();
include_once ("Valida.php");
class Popup
{
    

    public function mostrarPopUp(){
        
        
   if(isset($_GET["valid"])){
        
        $valid=$_GET["valid"];
        if(!isset($_SESSION['logueado'])){
               
                if($valid==1){
                    echo "Usuario y/o Password incorrectas";
                }
                
        }
    
    } 
}
}

?>