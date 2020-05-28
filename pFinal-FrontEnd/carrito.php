<?php
session_start();
$usuario = $_SESSION['usuario'];
echo $usuario;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="site-header">
        <div class="contenedor-header contenido-header">
            <ul>
                <li><img class="logo" src="images/logo.png"></li>
                <li><a href="index.php">Home </a></li>
                <li><a href="productos.php">Productos </a></li>
                <li><a href="contacto.php">Contacto </a></li>
                <li><a href="carrito.php">Carrito <img class="icono-carrito" src="images/carrito.png"></a></li>
            </ul>
        </div>
    </header>
</body>

<footer class="footer">
    <div class="footer__addr">
        <h1>Cerveceria Chapultepec</h1>
        <h2>Términos y Condiciones<br></h2>
    </div>
    <ul class="footer__nav">
        <li class="nav__item">
            <h2 class="nav__title">Programación Para Internet D05</h2>
            <ul class="nav__ul">
                <h6>Emmanuel Méndez Pérez</h6>
                <h6>216787892</h6>
                <h6>Ingeniería en Computación</h6>
            </ul>
        </li>
        <li class="nav__item">
            <h2 class="nav__title">Redes Sociales</h2>
            <ul class="nav__ul">
                <h6>Facebook</h6>
                <h6>Instagram</h6>
            </ul>
        </li>
    </ul>
    <div class="legal">
        <p>&copy; 2020 Casi Todos Los Derechos Reservados.</p>
        <div class="legal__links">
            Universidad de Guadalajara - CUCEI
        </div>
    </div>
</footer>

</html>