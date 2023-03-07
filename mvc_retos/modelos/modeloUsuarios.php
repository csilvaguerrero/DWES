<?php


class ModeloUsuarios{


    function __construct(){

        $this->conexion = $this->conexion();

    }

    public function conexion(){
        
        $conexion = new mysqli(servidor, usuario, contrasenia, bbdd);
        $conexion->set_charset('utf8');

        return $conexion;
    }

    public function sacarUsuarios($correo, $password){

        $sql = "SELECT * FROM Profesores WHERE correo = ? AND password = ?;";

        $prepare = $this->conexion->prepare($sql);
        $prepare->bind_param("ss", $correo, $password);
        $prepare->execute();

        $resultado = $prepare->get_result();

        return $resultado;

    }
}




?>