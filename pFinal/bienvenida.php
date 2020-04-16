<!DOCTYPE html>
<html>

<head>
    <title>Ver Detalle</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_administradoresHTML.php';
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <li><a href="bienvenida.php">Bienvenido</a></li>
                <li><a href="lista_administradoresHTML.php">Listado </a></li>
                <li><a href="formulario_alta.php">Alta </a></li>
                <li><a href="#about">Edicion </a></li>
                <li><a href="#about">Detalle </a></li>
            </ul>

        </div> <!-- contenedor -->
    </header>

    <main class="contenedor seccion contenido-centrado">
        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo "
                <legend>Ver Detalle ID: $id</legend>
                <img src=\"archivos/$archivo_n\" width=\"100px\" height=\"100px\">
                <label >Nombre Completo:</label>
                <p>$nombre $apellidos</p>
            
                <label>Correo:</label>
                <p>$correo</p>
                <label>Rol:</label>";
                if ($rol == '1') {
                    echo "<p>Gerente</p>";
                } else if ($rol == '2') {
                    echo "<p>Ejecutivo</p>";
                }
                echo "<label>Status:</label>";
                if ($status == '1') {
                    echo "<p>Activo</p>";
                } else {
                    echo "<p>Inactivo</p>";
                }

                ?>
            </div>
        </div>


    </main>

</body>

</html>