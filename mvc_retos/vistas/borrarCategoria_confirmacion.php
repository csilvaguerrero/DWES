<!DOCTYPE html>
<html>
	<head>
		<title>Categorías</title>
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
			<div id="divBorrar">
                ¿Estas seguro de que deseas borrar la categoría <b><?php echo $datos["dato"]["nombre"];?></b>?
                <br><br><br>
                <a href=index.php?controlador=Categorias&metodo=consultar class=btnBorrado id=btnCancelar>Cancelar</a>
                <a class=btnBorrado id=btnBorrar href=index.php?controlador=Categorias&metodo=borrarCategoria&id=<?php echo $_GET['id'];?>>Aceptar</a>
            </div>
		</div>
	</body>
</html>