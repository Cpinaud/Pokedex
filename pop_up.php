<?php
session_start();
include_once ("Valida.php");
include_once ("header.php");
include_once "Database.php";
class Popup
{
    

    public function mostrarPopUpCredencialesInvalidas(){
        
        
   if(isset($_GET["valid"])){
        
        $valid=$_GET["valid"];
        if(!isset($_SESSION['logueado'])){
               
                if($valid==1){
                    echo"<div class='modal' tabindex='-1' style='display:flex'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title'>Usuario o contraseña incorrectos</h5>
                          <form action='close.php' method='POST'>
                            <button type='submit' name='close' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>";
                }
                
        }
    
    } 
}

public function mostrarPopUpEliminarPokemon(){
        
    if(isset($_GET["delete"])){
      if(isset($_GET["id"])){
        $id = $_GET["id"];
        $database= new Database("config.ini");
        $sqlConnect = $database->isConnected();
        if($sqlConnect){
            $sqlConsult = "SELECT nombre FROM pokemones WHERE id= '$id'";
            $comando = $sqlConnect->prepare($sqlConsult);
            $comando->execute();
            $resultado = $comando->get_result();
            $resultado = $resultado->fetch_assoc();
            $resultado = $resultado["nombre"];
            if($resultado){
                echo"<div class='modal' tabindex='-1' style='display:flex'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title'>Desea eliminar a ".$resultado." ?</h5>
                      <form action='close.php' method='POST'>
                        <button type='submit' name='close' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>SI</button>
                        <button type='submit' name='delete.php' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>NO</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>";
            }else{
                echo"pokemon no existe";
            }
    }else{
            echo"<span id='errorConexion'>No se puedo conectar con la base de datos</span>";
        }
    }
    }     
   
 }

}
include_once ("footer.php");
?>