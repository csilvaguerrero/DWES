<?php

/**
 * Controlador de categorías
 */

class Categorias{
    
    /*Declaramos la variable $vista, la cual utilizaremos para cambiar de vista
    según el valor que se le asigne*/ 
    public $vista;

    /**
     * Constructor de la clase
     */
    function __construct(){

        $this->vista = 'vistaCategorias';
        $this->modelo = new ModeloCategorias();
    }

    /**
     * Método que consulta las categorías y devuelve a la vistaCategorías un array con todas
     * las categorías
     */
    public function consultar(){

        $mostrarCategorias = $this->modelo->listarCategorias(); 

        return $mostrarCategorias;
    }


    /**
     * Método que llama y cambia de vista a formularioCategorias.php
     */
    public function formularioCategoria(){
        
        $this->vista = 'formularioCategorias';
        
    }

    /**
     * Método que mediante el modelo crea una categoría.
     */
    public function anadirCategoria(){
        
        $this->vista = 'anadirCategoria_confirmacion';
          
        $estado = $this->modelo->anadirCategoria($_POST);

        return $estado;
           

    }

    /**
     * Método que muestra por pantalla una confirmación de borrado. Saca el nombre de la categoría
     * y cambia de vista a borrarCategoria_confirmacion.php
     */
    public function confirmacionBorrarCategoria(){
       
        $this->vista = 'borrarCategoria_confirmacion';

        $id = $_GET['id'];

        $valor = $this->modelo->sacarCategoria($id);

        return $valor;
    }

    /**
     * Método que borra la categoría seleccionada.
     */
    public function borrarCategoria(){

        $this->vista = 'categoriaBorrada';

        $id = $_GET['id'];

        $this->modelo->borrarCategoria($id);


    }

    /**
     * Método que cambia de vista al formulario para modificar las categorías,
     * y a su vez le pasa por datos de la categoría a modificar
     */
    public function formularioModificarCategoria(){

        $id = $_GET['id'];

        $this->vista = 'formularioModificarCategoria';

        $valor =  $this->modelo->sacarFilaCategoria($id);
           
        return $valor;
    }
    
    /**
     * Método que modifica las categorías
     */
    public function modificarCategorias(){

        $this->vista = 'modificarCategoria_confirmacion';

        $id = $_GET["id"];
        $nombre = $_POST["nombre"];

        $estado = $this->modelo->modificarCategoria($id, $nombre);
          
        return $estado;
    }
}

?>