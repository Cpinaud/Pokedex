<?php
session_start();
include_once ("Valida.php");
include_once ("header.php");
include_once ("Database.php");
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
                          <form action='closeDelete.php' method='POST'>
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
                      <form action='closeDelete.php' method='POST' >
                        <button type='submit' name='delete'  data-bs-dismiss='modal' class='btn btn-success' aria-label='Close' value='on'>SI</button>
                        <input type='text' name='id'  value = '".$id."' style='display:none !important' > 
                        <button type='submit' name='close'  data-bs-dismiss='modal' class='btn btn-danger' aria-label='Close'>NO</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>";
            }else{
                echo"el pokemon no se puede eliminar porque no existe";
            }
    }else{
            echo"<span id='errorConexion'>No se puedo conectar con la base de datos</span>";
        }
    }
    }     
   
 }

 public function mostrarPopUpPokemonEliminado(){
        
        
  if(isset($_GET["deleted"])){
       
       $deleted=$_GET["deleted"];
       if(isset($_SESSION['logueado'])){
              
               if($deleted==1){
                   $message = "Pokemon Eliminado";
               }else{
                 $message = "Surgió un error al intentar eliminar el Pokemón, intente nuevamente mas tarde";
               }
               echo"<div class='modal' tabindex='-1' style='display:flex'>
                   <div class='modal-dialog'>
                     <div class='modal-content'>
                       <div class='modal-header'>
                         <h5 class='modal-title'>".$message."</h5>
                         <form action='closeDelete.php' method='POST'>
                           <button type='submit' name='close' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                         </form>
                       </div>
                     </div>
                   </div>
                 </div>";
       }
   
   } 
}

public function mostrarPopUpDetallePokemon(){
        
        
  if(isset($_GET["muestra"])){
       
    $muestra=$_GET["muestra"];  
    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
     
    echo"<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
          ...
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
          <button type='button' class='btn btn-primary'>Save changes</button>
        </div>
      </div>
    </div>
  </div>";          
  } 
}

public function mostrarPopUpPokemonAgregado(){
        
        
  if(isset($_GET["inserted"])){
       
       $inserted=$_GET["inserted"];
       if(isset($_SESSION['logueado'])){
              
               if($inserted==1){
                   $message = "Pokemon Agregado";
               }else if($inserted==0){
                  $message = "Pokemon modificado";
               }else{
                  $message = "Surgió un error al intentar agregar el Pokemón, intente nuevamente mas tarde";
               }
               echo"<div class='modal' tabindex='-1' style='display:flex'>
                   <div class='modal-dialog'>
                     <div class='modal-content'>
                       <div class='modal-header'>
                         <h5 class='modal-title'>".$message."</h5>
                         <form action='closeDelete.php' method='POST'>
                           <button type='submit' name='close' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                         </form>
                       </div>
                     </div>
                   </div>
                 </div>";
       }
   
   } 
}

public function mostrarPopUpCodigoONombreExistente(){
        
        
  if(isset($_GET["exist"])){
       
       $exist=$_GET["exist"];
       if(isset($_SESSION['logueado'])){
            if(isset($_GET["id"])){
       
              $id=$_GET["id"];
            }
               
                   $message = "Codigo o Nombre ya existentes";
               
               echo"<div class='modal' tabindex='-1' style='display:flex'>
                   <div class='modal-dialog'>
                     <div class='modal-content'>
                       <div class='modal-header'>
                         <h5 class='modal-title'>".$message."</h5>
                         <form action='closeDelete.php?exist=$exist&id=$id' method='POST'>
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
include_once ("footer.php");
?>