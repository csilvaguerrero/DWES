<?php
	/**
	 * 
	 * Clase que realizará la conexión con la base de datos.
	 * 
	 */
	class Conectar{

		private $servidor = "2daw.esvirgua.com";
		private $usuario = "user2daw_18";
		private $contrasenia = "3qYED~*]0ZQ7";
		private $bbdd = "user2daw_BD1-18";

		public function conexion(){

			$conexion = mysqli_connect($this->servidor, $this->usuario, $this->contrasenia, $this->bbdd);

			return $conexion;
		}
	}
?>