<?php

    abstract  class controllerBase
    {
        protected $model;
        protected $config_app;


        public function setModelo($model)
        {
            
            require_once $this->config_app->libFolder.'modelBase'.'.php';
            require_once $this->config_app->modelFolder.'model'.$model.'.php';
            
            
            $modelString = 'model'.$model;
            
            $this->model = new $modelString($this->config_app);
            
        }

        public function getModel()
        {
            return $this->model;
        }

        public function setAppConfig($config)
        {
            $this->config_app = $config;
        }

        public function getAppConfig()
        {
            return $this->config_app;
        }


    }


?>
