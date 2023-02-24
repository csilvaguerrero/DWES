<!DOCTYPE html>
<html>
	<head>
		<title>Retos</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<header id="headerIndex">
			<p id="tituloHeader">RETOS.COM</p>
		</header>
		<div id="divNavegacion">
            <a href="./index.php?controlador=Categorias" class="enlaceNavegacion">Categorías</a>
			<a href="./index.php?controlador=Retos" class="enlaceNavegacion">Retos</a>
		</div>
		<div id=divTabla>
			<?php
				if ($datos["dato"] == 1062){
			?>
			<div id="divBorrar">
                Estás añadiendo el nombre de otra categoría, inténtalo de nuevo.
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else if ($datos["dato"] == 1048){
			?>
			<div id="divBorrar">
                Has introducido un nombre en blanco, inténtalo de nuevo.
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
            </div>
			<?php }else{?>
			<div id="divBorrar">
				La categoría se ha modificado correctamente.
				<a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Volver</a>
			</div>
			<?php }?>
		</div>
	</body>
</html>