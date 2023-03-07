<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Cristian Silva Guerrero">
		<link href="./css/estilocss.css" rel="StyleSheet" type="text/css"/>
	</head>
	<body>
		<div id=divFormulario>
			<form id=formulario method="post" action="index.php?controlador=Retos&metodo=modificarReto&id=<?php echo $datos["dato"][1]["id"];?>">
				<h2>Retos</h2>
				<input id=cajaTexto type="text" placeholder="Reto" name="nombre" value="<?php echo $datos["dato"][1]["nombre"];?>">
                <br>
                <input id=cajaTexto type="text" placeholder="Dirigido" name="dirigido" value="<?php echo $datos["dato"][1]["dirigido"];?>">
                <br>
                <label for="descripcionReto" class="labelFecha">Descripción
                    <br><br>
                    <textarea id="descripcionReto" name="descripcion">
                        <?php echo $datos["dato"][1]["descripcion"];?>
                    </textarea>
                <br>
                <label for="cajaTexto" class="labelFecha">Fecha de inicio inscripcion
                    <br><br>
                    <input id=cajaTexto class="inputFecha" type="date" name="fechaInicioInscripcion" value="<?php echo $datos["dato"][1]["fechaInicioInscripcion"];?>">
                </label>
                <br>
                <label for="cajaTexto" class="labelFecha">Fecha de fin inscripcion
                    <br><br>
                    <input id=cajaTexto class="inputFecha" type="date" name="fechaFinInscripcion" value="<?php echo $datos["dato"][1]["fechaFinInscripcion"];?>"">
                </label>
                <br>
                <label for="cajaTexto" class="labelFecha">Fecha de inicio reto
                    <br><br>
                    <input id=cajaTexto class="inputFecha" type="date" name="fechaInicioReto" value="<?php echo $datos["dato"][1]["fechaInicioReto"];?>">
                </label>
                <br>
                <label for="cajaTexto" class="labelFecha">Fecha de fin reto
                    <br><br>
                    <input id=cajaTexto class="inputFecha" type="date" name="fechaFinReto" value="<?php echo $datos["dato"][1]["fechaFinReto"];?>">
                </label>
                <br>
                <label for="selectFormulario" class="labelFecha">Categoría
                    <br><br>
                    <select class="selectFormulario" name="idCategoria">
                         <?php
                            while($mostrarCategorias = $datos["dato"][2]->fetch_array(MYSQLI_ASSOC)){		
                                if ($datos["dato"][1]["idCategoria"] == $mostrarCategorias["id"]){?>
                                   <option selected="true" value=<?php echo $mostrarCategorias["id"]?>><?php echo $mostrarCategorias["nombre"]; ?></option>
                                   <?php }else{?>
                         
							<option value=<?php echo $mostrarCategorias["id"]?>><?php echo $mostrarCategorias["nombre"]; ?></option>
						<?php }}?>
                    </select>
                </label>
                <br>
                <label for="selectFormulario" class="labelFecha">Publicar
                    <br><br>
                    <select class="selectFormulario" name="publicado">
                        <?php
                            if ($datos["dato"][1]["publicado"] == 1){
                        ?>
                            <option selected="true" value="1">Sí</option>
                            <option value="0">No</option>
                        <?php }else{?>
                            <option value="1">Sí</option>
                            <option selected="true" value="0">No</option>
                            <?php }?>
                    </select>
                </label>
                <br>
				<input id="botonEnviar" type="submit"/>
			</form>
		</div>
        <a href="index.php?controlador=Retos&metodo=consultar" class="btnVolver">Volver</a>
	</body>
</html>