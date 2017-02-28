<?php

    include 'config/config.php';
    $frontControler = new frontController($config_app);
    
    $frontControler->Dispatcher();
?>
