<?php
    

    class modelUsers extends modelBase{
        protected $config_app;

        public function  __construct($config) {
            

           parent::__construct();
           
           $this->config_app = $config;
        }

        public function create($username,$name,$pass)
        {
            $idRoleQuery  = "select * from tb_role where name='usuario'";
            $result       = $this->conexion->queryAsArray($idRoleQuery);
            $idRole = $result[0]['id_role'];
            
            $inserQuery = "insert into tb_user(username,id_role,password,name) values('$username',$idRole,'$pass','$name')";
            
            $res     = $this->conexion->query($inserQuery);
            
            if ($res == true){
                $result['message'] = "el usuario ".$username." fue creado satisfactoriamente";
                $result['error'] = false;
                
            }else
            {
                $result['message'] = "Error al intentar crear el usuario ".$username;
                $result['error'] = true;
            }
            return $result;
        }

        public function getUsuarioDatos($nombre){
            
            $query = "Select * FROM tb_user where username='$nombre'";
            
            $result = $this->conexion->queryAsArray($query);
            
            
            if (!$result)
                $result['error'] = true;
            else
                $result['nombre'] = $result[0]['nombre'];
            
            return $result;
        }  
        
        public function modificar($datos){
            $password = $datos['password'];
            $name     = $datos['name'];
            $username = $datos['username'];
            
            $query = "UPDATE tb_user SET password='$password', name='$name' where username='$username'";
            
            $result = $this->conexion->query($query);
            if (!$result)
                $result = false;
            return $result;
        }   
    }

?>
