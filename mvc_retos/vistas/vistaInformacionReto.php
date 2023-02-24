<!DOCTYPE html>
<html>
	<head>
		<title>Retos</title>
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
        <h2 class="titulosRetos">
            <?php echo $datos["dato"][0]["nombre"]?>
        </h2>
        <div id="informacionReto">
            <div id="informacionBasica">
                <p id="dirigidoReto">Dirigido a
                    <b><?php echo $datos["dato"][0]["dirigido"]?></b>
                </p>
                <br><br>
                <p id="descripcionReto">
                    <b>Descripcion del reto:</b>
                    <br><br>
                    <?php echo $datos["dato"][0]["descripcion"]?>
                </p>
            </div>
            <div id="informacionTotal">
                <table id="tablaInformacion">
                    <thead>
                        <th>
                            Inicio Inscripcion
                        </th>
                        <th>
                            Fin Inscripcion
                        </th>
                        <th>
                            Inicio Reto
                        </th>
                        <th>
                            Fin Reto
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $datos["dato"][0]["fechaInicioInscripcion"]?></td>
                            <td><?php echo $datos["dato"][0]["fechaFinInscripcion"]?></td>
                            <td><?php echo $datos["dato"][0]["fechaInicioReto"]?></td>
                            <td><?php echo $datos["dato"][0]["fechaFinReto"]?></td>
                        </tr>
                    </tbody>
                </table>

                <p class="centrarDatos">
                    Profesor:
                    <b>
                        <?php echo $datos["dato"][1]["nombre"]?>
                    </b>
                </p>

                <p class="centrarDatos">
                    Categoria:
                    <b>
                        <?php echo $datos["dato"][2]["nombre"]?>
                    </b>
                </p>
                <p class="centrarDatos">
                    Publicado:
                    <b>
                        <?php
                            if ($datos["dato"][0]["publicado"] == 1){
                        ?>
                        Sí
                        <?php }else{?>
                        No
                        <?php }?>
                    </b>
                </p>
            </div>
        </div>
        <div id="divBotones">
            <a id="btnAnadir" class="botones" href="index.php?controlador=Retos&metodo=consultar">
                Volver
            </a>
            <a id="btnAnadir" class="botones" href="./index.php?controlador=Retos&metodo=formularioModificarReto&id=<?php echo $datos["dato"][0]['id']; ?>">
                Modificar Reto
            </a>
        </div>
	</body>
</html>