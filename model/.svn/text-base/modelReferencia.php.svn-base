<?php

session_start();

class modelReferencia extends modelBase {

    public $config_app;

    public function __construct($config) {
        parent::__construct();

        $this->config_app = $config;
    }

    public function getCamposDadoReferencia($referencia) {
        $tabla = "tb_" . $referencia . "_conf";

        $query = "SELECT * FROM $tabla";

        $result = $this->conexion->queryAsArray($query);
        if (!$result)
            $result['error'] = true;

        return $result[0];
    }

    public function setRevista($username, $nombre_biblioteca, $issn, $titulo, $anno_publicacion, $frecuencia, $direccion_online, $edicion, $cant_paginas, $volumen, $numero = "null", $editorial) {
        $direccion_online = urlencode($direccion_online);
        if (!$anno_publicacion)
            $anno_publicacion = "null";
        else
            $anno_publicacion = "'$anno_publicacion'";
        
        if (!$cant_paginas)
            $cant_paginas = "null";
        if (!$numero)
            $numero = "null";

        $query = "INSERT INTO tb_revista (username, nombre_biblioteca, issn, titulo, anno_publicacion, frecuencia, direccion_online, edicion, cant_paginas, volumen, numero, editorial) values ('$username', '$nombre_biblioteca', '$issn', '$titulo', $anno_publicacion, '$frecuencia', '$direccion_online', '$edicion', $cant_paginas, '$volumen', $numero, '$editorial')";
        return $this->conexion->query($query);
    }
    
    public function setLibro($username, $nombre_biblioteca, $autores, $titulo, $isbn, $cant_paginas, $edicion, $palabras_clave, $editorial, $direccion_online, $lugar_publicacion, $colaboradores, $anno_publicacion) {
        $direccion_online = urlencode($direccion_online);
        if (!$anno_publicacion)
            $anno_publicacion = "null";
        else
            $anno_publicacion = "'$anno_publicacion'";
        
        if (!$cant_paginas)
            $cant_paginas = "null";
        if (!$numero)
            $numero = "null";

        $query = "INSERT INTO tb_libro (username, nombre_biblioteca, autores, titulo, isbn, cant_paginas, edicion, palabras_clave, editorial, direccion_online, lugar_publicacion, colaboradores, anno_publicacion) values ('$username', '$nombre_biblioteca', '$autores', '$titulo', '$isbn', $cant_paginas, '$edicion', '$palabras_clave', '$editorial', '$direccion_online', '$lugar_publicacion', '$colaboradores', $anno_publicacion)";
        return $this->conexion->query($query);
    }
    
    public function setArticulo($username, $nombre_biblioteca, $autores, $titulo,  $cant_paginas, $edicion, $palabras_clave, $editorial, $direccion_online, $colaboradores, $anno_publicacion, $direccion_contacto_autores, $revista) {
        $direccion_online = urlencode($direccion_online);
        if (!$anno_publicacion)
            $anno_publicacion = "null";
        else
            $anno_publicacion = "'$anno_publicacion'";
        
        if (!$cant_paginas)
            $cant_paginas = "null";
        if (!$numero)
            $numero = "null";

        $query = "INSERT INTO tb_articulo (username,    nombre_biblioteca,     autores,   titulo,    cant_paginas,   edicion,    palabras_clave,     editorial,    direccion_online,   colaboradores,    anno_publicacion,   direccion_contacto_autores,  revista) values('$username', '$nombre_biblioteca',  '$autores', '$titulo', $cant_paginas, '$edicion', '$palabras_clave',  '$editorial', '$direccion_online', '$colaboradores', $anno_publicacion, '$direccion_contacto_autores', '$revista')";
        return $this->conexion->query($query);
    }
    
    public function setArchivoDigital($username, $nombre_biblioteca, $autores, $titulo, $direccion_online, $fecha_consulta_online, $cant_paginas, $palabras_clave, $colaboradores) {
        $direccion_online = urlencode($direccion_online);
        if (!$fecha_consulta_online)
            $fecha_consulta_online = "null";
        else
            $fecha_consulta_online = "'$fecha_consulta_online'";
        
        if (!$cant_paginas)
            $cant_paginas = "null";
    

        $query = "INSERT INTO tb_archivos_digitales (username, nombre_biblioteca, autores, titulo, direccion_online, fecha_consulta, cant_paginas, palabras_clave, colaboradores) values('$username', '$nombre_biblioteca', '$autores', '$titulo', '$direccion_online', $fecha_consulta_online, $cant_paginas, '$palabras_clave', '$colaboradores')";
        return $this->conexion->query($query);
    }
    
    public function setTesis($username, $nombre_biblioteca, $autores, $titulo, $anno_defensa, $departamento, $tutor, $cant_paginas, $palabras_clave, $direccion_online, $direccion_contacto_autores) {
        $direccion_online = urlencode($direccion_online);
        if (!$anno_defensa)
            $anno_defensa = "null";
        else
            $anno_defensa = "'$anno_defensa'";
        
        if (!$cant_paginas)
            $cant_paginas = "null";
    

        $query = "INSERT INTO tb_tesis (username, nombre_biblioteca, autores, titulo, anno_defensa, departamento, tutor, cant_paginas, palabras_clave, direccion_online, direccion_contacto_autores) values('$username', '$nombre_biblioteca', '$autores', '$titulo', $anno_defensa, '$departamento', '$tutor', $cant_paginas, '$palabras_clave', '$direccion_online', '$direccion_contacto_autores')";
        return $this->conexion->query($query);
    }

    public function getBibliotecas($username) {
        $query = "SELECT * from tb_biblioteca WHERE username='$username'";
        $result = $this->conexion->queryAsArray($query);
        return $result;
    }
    
    public function eliminar($tipo_referencia, $id_referencia){
        $query = "DELETE from tb_".$tipo_referencia." where id=$id_referencia";
        return $this->conexion->query($query);
    }

}
?>

