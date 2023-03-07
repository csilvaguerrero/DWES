<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="./css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divFormulario>
			<form id=formulario method="post" action="index.php?controlador=usuarios&metodo=iniciarSesion">
				<h2>Inicio Sesión</h2>
				<input id=cajaTexto type="text" placeholder="Usuario" name="nombre">
                <br><br><br>
                <input id=cajaTexto type="password" placeholder="Contraseña" name="contrasenia">
				<?php
					if ($datos["dato"] == "vacio")
						echo "Se han introducido datos en blanco, inténtalo de nuevo";
					else if ($datos["dato"] != "vacio" && $datos["dato"] == "incorrecto")
						echo "El usuario/contraseña con incorrectos, inténtalo de nuevo";
				?>
				<input id="botonEnviar" type="submit"/>
			</form>
			<a href="index.php" class="btnVolver">Volver</a>
		</div>
	</body>
</html>