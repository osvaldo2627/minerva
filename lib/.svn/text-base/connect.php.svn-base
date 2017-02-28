<?php

//Capa BD

class Connect {

    private $conexion;

    public function __construct() {
        require_once 'config/datasource.config.php';

        $this->conexion = pg_connect("dbname=$config_datasource->db_name host=$config_datasource->db_host port=$config_datasource->db_port user=$config_datasource->db_user password=$config_datasource->db_pass");
        if (!$this->conexion)
            die('no se pudo conectar con la bd');
        return $this->conexion;
    }

    public function query($query) {
        $query = pg_query($query);

        if (pg_affected_rows($query))
            return $query ? $query : true;

        if (pg_last_error())
            return false;
        return $query;
    }

    public function queryAsArray($query) {
        $res = $this->query($query);

        $resArray = pg_fetch_all($res);
        if ($resArray)
            return $resArray;
        return false;
    }

}

?>
