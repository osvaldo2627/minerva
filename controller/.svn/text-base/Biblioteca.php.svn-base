<?php

class Biblioteca extends controllerBase {

    public function __construct($config) {
        parent::setAppConfig($config);
        parent::setModelo(__CLASS__);
    }

    public function gestionar($data) {
        //            $result['folder'] = "Biblioteca";
        //            $result['view'] = "crear";

        $result['error'] = false;
        return $result;
    }

    public function crear($data) {
        $result['error'] = false;
        if ($data) {
            $name = $data['name'];
            $date = $data['date'];
            $description = $data['description'];

            if (empty($name) || empty($date) || empty($description)) {
                $result['error'] = true;
                $result['message'] = "Para crear una biblioteca es necesario llenar todos los campos";
                return $result;
            }
            //saco el nombre del usuario logueado para enviarlo al modelo
            $username = securityManager::getCurrentUser();

            if ($username) {
                if ($this->getModel()->create($username, $name, $date, $description)) {
                    $result['message'] = "Biblioteca creada correctamente";
                } else {
                    $result['message'] = "Ha ocurrido un error al crear la biblioteca: " . pg_last_error();
                    $result['error'] = true;
                }
            } else {
                $result['message'] = "Usuario no autenticado";
                $result['error'] = false;
                $result['view'] = "crear";
                $result['folder'] = "Users";
            }
        }
        return $result;
    }

    public function eliminar($data) {
        $name = $data['nombre'];
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        if ($data) {
            if (empty($name) || $name=="Seleccione") {
                $result['error'] = true;
                $result['message'] = "Debe seleccionar algo para eliminar";
                return $result;
            } else {
                if ($this->getModel()->eliminar($name, $username)) {
                    $result['message'] = "Biblioteca eliminada correctamente";
                    $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
                } else {
                    $result['message'] = "Ha ocurrido un error al eliminar la biblioteca: " . pg_last_error();
                    $result['error'] = true;
                    $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
                }
            }
        } else {
            $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
        }
        return $result;
    }
    public function listar($data) {
        $username = securityManager::getCurrentUser();
        $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
        
        
        foreach ($result['bibliotecas'] as $value) {
            $a = $value['nombre_biblioteca'];
            $result['referencias'][$a]['libros'] = $this->getModel()->getReferenciasByBiblioteca($username, $value['nombre_biblioteca'], "libro");
            $result['referencias'][$a]['tesis'] = $this->getModel()->getReferenciasByBiblioteca($username, $value['nombre_biblioteca'], "tesis");
            $result['referencias'][$a]['archivos_digitales'] = $this->getModel()->getReferenciasByBiblioteca($username, $value['nombre_biblioteca'], "archivos_digitales");
            $result['referencias'][$a]['articulo'] = $this->getModel()->getReferenciasByBiblioteca($username, $value['nombre_biblioteca'], "articulo");
            $result['referencias'][$a]['revista'] = $this->getModel()->getReferenciasByBiblioteca($username, $value['nombre_biblioteca'], "revista");
        }
        
        $result['error'] = false;
        if ($data) {
            if (empty($name) || $name=="Seleccione") {
                $result['error'] = true;
                $result['message'] = "Debe seleccionar algo para eliminar";
                return $result;
            } else {
                if ($this->getModel()->eliminar($name, $username)) {
                    $result['message'] = "Biblioteca eliminada correctamente";
                    
                } else {
                    $result['message'] = "Ha ocurrido un error al eliminar la biblioteca: " . pg_last_error();
                    $result['error'] = true;
                    $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
                }
            }
        } else {
            $result['bibliotecas'] = $this->getModel()->getBibliotecas($username);
        }
        $result['campos_activos']['libro'] = $this->getModel()->getCamposDadoReferencia('libro');
        $result['campos_activos']['articulo'] = $this->getModel()->getCamposDadoReferencia('articulo');
        $result['campos_activos']['archivos_digitales'] = $this->getModel()->getCamposDadoReferencia('archivos_digitales');
        $result['campos_activos']['revista'] = $this->getModel()->getCamposDadoReferencia('revista');
        $result['campos_activos']['tesis'] = $this->getModel()->getCamposDadoReferencia('tesis');
        
        return $result;
    }

}
?>

