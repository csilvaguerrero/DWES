<?php

    require_once '../conexion.php';
    require_once '../metodosCrud.php';

    $id = $_GET['id'];

    $objeto = new Metodos();//Instanciamos la clase que contiene el método necesario para borrar una fila.*/

    if ($objeto -> borrar($id)){
        echo "<h2>Borrado con éxito</h2>
        <br/>
        <a href='../index.php'>Volver</a>"; 
    }
    else{
        echo "Se ha producido un error, vuelve a intentarlo más tarde.";
    }
?>