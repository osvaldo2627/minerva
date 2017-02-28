<?php session_start();

        class Login extends controllerBase{

        public function  __construct($config) {
            parent::setAppConfig($config);
            parent::setModelo(__CLASS__);            
        }

        public function loginuser($data)
        {
            $username = $data['username'];
            $pass     = $data['password'];
            
            include_once $this->getAppConfig()->libFolder.'securityManager.php';

            $result = $this->getModel()->login($username,$pass);
            
            if ($result['error'] == true){
                $result['message'] = "El usuario o la contrase&ntilde;a son incorrectos";
                $result['view'] = 'crear';
                $result['folder'] = 'Users';
            }else{
                $role = $this->getUserRoleByIdRole($result['id_role']);
                securityManager::setLoginUser($result['username'], $role);
                $result['view'] = 'index';
                $result['folder'] = 'Main';
            }
            return $result;
        }

        public function logout()
        {
            include_once $this->getAppConfig()->libFolder.'securityManager.php';
            securityManager::setLogout();
            
            $result['view'] = "crear";
            $result['folder'] = "Users";
            return $result;
        }
        
        public function getUserRoleByIdRole($idRole)
        {
           $result = $this->getModel()->getUserRoleByIdRole($idRole);
           return $result;
           
        }

    }
        

?>
