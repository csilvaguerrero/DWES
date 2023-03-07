<?php

/**
 * Clase ModeloCategorías del Controlador Categorías.
 */
class ModeloCategorias{

    /**
     * Constructor de la clase
     */
    function __construct(){

        /*Llamamos al método conexión y creamos una*/
        $this->conexion = $this->conexion();
        
    }

    /**
     * Método que crea la conexión con la base de datos
     */
    public function conexion(){

        $conexion = new mysqli(servidor, usuario, contrasenia, bbdd);
        $conexion->set_charset('utf8');

        return $conexion;
    }

    /**
     * Método del modelo que saca de la base de datos todas
     * las categorías existentes
     */
    public function listarCategorias(){

        $sql = "SELECT * FROM Categorias";

        $resultado = $this->conexion->query($sql);
        
        return $resultado;

    }

    /**
     * Método del modelo que añade las categorías introducidas
     * por teclado en el formulario.
     */
    public function anadirCategoria($parametro){     
            
        if (empty($parametro["nombre"]))
            $parametro["nombre"] = NULL;

        try{
            $sql =  "INSERT INTO Categorias (nombre) VALUES(?);";
          
            $prepare = $this->conexion->prepare($sql);
            
            $prepare->bind_param("s", $parametro["nombre"]);   

            $prepare->execute(); 

        }
        catch(Exception $error){

            $estado = $error->getCode();

            switch($estado){
                case 1062:{
                    return $estado;
                }
                case 1048:{
                    return $estado;
                }
            }


        }
       

        
      
    }

    /**
     * Método que saca el nombre de la categoría para utilizarlo
     * en procesos de confirmación (baja de categoría), o modificación de categoría
     */
    public function sacarCategoria($id){

        $sql = "SELECT nombre FROM Categorias WHERE id = ?;";

        $prepare = $this->conexion->prepare($sql);     

        $prepare->bind_param("i", $id);    

        $prepare->execute();

        $resultado = $prepare->get_result();

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;

    }

    /**
     * Método del modelo que saca una categoría con todos sus datos.
     */
    public function sacarFilaCategoria($id){

        $sql = "SELECT * FROM Categorias WHERE id = ?";

        $prepare = $this->conexion->prepare($sql);     

        $prepare->bind_param("i", $id);    

        $prepare->execute();

        $resultado = $prepare->get_result();

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;

    }

    /**
     * Método del modelo que ejecuta la baja de una categoría
     */
    public function borrarCategoria($id){

        $sql = "DELETE FROM Categorias WHERE id = ?";

        $prepare = $this->conexion->prepare($sql);     

        $prepare->bind_param("i", $id);    

        $resultado = $prepare->execute();

        return $resultado;
    }

    /**
     * Método del modelo que modifica una categoría
     */
    public function modificarCategoria($id, $nombre){

        if (empty($nombre)){
            return 1048;
        }
        else{
            try{
                $sql = "UPDATE Categorias SET nombre = '$nombre' WHERE id = ?;";
                
                $prepare = $this->conexion->prepare($sql);     

                $prepare->bind_param("i", $id);    

                $prepare->execute();
    
            }
            catch(Exception $error){
                $estado = $error->getCode();

                switch($estado){
                    case 1062:{
                        return 1062;
                    }
                }
            }
        }       
    }

}