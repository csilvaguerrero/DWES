<header id="headerIndex">
    <a id="nombreProfesor">¿Qué tal, <?php echo $_SESSION["id"]["nombre"];?>?</a>
    <span id="tituloHeader">RETOS.COM</span>
    <a id="enlaceInicio" href="index.php?controlador=usuarios&metodo=cerrarSesion">Cerrar Sesión</a>
    <a id="pdf" href="index.php?controlador=Retos&metodo=generarPDF&p">Generar PDF</a>
</header>
<div id="divNavegacion">
    <a href="./index.php?controlador=Categorias&metodo=consultar" class="enlaceNavegacion">Categorías</a>
    <a href="./index.php?controlador=Retos&metodo=consultar" class="enlaceNavegacion">Mis Retos</a>
</div>