<?php
    include_once 'lib/connect.php';
    class modelBase{

        public $conexion;

        public function __construct() {
            
            $this->conexion = new Connect();
            
        }
        
    }


?>
