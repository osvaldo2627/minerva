
<?php
   
    class modelConfReferencia extends modelBase{
        public $config_app;

        public function  __construct($config) {
           parent::__construct();
           $this->config_app = $config;
           
        }
        
        public function configurarReferencia($cadena_update,$referencia){
            $tabla = "tb_".$referencia."_conf";
            $query = "UPDATE $tabla SET ".$cadena_update;
            
            $result = $this->conexion->query($query);
            if (!$result)
                $result['error'] = true;
            
            return $result;
        }
        
        public function getCamposDadoReferencia($referencia){
            $tabla = "tb_".$referencia."_conf";
            
            $query = "SELECT * FROM $tabla";
            $result = $this->conexion->queryAsArray($query);
            
            if (!$result)
                $result['error'] = true;
            
            return $result[0];
        }
        
        public function estandar($descripcion, $nombre){
            
            $query = "DELETE FROM tb_estandar";
            $this->conexion->query($query);
            
            $query = "INSERT INTO tb_estandar(descripcion, nombre) VALUES('$descripcion','$nombre')";
            $result = $this->conexion->query($query);
            if (!$result)
                $result['error'] = true;
            
            return $result;
        }
        
        public function getestandarActual($nombre, $descripcion){
            
            $query = "Select nombre FROM tb_estandar";
            
            $result = $this->conexion->queryAsArray($query);
            if (!$result)
                $result['error'] = true;
            else
                $result['nombre'] = $result[0]['nombre'];
            
            return $result;
        }
        
      
    }

?>


