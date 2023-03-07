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
				if ($datos["dato"] == 1062){
			?>
			<div id="divBorrar">
                La categoría que intentas añadir ya existe, inténtalo de nuevo.
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php
				}else if ($datos["dato"] == 1048){
			?>
			<div id="divBorrar">
                No se puede añadir una categoría sin nombre, vuelve a intentarlo.
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else{?>
			<div id="divBorrar">
                Categoria creada correctamente.
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }?>
		</div>
	</body>
</html>