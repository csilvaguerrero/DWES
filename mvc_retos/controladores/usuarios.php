<?php


class Usuarios{

    public $vista;

    function __construct(){

        $this->vista = 'vistaInicio';
        $this->modelo = new ModeloUsuarios();
    }

    public function vistaPrincipal(){

        $this->vista = 'vistaInicio';

    }
    public function vistaInicioSesion(){

        $this->vista = 'inicio_sesion';

    }

    public function iniciarSesion(){

        $correo = $_POST["nombre"];
        $password = $_POST["contrasenia"];

        if (empty($correo) || empty($password)){
            $this->vista = 'inicio_sesion';
            $valor = "vacio";
            return $valor;
        }
        else{

            $id = $this->comprobarUsuario($correo, $password);
            
            if ($id){
                $this->abrirSesion($id, $correo);
            }
            else{
                $this->vista = 'inicio_sesion';
                return "incorrecto";
            }
        }
    }

    public function comprobarUsuario($correo, $password){

        $filas = $this->modelo->sacarUsuarios($correo, $password);

            
        if ($filas->num_rows == 1){
           $resultado = $filas->fetch_array(MYSQLI_ASSOC);
           return $resultado;
        }
        else{
            return false;
        }
       
    }

    public function abrirSesion($id, $correo){

        $this->vista = 'vistaRetos';

        $_SESSION["correo"] = $correo;
        $_SESSION["id"] = $id;
       
        header('Location: index.php?controlador=Retos&metodo=consultar');

    }

    public function cerrarSesion(){
        
        $this->vista = 'vistaInicio';
        session_destroy();

    }


}



?>