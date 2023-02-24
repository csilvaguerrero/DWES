<?php
/**
 * Controlador Retos por defecto de la aplicación
 */
class Retos{
    
    /*Declaramos la variable $vista, la cual utilizaremos para cambiar de vista
    según el valor que se le asigne*/ 
    public $vista;

    /**
     * Constructor de la clase
     */
    function __construct(){

        $this->vista = 'vistaRetos';
        $this->modelo = new ModeloRetos();
    }

    /**
     * Método por defecto de la aplicación que saca un listado de todos los retos
     * existentes en la base de datos
     */
    public function consultar(){
        
        if (isset($_POST["filtrado"]) && $_POST["filtrado"] != "all")
            $array[0] = $this->modelo->retosFiltrados($_POST["filtrado"]);
        else{
            $array[0] = $this->modelo->listarRetos(); 
        }
       
       $array[1] = $this->modelo->listarCategorias();

       return $array;
    }

    /**
     * Método que cambia de vista al formulario para crear un reto. A su vez,
     * muestra todos los profesores y categorías en el formulario (datos necesarios
     * para la creación del reto)
     */
    public function formularioRetos(){

        $this->vista = 'formularioRetos';

        $array[0] = $this->modelo->listarCategorias();
        $array[1] = $this->modelo->listarProfesores();

        return $array;
    }

    /**
     * Método que crea un reto.
     */
    public function anadirReto(){

        $this->vista = 'anadirReto_confirmacion';

        $estado = $this->modelo->anadirReto($_POST);

        return $estado;

    }

    /**
     * Método que cambia de vista para pedir una confirmación
     * del borrado de un reto.
     */
    public function confirmacionBorrarReto(){

        $this->vista = 'borrarReto_confirmacion';

        $id = $_GET['id'];
        
        return $this->modelo->sacarNombreReto($id);

    }

    /**
     * Método que borra un reto.
     */
    public function borrarReto(){

        $this->vista = 'retoBorrado';

        $id = $_GET['id'];

        $this->modelo->borrarReto($id);

    }

    /**
     * Método que cambia de vista al formulario para modificar los retos, y a su vez
     * le pasa los valores del reto a modificar, los profesores y las categorías existentes
     * en la base de datos.
     */
    public function formularioModificarReto(){

        $id = $_GET['id'];

        $this->vista = 'formularioModificarRetos';

        $array["cosas"][1] = $this->modelo->sacarFilaReto($id);
        $array["cosas"][2] = $this->modelo->listarCategorias();
        $array["cosas"][3] = $this->modelo->listarProfesores();

        return $array["cosas"];

    }

    /**
     * Método que modifica el reto.
     */
    public function modificarReto(){

        $this->vista = 'modificarReto_confirmacion';

        $id = $_GET["id"];
        $array = $_POST;

        $estado = $this->modelo->actualizarReto($id, $array);

        return $estado;


    }

    /**
     * Método que saca todos los datos de un reto para poder mostrarlos en la vista
     * de información de retos.
     */
    public function informacionReto(){

        $this->vista = 'vistaInformacionReto';

        $id = $_GET["id"];

        $datosReto[0] = $this->modelo->sacarFilaReto($id);

        $idProfesor = $datosReto[0]["idProfesor"];
        $idCategoria = $datosReto[0]["idCategoria"];

        $datosReto[1] = $this->modelo->sacarProfesor($idProfesor);
        $datosReto[2] = $this->modelo->sacarCategoria($idCategoria);

        return $datosReto;
    }

}



?>