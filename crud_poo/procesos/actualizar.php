<?php


    require_once '../conexion.php';
    require_once '../metodosCrud.php';

    $nombre = $_POST['nombre'];
    $id = $_GET['id'];

    $objeto = new Metodos();

    if ($objeto -> actualizarFila($id, $nombre)){
        echo "<h2>Fila modificada con éxito</h2>
        <br>
        <a href='../index.php'>Volver</a>";  
    }
    else{
        echo "Se ha producido un error, inténtelo más tarde.";
    }
  
?>