<?php

    class Metodos{

        public function consultar(){

            $conectar = new Conectar();//Instanciamos la clase de la conexión para poder utilizar su método
            $conexion = $conectar->conexion();//Ejecutamos el método de la clase Conectar y realizamos la conexión.

            $sql = "SELECT * FROM Categorias";
            
            $resultado = mysqli_query($conexion, $sql);//Ejecutamos el query

            return $resultado;
        }

        public function insertar($nombre){

            $conectar = new Conectar();//Instanciamos la clase de la conexión para poder utilizar su método
            $conexion = $conectar->conexion();//Ejecutamos el método de la clase Conectar y realizamos la conexión.

            $sql = "INSERT INTO Categorias (nombre) VALUES('".$nombre."');";

            $resultado = mysqli_query($conexion, $sql);//Ejecutamos el query

            return $resultado;
        }

        public function borrar($id){
            
            $conectar = new Conectar();//Instanciamos la clase de la conexión para poder utilizar su método
            $conexion = $conectar->conexion();//Ejecutamos el método de la clase Conectar y realizamos la conexión.

            $sql = "DELETE FROM Categorias WHERE id = ".$id.";";
	
            $resultado = mysqli_query($conexion, $sql);//Ejecutamos el query

            return $resultado;
        }

        public function consultarFila($id){//Este método es utilizado para sacar el nombre de la categoría a modificar.

            $conectar = new Conectar();//Instanciamos la clase de la conexión para poder utilizar su método
            $conexion = $conectar->conexion();//Ejecutamos el método de la clase Conectar y realizamos la conexión.

            $sql = "SELECT nombre FROM Categorias WHERE id = ".$id.";";
            $resultado = mysqli_query($conexion, $sql);//Ejecutamos el query

            return $resultado;
        }

        public function actualizarFila($id, $nombre){

            $conectar = new Conectar();//Instanciamos la clase de la conexión para poder utilizar su método
            $conexion = $conectar->conexion();//Ejecutamos el método de la clase Conectar y realizamos la conexión.

            $sql = "UPDATE Categorias SET nombre = '".$nombre."' WHERE id = ".$id.";";
            $resultado = mysqli_query($conexion, $sql);//Ejecutamos el query

            return $resultado;
        }
    }

?>