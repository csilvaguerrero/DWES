<!DOCTYPE html>
<html>
	<head>
		<title>Retos</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="./css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<form method="post" action="index.php?controlador=Retos&metodo=consultar">
			<select id="buscarCategoria" name="filtrado">
				<option value="all">Mostrar todos los retos</option>
				<?php
					while($mostrarCategorias = $datos["dato"][1]->fetch_array(MYSQLI_ASSOC)){
				?>
				<option value=<?php echo $mostrarCategorias["id"]?>>
					<?php echo $mostrarCategorias["nombre"] ?>
				</option>
				<?php }?>
			</select>
			<input id="buscadorReto" type="submit" value="Buscar reto por categoría"/>
		</form>
		<div id=divTabla>
            <?php
               if ($datos["dato"][0]->num_rows == 0){
                ?>
                <h2 class="titulosRetos">No hay retos</h2>
                <?php				
            	}
				else{
			?>
			<table id=tabla>
				<thead>
					<th>
						ID
					</th>
					<th>
						RETO
					</th>
					<th>
						BORRAR
					</th>
					<th>
						MODIFICAR
					</th>
					<th>
						INFORMACIÓN
					</th>
				</thead>
				<tbody>
                <?php //Mostramos las categorías añadidas en la base de datos
                            while($mostrar = $datos["dato"][0]->fetch_array(MYSQLI_ASSOC)){					
                         ?>
                         <tr>
								<td><?php echo $mostrar['id']; ?></td>
								<td><?php echo $mostrar['nombre']; ?></td>
								<td><a href="./index.php?controlador=Retos&metodo=confirmacionBorrarReto&id=<?php echo $mostrar['id']; ?>"><img src="./img/borrar.svg"/></a></td>
								<td><a href="./index.php?controlador=Retos&metodo=formularioModificarReto&id=<?php echo $mostrar['id']; ?>"><img src="./img/editar.svg"/></a></td>
								<td><a href="./index.php?controlador=Retos&metodo=informacionReto&id=<?php echo $mostrar['id']; ?>"><img src="./img/lupa.svg" id="lupa"/></a></td>
							</tr>
						<?php }}?>
				</tbody>
			</table>	
				<a id="btnAnadir" class="botones" href="index.php?controlador=Retos&metodo=formularioRetos">
					Añadir Reto
				</a>
			<div>
		</div>
	</body>
</html>