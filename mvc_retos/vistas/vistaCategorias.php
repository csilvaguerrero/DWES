<!DOCTYPE html>
<html>
	<head>
		<title>Categorías</title>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="./css/estilocss.css" rel="StyleSheet" type="text/css"/>
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
               if ($datos["dato"]->num_rows == 0){
                ?>
                <h2>No hay categorias</h2>
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
                <?php //Mostramos las categorías añadidas en la base de datos
                            while($mostrar = $datos["dato"]->fetch_array(MYSQLI_ASSOC)){					
                         ?>
                         <tr>
								<td><?php echo $mostrar['id']; ?></td>
								<td><?php echo $mostrar['nombre']; ?></td>
								<td><a href="./index.php?controlador=Categorias&metodo=confirmacionBorrarCategoria&id=<?php echo $mostrar['id']; ?>"><img src="./img/borrar.svg"/></a></td>
								<td><a href="./index.php?controlador=Categorias&metodo=formularioModificarCategoria&id=<?php echo $mostrar['id']; ?>"><img src="./img/editar.svg"/></a></td>
							</tr>
						<?php }}?>
				</tbody>
			</table>	
				<a id="btnAnadir" class="botones" href="index.php?controlador=Categorias&metodo=formularioCategoria">
					Añadir categoría
				</a>
			<div>
		</div>
	</body>
</html>