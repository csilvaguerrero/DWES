<!DOCTYPE html>
<html>
	<head>
		<title>Retos</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divTabla>
			<?php
				if ($datos["dato"] == 1048){
			?>
			<div id="divBorrar">
                Faltan datos por introducir, inténtalo de nuevo.
                <a href=index.php?controlador=Retos&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else if ($datos["dato"] == 4025){?>
			<div id="divBorrar">
                Has introducido las fechas de forma incorrecta, vuelve a intentarlo.
                <a href=index.php?controlador=Retos&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else if($datos["dato"] == 1062){?>
			<div id="divBorrar">
                Existe un reto con el mismo nombre, vuelve a intentarlo.
                <a href=index.php?controlador=Retos&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else{?>
			<div id="divBorrar">
                Reto creado correctamente.
                <a href=index.php?controlador=Retos&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }?>
		</div>
	</body>
</html>