<?php
class Database{
    private $rutaConfig;
    private $conexion;
    
    
public function __construct($rutaConfig){
    $this->rutaConfig=$rutaConfig;
    $this->conectar();
}

private function conectar(){
    $this->config=parse_ini_file($this->rutaConfig);
   $this->conexion = mysqli_connect($this->config["host"],$this->config["usuario"],$this->config["clave"],$this->config["base"]);
}
public function isConnected(){
    return $this->conexion;
}
}
?>
