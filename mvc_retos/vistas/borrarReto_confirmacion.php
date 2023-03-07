<!DOCTYPE html>
<html>
	<head>
		<title>Reto</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divTabla>
			<div id="divBorrar">
                ¿Estas seguro de que deseas borrar el reto <?php echo $datos["dato"]["nombre"];?>?
                <br><br><br>
                <a href=index.php?controlador=Retos&metodo=consultar class=btnBorrado id=btnCancelar>Cancelar</a>
                <a class=btnBorrado id=btnBorrar href=index.php?controlador=Retos&metodo=borrarReto&id=<?php echo $_GET['id'];?>>Aceptar</a>
            </div>
		</div>
	</body>
</html>