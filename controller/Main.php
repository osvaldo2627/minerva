<?php session_start();

class Main extends controllerBase {

    public function __construct($config) {
        parent::setAppConfig($config);
    }

    public function index($config) {
       
        include_once $this->getAppConfig()->libFolder . 'securityManager.php';
        if (securityManager::getCurrentUser()== null) {
            $result['view'] = "crear";
            $result['folder'] = "Users";
        }
        return $result;
    }

}

?>
