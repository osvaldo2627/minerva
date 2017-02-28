<?php
/*
 * La seguridad para los controladores se aplica de la siguiente forma:
 * si el controlador no necesita seguridad solo se adiciona el controlador y 
 * se le da acceso a todos 
 * igual a (all):
 *
 *   $listAllowAccesController['Users'    ] = array('all');
 *
 * En cambio si se quiere restringir el acceso al controlador a uno o varios usuarios
 * especificamente se se le asigna al controlador un arreglo con los usuarios que tienen acceso a este.
 *
 *   $listAllowAccesController['Users'    ] = array('admin','administrador');
 *
 * Si dentro de un controlador se quiere permitir el acceso a un determinado grupo de usuarios
 * se adiciona al arreglo con clave el nombre del controlador el nombre de la accion y los usuarios
 * permitidos por ejemplo
 *
 *
 *   $listAllowAccesController['Users']['getAllUsers'] = array('administrador','estudiante');
 *
 */


    $listAllowAccesController                   = array();
    
    $listAllowAccesController['Main']           = array('all');
    $listAllowAccesController['Biblioteca']     = array('usuario', 'admin');
    $listAllowAccesController['Users']          = array('all');
    $listAllowAccesController['ConfReferencia'] = array('usuario', 'admin');
    $listAllowAccesController['Referencia'] = array('usuario', 'admin');
    $listAllowAccesController['Login']          = array('all');
    
    /*
    $listAllowAccesController['Estudiante']     = array('all');
    $listAllowAccesController['Rol']            = array('all');
    $listAllowAccesController['Prototype']      = array('all');
    */
    

    


?>
