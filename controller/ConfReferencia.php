<?php
    
    class ConfReferencia extends controllerBase{


        public function  __construct($config){
            
            parent::setAppConfig($config);
            parent::setModelo(__CLASS__);
            
        }


        public function gestionar()
        {
            $result['error'] = false;
            return $result;
        }
        
        public function articulo($data){
            
            $result = $this->actualizarReferencia($data,'articulo');
            return $result;
        }
        
        public function archivosDigitales($data){
            $result = $this->actualizarReferencia($data,'archivos_digitales');
            return $result;            
        }
        
        public function libro($data){
            $result = $this->actualizarReferencia($data,'libro');
            return $result;
        }
        
        private function actualizarReferencia($data, $referencia){
            $result['campos'] = $this->getModel()->getCamposDadoReferencia($referencia);
            if($data['actualizar']!="Actualizar"){
                $result['campos'] = $this->getModel()->getCamposDadoReferencia($referencia);
                
                if ($result['error'] == true)
                    $result['message'] = "Error al acceder a las configuraciones de los archivos";
                return $result;
            }else
            {
                $cadena_claves = "";
                $cadena_value  = "";
                
                foreach ($result['campos'] as $key => $value) {
                    if ($data["$key"] == 'on' ){
                        $result['campos']["$key"] = 't';
                    }
                    else{
                        $result['campos']["$key"] = 'f';
                    }
                    if ($key == 'id') continue;
                    $cadena_update.= $key."="."'".$result['campos']["$key"]."',";
                }
            }
            
            $cadena_update = substr($cadena_update, 0,strlen($cadena_update)-1);
            
            $this->getModel()->configurarReferencia($cadena_update, $referencia);
            $result['campos'] = $this->getModel()->getCamposDadoReferencia($referencia);
            return $result;
        }


        public function revista($data){
            $result = $this->actualizarReferencia($data,'revista');
            return $result;
        }
        
        public function tesis($data){
            $result = $this->actualizarReferencia($data,'tesis');
            return $result;
        }
        
        
        public function estandar($data){
            
            
            if ($data){
                
                $result = $this->getModel()->estandar($data['descripcion'],$data['nombre']);
            
                if ($result['error'] == true)
                    $result['message'] = "No se pudo establecer el estandar";
                else
                    $result['message'] = "Estandar establecido de forma satisfactor&iacoute;a";
            
            }
            $result = $this->getModel()->getestandarActual();
            return $result;
        }
        
        


    }

?>

