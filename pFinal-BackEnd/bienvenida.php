<?php
session_start();
$idU = $_SESSION['id'];
$nombreU = $_SESSION['nombre'];
$apellidosU =  $_SESSION['apellidos'];
if($idU==''){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bienvenido</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor-header contenido-header">
            <ul>
                <?php
                echo "<li><a href=\"bienvenida.php\">Bienvenido: $nombreU</a></li>";
                ?>
                <li><a href="lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="productos/lista_productos.php">Productos </a></li>
                <li><a href="pedidos/lista_pedidos.php">Pedidos </a></li>
                <li><a href="banners/lista_banners.php">Banners </a></li>
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
                    <p>$nombreU $apellidosU</p>";
                ?>
            </div>
        </div>
    </main>
</body>

</html>