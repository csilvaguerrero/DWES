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

                            $sql = "SELECT * FROM Categorias";//Creamos el script a ejecutar
                            $datos = $objeto->consultar($sql);//Obtenemos el resultado de ejecutar el método consultar de la clase Metodos.

                            while($resultado = $datos->fetch_array(MYSQLI_ASSOC)){
                         ?>
                         <tr>
								<td><?php echo $resultado['id']; ?></td>
								<td><?php echo $resultado['nombre']; ?></td>
								<td><a href="./procesos/borrar.php?id=<?php echo $resultado['id']; ?>"><img src="borrar.svg"/></a></td>
								<td><a href="./procesos/modificar.php?id=<?php echo $resultado['id']; ?>"><img src="editar.svg"/></a></td>
							</tr>
						<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>