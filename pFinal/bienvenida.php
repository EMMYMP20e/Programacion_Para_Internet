<?php
session_start();
$idU = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
if($idU==''){
    header("Location: index.php");
}
?>

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
                <li><a href="lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="formulario_alta.php">Alta </a></li>
                <?php
                echo "<li><a href=\"formulario_editar.php?id=$idU\">Edicion </a></li>";
                echo "<li><a href=\"ver_detalle.php?id=$idU\">Detalle </a></li>";
                ?>
                <li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </header>

    <main class="contenedor seccion contenido-centrado-login">
        <h1>Bienvenido</h1>
        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo
                    "<h3>ID:</h3>
                    <p>$idU</p>
                    <h3>Nombre:</h3>
                    <p>$nombre</p>";
                ?>
            </div>
        </div>
    </main>
</body>

</html>