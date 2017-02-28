<?php @session_start();

class securityManager {

    public static function checkAccess($controllerName, $actionName) {

        require_once 'config/security.config.php';

        $allow = false;

        if ($listAllowAccesController["$controllerName"][0] == 'all')
            $allow = true;
        else {

            $rollsWithAccess = $listAllowAccesController["$controllerName"];
            for ($i = 0; $i < count($rollsWithAccess); $i++) {
                if ($rollsWithAccess[$i] == self::getCurrentUserRole()) {
                    $allow = true;
                    break;
                }
            }
        }


        if ($allow == false)
            return false;

        if ($listAllowAccesController["$controllerName"]["$actionName"]) {
            $allowAction = false;
            $accesAction = $listAllowAccesController["$controllerName"]["$actionName"];

            for ($i = 0; $i < count($accesAction); $i++)
                if ($accesAction[$i] == self::getCurrentUserRole()) {
                    $allowAction = $true;
                    break;
                }
        }else
            return true;

        if ($allowAction && $allow)
            return true;
        else
            return false;
    }

    public static function getCurrentUser() {
        if ( $_SESSION['minerva']['user'] )
            return $_SESSION['minerva']['user'];
        return null;
    }

    public static function setLoginUser($user, $role) {
        $_SESSION['minerva']['role'] = $role;
        $_SESSION['minerva']['user'] = $user;
    }

    public static function setLogout() {

        $_SESSION['minerva']['user'] = null;
        $_SESSION['minerva']['role'] = null;
    }

    public static function getCurrentUserRole() {
        if ($_SESSION['minerva']['role'])
            return $_SESSION['minerva']['role'];
        return null;
    }

}

?>
