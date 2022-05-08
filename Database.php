<?php
class Database{
    private $rutaConfig;
public function __construct($rutaConfig){
    $this->rutaConfig=$rutaConfig;
    $this->conectar();
}

private function conectar(){
    parse_ini_file($this->rutaConfig);
    mysqli_connect($this->rutaConfig["host"],$this->rutaConfig["usuario"],$this->rutaConfig["clave"],$this->rutaConfig["base"]);
}
public function isConnected(){
    return $this->rutaConfig->ping();
}
}
?>
