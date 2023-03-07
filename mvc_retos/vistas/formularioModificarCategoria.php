<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divFormulario>
			<form id=formulario method="post" action="index.php?controlador=Categorias&metodo=modificarCategorias&id=<?php echo $datos["dato"]["id"];?>">
				<h2>Categorías</h2>
				<input id=cajaTexto type="text" placeholder="Categoría" name="nombre" value="<?php echo $datos["dato"]["nombre"]; ?>">
				<input id="botonEnviar" type="submit"/>
			</form>
			<a href="index.php?controlador=Categorias&metodo=consultar" class="btnVolver">Volver</a>
		</div>
	</body>
</html>