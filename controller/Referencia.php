<?php

class Referencia extends controllerBase {

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

    public function crearRevista($data) {
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        $result['bibliotecas'] = $this->model->getBibliotecas($username);

        if ($data) {
            extract($data);
            if (!$this->model->setRevista($username, $nombre_biblioteca, $issn, $titulo, $anno_publicacion, $frecuencia, $direccion_online, $edicion, $cant_paginas, $volumen, $numero, $editorial)) {
                $result['error'] = false;
                $result['message'] = "Ha ocurrido un error insertando: " . pg_last_error();
            } else {
                $result['message'] = "Insertado correctamente";
            }
        } else {

            if (empty($result['bibliotecas'])) {
                $result['message'] = "Usted no puede insertar una referencia si no tiene bibliotecas, CREE UNA BIBLIOTECA PRIMERO";
                $result['view'] = 'crear';
                $result['folder'] = 'Biblioteca';
            }
        }
        $result['campos'] = $this->model->getCamposDadoReferencia("revista");

        return $result;
    }

    public function crearLibro($data) {
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        $result['bibliotecas'] = $this->model->getBibliotecas($username);

        if ($data) {
            extract($data);
            if (!$this->model->setLibro($username, $nombre_biblioteca, $autores, $titulo, $isbn, $cant_paginas, $edicion, $palabras_clave, $editorial, $direccion_online, $lugar_publicacion, $colaboradores, $anno_publicacion)) {
                $result['error'] = false;
                $result['message'] = "Ha ocurrido un error insertando el libro: " . pg_last_error();
            } else {
                $result['message'] = "Libro insertado correctamente";
            }
        } else {

            if (empty($result['bibliotecas'])) {
                $result['message'] = "Usted no puede insertar una referencia si no tiene bibliotecas, CREE UNA BIBLIOTECA PRIMERO";
                $result['view'] = 'crear';
                $result['folder'] = 'Biblioteca';
            }
        }
        $result['campos'] = $this->model->getCamposDadoReferencia("libro");

        return $result;
    }

    public function crearArticulo($data) {
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        $result['bibliotecas'] = $this->model->getBibliotecas($username);

        if ($data) {
            extract($data);
            if (!$this->model->setArticulo($username, $nombre_biblioteca, $autores, $titulo, $cant_paginas, $edicion, $palabras_clave, $editorial, $direccion_online, $colaboradores, $anno_publicacion, $direccion_contacto_autores, $revista)) {
                $result['error'] = false;
                $result['message'] = "Ha ocurrido un error insertando el Art&iacute;culo: " . pg_last_error();
            } else {
                $result['message'] = "Art&iacute;culo insertado correctamente";
            }
        } else {

            if (empty($result['bibliotecas'])) {
                $result['message'] = "Usted no puede insertar una referencia si no tiene bibliotecas, CREE UNA BIBLIOTECA PRIMERO";
                $result['view'] = 'crear';
                $result['folder'] = 'Biblioteca';
            }
        }
        $result['campos'] = $this->model->getCamposDadoReferencia("articulo");

        return $result;
    }

    public function crearArchivosDigitales($data) {
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        $result['bibliotecas'] = $this->model->getBibliotecas($username);

        if ($data) {
            extract($data);
            if (!$this->model->setArchivoDigital($username, $nombre_biblioteca, $autores, $titulo, $direccion_online, $fecha_consulta_online, $cant_paginas, $palabras_clave, $colaboradores)) {
                $result['error'] = false;
                $result['message'] = "Ha ocurrido un error insertando el Archivo Digital: " . pg_last_error();
            } else {
                $result['message'] = "Archivo Digital insertado correctamente";
            }
        } else {

            if (empty($result['bibliotecas'])) {
                $result['message'] = "Usted no puede insertar una referencia si no tiene bibliotecas, CREE UNA BIBLIOTECA PRIMERO";
                $result['view'] = 'crear';
                $result['folder'] = 'Biblioteca';
            }
        }
        $result['campos'] = $this->model->getCamposDadoReferencia("archivos_digitales");
        return $result;
    }

    public function crearTesis($data) {
        $username = securityManager::getCurrentUser();
        $result['error'] = false;
        $result['bibliotecas'] = $this->model->getBibliotecas($username);

        if ($data) {
            extract($data);
            if (!$this->model->setTesis($username, $nombre_biblioteca, $autores, $titulo, $anno_defensa, $departamento, $tutor, $cant_paginas, $palabras_clave, $direccion_online, $direccion_contacto_autores)) {
                $result['error'] = false;
                $result['message'] = "Ha ocurrido un error insertando la referencia de Tesis: " . pg_last_error();
            } else {
                $result['message'] = "Referencia de tesis insertada correctamente";
            }
        } else {

            if (empty($result['bibliotecas'])) {
                $result['message'] = "Usted no puede insertar una referencia si no tiene bibliotecas, CREE UNA BIBLIOTECA PRIMERO";
                $result['view'] = 'crear';
                $result['folder'] = 'Biblioteca';
            }
        }
        $result['campos'] = $this->model->getCamposDadoReferencia("tesis");
        return $result;
    }

    public function eliminar($data) {
        $result['error'] = false;

        if ($data) {
            extract($data);

            if (empty($referencia) || empty($tipo_referencia)) {
                $result['error'] = true;
                $result['message'] = "Debe seleccionar una referencia v&aacute;lida para eliminar";
                return $result;
            }
            if ($this->getModel()->eliminar($tipo_referencia, $referencia)) {
                $result['message'] = "$tipo_referencia eliminado correctamente";
            }else{
                $result['message'] = "No se pudo eliminar la referencia";
            }

//            return $result;
        }
        $result['view'] = "gestionar";
        $result['folder'] = "Biblioteca";
        return $result;
    }

}
?>

