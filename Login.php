
<?php
include_once("header.php");
include_once ("Valida.php");

class Login
{
    private $logueado;

    public function __construct($logueado)
    {
        $this->logueado = $logueado;
    }

    public function mostrarLogin(){
        if (!isset($_SESSION["logueado"]) && !$this->isLoged()) {
            echo "
                <div class='container-fluid '>
                <form class='row justify-content-around' action='leerlogin.php' method='POST' enctype='multipart/form-data'>
                    <input class='col-3' type='text' name='usuario' id='usuario' placeholder='Usuario' >
                    <input class='col-3' type='password' name='clave' id='clave' placeholder = 'contraseña'>            
                    <input class='col-3 button1' type='submit' name='enviar' value='LogIn'>
                </form>
                </div>";
        }else{
            $this->mostrarMenu();
        }
    }

    private function isLoged(){
        if($this->logueado==1)
            return true;
        else return false;
    }
    public function desconectar(){
        $this->logueado=false;
        session_unset();
        session_destroy();
    }

    private function mostrarBoton($value,$name)
    {
        if($name=='exit'){
            if(isset($_SESSION['logueado'])){
                return "<input type='submit' value='".$value."' name='".$name."'>";
            }
        }else{
            return "<input type='submit' value='".$value."' name='".$name."'>";
        }


    }
    public function mostrarMenu(){
        echo "<form  action='Disconnect.php' method='POST'>
           
            ".$this->mostrarBoton("Desconectar","exit").
        "</form>
        
            ";
    }
}
include_once("footer.php");
?>