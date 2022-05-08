<?php
session_start();
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
            echo "<form action='leerlogin.php' method='POST' enctype='multipart/form-data'>
            <div>
                <label for='usuario'>User: </label>
                <input type='text' name='usuario' id='usuario'>
            </div>
            <div>
                <label for='clave'>Password: </label>
                <input type='password' name='clave' id='clave'>
            </div>
            <input type='submit' name='enviar' value='ENVIAR'>
        </form>";
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
        echo "<form action='Disconnect.php' method='POST'>
            ".$this->mostrarBoton("editprofile","editprofile")."
            ".$this->mostrarBoton("Desconectar","exit").
        "</form>
            ";
    }
}
?>