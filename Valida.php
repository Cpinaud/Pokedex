<?php
    class Valida
    {
        private $variable;

        public function __construct($variable)
        {
            $this->variable = $variable;
        }

        public function validarLogueado()
        {
            return $this->variable == 1;
        }
    }
    //$_GET["logueado"]==1
?>