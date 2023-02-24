<?php

    /**
     * Index de mi aplicación 
     */

    require_once 'config/config_db.php';
    require_once 'config/config.php';
    require_once 'modelos/modeloRetos.php';
    require_once 'modelos/modeloCategorias.php';

    /*En caso de que ningún controlador esté cargado, cargaremos el por defecto definido
    en config.php*/

    if (!isset($_GET["controlador"]))
        $_GET["controlador"] = controlador_defecto;
    

    if (!isset($_GET["metodo"])){
        $_GET["metodo"] = metodo_defecto;
    }
    
    /*Creamos el patrón con el que cargaremos el controlador seleccionado*/
    $patron = "controladores/".$_GET["controlador"].".php";

    
    /*Incluimos el controlador utilizando el anteior patrón*/
    require_once $patron;

    /*Obtenemos el nombre del controlador para poder instanciarlo*/
    $cargarControlador = $_GET["controlador"];
    $controlador = new $cargarControlador();

    /*Array que guardará todos los datos para el paso de parametros por vistas*/
    $datos["dato"] = array();
    
    if(method_exists($controlador,$_GET["metodo"])) 
        $datos["dato"] = $controlador->{$_GET["metodo"]}();

    /*Incluyo la vista definida en el constructor del controlador*/
    require_once 'vistas/'.$controlador->vista.'.php';
    
?>