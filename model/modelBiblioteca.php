<?php

session_start();

class modelBiblioteca extends modelBase {

    public $config_app;

    public function __construct($config) {
        parent::__construct();

        $this->config_app = $config;
    }

    public function create($username, $name, $date, $description) {
        
        $query = "INSERT INTO tb_biblioteca (username, nombre_biblioteca, fecha, descripcion) VALUES('$username', '$name', '$date', '$description')";
        
        $result = $this->conexion->query($query);
        return $result;
    }
    
    public function eliminar($name, $username) {
        $query = "DELETE FROM tb_biblioteca WHERE nombre_biblioteca='$name' AND username='$username'";
        $result = $this->conexion->query($query);
        return $result;
    }
    public function getBibliotecas($name){
        $query = "SELECT * from tb_biblioteca WHERE username='$name'";
        $result = $this->conexion->queryAsArray($query);
        return $result;
    }
    
    public function getReferenciasByBiblioteca($name, $biblioteca, $referencia){
        $query = "SELECT * from tb_".$referencia." WHERE username='$name' and nombre_biblioteca='$biblioteca'";
        
        $result = $this->conexion->queryAsArray($query);
        foreach($result as $key=>$value){
            $result[$key]['direccion_online'] = urldecode($value['direccion_online']);
        }
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

}
?>

