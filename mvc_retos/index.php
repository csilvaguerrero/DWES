<?php

    /**
     * Index de mi aplicación 
     */
    require_once 'assets/fpdf185/fpdf.php';
    require_once 'config/config_db.php';
    require_once 'config/config.php';
    require_once 'modelos/modeloRetos.php';
    require_once 'modelos/modeloCategorias.php';
    require_once 'modelos/modeloUsuarios.php';

    session_start();

    /*En caso de que ningún controlador esté cargado, cargaremos el por defecto definido
    en config.php*/

    if (!isset($_GET["controlador"])){
        if (!isset($_SESSION["id"])){
            $_GET["controlador"] = controlador_defecto;
        }
        else if (isset($_SESSION["id"])){
            $_GET["controlador"] = sesion_creada;
        }        
    }
   

    if (!isset($_GET["metodo"])){
        if (!isset($_SESSION["id"])){
            $_GET["metodo"] = metodo_defecto;
        }
        else if (isset($_SESSION["id"])){
            $_GET["metodo"] = metodo_creado;
        }
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

    /*Si el controlador es el controlador de inicio, cargaremos un header diferente al de los profesores*/
    if ($cargarControlador == "usuarios" && !isset($_SESSION["id"])){
        require_once 'vistas/template/headerInicio.html';
        require_once 'vistas/'.$controlador->vista.'.php';
    }   
    else if($_GET["controlador"] != "usuarios" && isset($_SESSION["id"])){
        require_once 'vistas/template/header.php';
        require_once 'vistas/'.$controlador->vista.'.php';
    }
    else if ($_GET["controlador"] == "usuarios" && $_GET["metodo"] == "cerrarSesion"){
        require_once 'vistas/template/headerInicio.html';
        require_once 'vistas/'.$controlador->vista.'.php';
    }
        
    
?>