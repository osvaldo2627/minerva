<?php

class Users extends controllerBase {

    public function __construct($config) {

        parent::setAppConfig($config);
        parent::setModelo(__CLASS__);
    }

    public function create($data) {
        $name       = $data['name'];
        $username   = $data['user_name'];
        $pass       = $data['password'];
        $rePass     = $data['repeat_password'];

        if (empty($name) || empty($username) || empty($pass) || empty($rePass)) {
            $result['error'] = true;
            $result['message'] = "Debe llenar todos los campos requeridos para registrar un usuario";
            return $result;
        }
        
        if ($pass != $rePass) {
            $result['message']  = "las contrase&ntild;as no coinciden";
            $result['error']    = true;
            return $result;
        }

        $result = $this->getModel()->create($username, $name, $pass);
        include_once $this->getAppConfig()->libFolder . 'securityManager.php';

        if ($result['error'] == false) {
            securityManager::setLoginUser($username, $result['role']);
            $result['view'] = "index";
            $result['folder'] = "Main";
        }
        return $result;
    }

    public function perfil() {
          include_once $this->getAppConfig()->libFolder . 'securityManager.php';
          $username = securityManager::getCurrentUser();
          
          $usuario = $this->getModel()->getUsuarioDatos($username);
          $result['usuario'] = $usuario[0];
          return $result;
    }
    
    public function modificar($data) {
        
          include_once $this->getAppConfig()->libFolder . 'securityManager.php';
          $username = securityManager::getCurrentUser();
          
          if ($data){
              
              if ($data['password'] != "" && $data['name'] != "" && $data['username'] != "" && $data['repPassword']!=""){
                 if($data['password'] == $data['repPassword'])
                 {
                     $resp = $this->getModel()->modificar($data);
                     if ($resp == false){
                         $result['error']= true;
                         $result['message'] = "la clave no se pudo cambiar, error en el servidor";
                     }else{
                         $result['message'] = "Su perfil ha sido modificado";
                     }
                 }else{
                     $result['error']= true;
                     $result['message'] = "Las claves no coinciden";
                 }
              }else{
                  $result['error']= true;
                  $result['message'] = "Debe llenar todos los campos del usuario para modificarlo";
              }
          }else{
              $result['error']   = true;
              $result['message'] = "Usted esta tratando de modificar el usuario de forma ilegal";
          }
          
          
          $usuario = $this->getModel()->getUsuarioDatos($username);
          $result['usuario'] = $usuario[0];
          $result['view']   = 'perfil';
          $result['folder'] = "Users";
          return $result;
    }

}

?>
