<?php

    require_once '../conexion.php';
    require_once '../metodosCrud.php';

    $nombre = $_POST['nombre'];

    $objeto = new Metodos();

    if ($objeto -> insertar($nombre)){
        echo "<h2>DATOS AÑADIDOS CORRECTAMENTE</h2>
        <br/>
        <a href='../index.php'>Volver</a>";       
    }
    else{
        echo "No se ha podido añadir la categoria correctamente, vuelve más tarde.";
    }

?>