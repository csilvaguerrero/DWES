<?php
    
/**
 * Clase ModeloRetos perteneciente al controlador Retos
 */
class ModeloRetos{

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
     * Método que lista todos los retos existentes en la
     * base de datos.
     */
    public function listarRetos(){

        $sql = "SELECT * FROM Retos";

        $resultado = $this->conexion->query($sql);

        return $resultado;

    }

    /**
     * Método que lista todas las categorías existentes
     * en la base de datos
     */
    public function listarCategorias(){

        $sql = "SELECT * FROM Categorias";

        $resultado = $this->conexion->query($sql);

        return $resultado;

    }

    /**
     * Método que lista todos los profesores existentes
     * en la base de datos
     */
    public function listarProfesores(){

        $sql = "SELECT * FROM Profesores";

        $resultado = $this->conexion->query($sql);

        return $resultado;

    }

    /**
     * Método que crea un reto en la base de datos.
     */
    public function anadirReto($parametro){

        if (empty($parametro["nombre"]))
            $parametro["nombre"] = NULL;
        if (empty($parametro["descripcion"]))
            $parametro["descripcion"] = NULL;
        if (empty($parametro["dirigido"]))
            $parametro["dirigido"] = NULL;
        if (empty($parametro["publicado"]))
            $parametro["publicado"] = 0;
        if (empty($parametro["fechaInicioInscripcion"]))
            $parametro["fechaInicioInscripcion"] = NULL;
        if (empty($parametro["fechaFinInscripcion"]))
            $parametro["fechaFinInscripcion"] = NULL; 
        if (empty($parametro["fechaInicioReto"]))
            $parametro["fechaInicioReto"] = NULL;
        if (empty($parametro["fechaFinReto"]))
            $parametro["fechaFinReto"] = NULL;
        if (empty($parametro["idProfesor"]))
            $parametro["idProfesor"] = NULL;
        if (empty($parametro["idCategoria"]))
            $parametro["idCategoria"] = NULL;      

        
        try{
            $sql =  "INSERT INTO Retos (nombre, descripcion, dirigido, publicado, fechaInicioInscripcion, fechaFinInscripcion, fechaInicioReto, fechaFinReto, idProfesor, idCategoria) 
            VALUES(?,?,?,?,?,?,?,?,?,?);";

            $prepare = $this->conexion->prepare($sql);
        
            $prepare->bind_param("sssissssii", $parametro["nombre"], $parametro["descripcion"], $parametro["dirigido"], $parametro["publicado"], $parametro["fechaInicioInscripcion"], $parametro["fechaFinInscripcion"], $parametro["fechaInicioReto"], $parametro["fechaFinReto"], $parametro["idProfesor"], $parametro["idCategoria"]);    

            $prepare->execute();  

        }
        catch(Exception $error){
            
            $estado = $error->getCode();

            switch($estado){
                case 1048:{
                    return 1048;
                }
                case 4025:{
                    return 4025;
                }
                case 1062:{
                    return 1062;
                }
            }
        }

        
                           

    }
    /**
     * Método que saca el nombre de un reto para utilizarlo en procesos
     * de confirmación (baja del reto)
     */
    public function sacarNombreReto($id){
    
        $sql = "SELECT nombre FROM Retos WHERE id = $id";
        
        $resultado = $this->conexion->query($sql);

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;

    }

    /**
     * Método que da de baja un reto
     */
    public function borrarReto($id){

        $sql = "DELETE FROM Retos WHERE id = ?";

        $prepare = $this->conexion->prepare($sql);

        $prepare->bind_param("i", $id);

        $prepare->execute();

        $resultado = $prepare->get_result();

        return $resultado;

    }

    /**
     * Método que obtiene todos los datos de un reto de la 
     * base de datos.
     */
    public function sacarFilaReto($id){

        $sql = "SELECT * FROM Retos WHERE id = $id";

        $resultado = $this->conexion->query($sql);

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;
    }

    /**
     * Método que modifica los retos
     */
    public function actualizarReto($id, $array){

        if (empty($array["nombre"]))
            $array["nombre"] = NULL;
        if (empty($array["descripcion"]))
            $array["descripcion"] = NULL;
        if (empty($array["dirigido"]))
            $array["dirigido"] = NULL;
        if (empty($array["publicado"]))
            $array["publicado"] = 0;
        if (empty($array["fechaInicioInscripcion"]))
            $array["fechaInicioInscripcion"] = NULL;
        if (empty($array["fechaFinInscripcion"]))
            $array["fechaFinInscripcion"] = NULL; 
        if (empty($array["fechaInicioReto"]))
            $array["fechaInicioReto"] = NULL;
        if (empty($array["fechaFinReto"]))
            $array["fechaFinReto"] = NULL;
        if (empty($array["idProfesor"]))
            $array["idProfesor"] = NULL;
        if (empty($array["idCategoria"]))
            $array["idCategoria"] = NULL;
        
        try{

            $sql = "UPDATE Retos SET nombre=?, descripcion=?, dirigido=?, publicado=?, fechaInicioInscripcion=?, fechaFinInscripcion=?, fechaInicioReto=?, fechaFinReto=?, idProfesor=?, idCategoria=? WHERE id=?";

            $prepare = $this->conexion->prepare($sql);

            $prepare->bind_param("sssissssiii", $array["nombre"],$array["descripcion"], $array["dirigido"], $array["publicado"], $array["fechaInicioInscripcion"], $array["fechaFinInscripcion"], $array["fechaInicioReto"], $array["fechaFinReto"], $array["idProfesor"], $array["idCategoria"], $id); 

            $prepare->execute();   

        }
        catch(Exception $error){
            $estado = $error->getCode();

            switch($estado){
                case 1048:{
                    return 1048;
                }
                case 4025:{
                    return 4025;
                }
                case 1062:{
                    return 1062;
                }
            }
        }
       
    }

    /**
     * Método que filtra los retos según lasç
     * categorías
     */
    public function retosFiltrados($id){

        $sql = "SELECT * FROM Retos WHERE idCategoria = (?);";

        $prepare = $this->conexion->prepare($sql);

        $prepare->bind_param("i", $id);

        $prepare->execute();
       
        $resultado = $prepare->get_result();

        return $resultado;
    }


    /**
     * Método que retorna el nombre de la categoría asignada a un
     * reto
     */
    public function sacarCategoria($idCategoria){

        $sql = "SELECT nombre FROM Categorias WHERE id = $idCategoria;";

        $resultado = $this->conexion->query($sql);

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;

    }

    /**
     * Método que retorna el nombre del profesor de un reto
     */
    public function sacarProfesor($idProfesor){

        $sql = "SELECT nombre FROM Profesores WHERE id = $idProfesor;";
        
        $resultado = $this->conexion->query($sql);

        $valor = $resultado->fetch_array(MYSQLI_ASSOC);

        return $valor;    

    }

}