<?php

class frontController extends controllerBase {

    public function __construct($config) {
        parent::setAppConfig($config);
    }

    public function Dispatcher() {
        $failure['error'] = false;
        $failure['message'] = '.';

        //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if ($_GET['controller'])
            $controllerName = $_GET['controller'];
        else
            $controllerName = "Main";

        if ($_GET['action'])
            $actionName = $_GET['action'];
        else
            $actionName = "index";
        
        $controllerFile = $this->getAppConfig()->controlerFolder . $controllerName . '.php';

        if (is_file($controllerFile)) {
            require $controllerFile;
        } else {
            $failure['message'] = "no se encontro el archivo" . $controllerFile;
            $failure['error'] = true;
        }
        
        if (is_callable(array($controllerName, $actionName)) == false) {
            $failure['message'] = "no se encontro el metodo " . $actionName . " en el controlador " . $controllerName;
            $failure['error'] = true;
        }
        if ($failure['error'] != true)
            $controller = new $controllerName($this->getAppConfig());
        
        require_once 'lib/securityManager.php';

        if ($failure['error'] != true)
            if (securityManager::checkAccess($controllerName, $actionName)) {
                $result = $controller->$actionName($_POST);
            } else {
                $failure['message'] = "no tiene los permisos necesarios para realizar esta operación";
                $failure['error'] = true;
            }
        
        if ($failure['error'] == true) {
            $view_to_include = $this->getAppConfig()->viewFolder . 'failure.php';
        } else {
            if (empty($result['view']))
                $view_to_include = $this->getAppConfig()->viewFolder . $controllerName . '/' . $actionName . '.php';
            else {

                $view_to_include = $this->getAppConfig()->viewFolder . $result['folder'] . '/' . $result['view'] . '.php';
            }
        }

        include $this->getAppConfig()->viewFolder . 'template.php';
    }

}

function debug($data, $message = "Debugging data") {
    echo "<h1>" . $message . "</h1>";
    echo "<br/><pre>";
    print_r($data);
    die();
}

?>
