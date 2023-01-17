<?php

/*Incluimos la clase conexión y la clase que contiene todos los métodos necesarios para el CRUD*/

    require_once 'conexion.php';
    require_once 'metodosCrud.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Categorías</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<a href="formulario.html">
			Añadir categoría
		</a>
		<div id=divTabla>
			<table id=tabla>
				<thead>
					<th>
						ID
					</th>
					<th>
						CATEGORÍA
					</th>
					<th>
						BORRAR
					</th>
					<th>
						MODIFICAR
					</th>
				</thead>
				<tbody>
                        <?php
                            $objeto = new Metodos();//Instanciamos la clase que contiene el método para consultar datos

                            $datos = $objeto->consultar();//Obtenemos el resultado de ejecutar el método consultar de la clase Metodos.

                            while($mostrar = $datos->fetch_array(MYSQLI_ASSOC)){
                         ?>
                         <tr>
								<td><?php echo $mostrar['id']; ?></td>
								<td><?php echo $mostrar['nombre']; ?></td>
								<td><a href="./procesos/borrar.php?id=<?php echo $mostrar['id']; ?>"><img src="borrar.svg"/></a></td>
								<td><a href="./procesos/modificar.php?id=<?php echo $mostrar['id']; ?>"><img src="editar.svg"/></a></td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>