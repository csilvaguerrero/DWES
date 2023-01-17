<?php

    require_once '../conexion.php';
    require_once '../metodosCrud.php';

    $id = $_GET['id'];

    $objeto = new Metodos();//Instanciamos la clase que contiene el método necesario para modificar una fila.

    $name = $objeto -> consultarFila($id);
	$mostrar = $name -> fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="../estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divFormulario>
			<form id=formulario method="post" action="actualizar.php?id=<?php echo $id;?>">
				<h2>Categorías</h2>
				<input id=cajaTexto type="text" placeholder="Categoría" name="nombre" value="<?php echo $mostrar['nombre']; ?>">
				<input id="botonEnviar" type="submit"/>
			</form>
		</div>
	</body>
</html>