<?php

class modelLogin extends modelBase {

    protected $config_app;

    public function __construct($config) {

        $this->config_app = $config;
        parent::__construct();
    }

    public function login($user, $pass) {
        $query = "select * from tb_user where username='$user' and password='$pass'";
        $result = $this->conexion->queryAsArray($query);
        
        if ($result) {
            if ($result[0]['password'] == $pass){
                $result[0]['error'] = false;
                return $result[0];
            }
        }else {
        
            $result[0]['error'] = true;
        }
        return $result[0];
    }
    
    public function getUserRoleByIdRole($idRole)
    {
        $query = "select name from tb_role where id_role=$idRole";
        $result = $this->conexion->queryAsArray($query);
        
        return $result[0]['name'];
    }

    

}

?>
