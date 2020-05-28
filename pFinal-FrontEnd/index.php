<?php
session_start();



require "php/conecta.php";

$con = conecta();

$sql = "SELECT * FROM banners WHERE status=1 AND eliminado=0";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);


$sql = "SELECT * FROM productos WHERE status=1 AND eliminado=0";

$resProductos = mysql_query($sql, $con);
$numProcuctos = mysql_num_rows($resProductos);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    <?php
    $i = rand(0, $num - 1);
    $nombre = mysql_result($res, $i, "nombre");
    echo "<img class=\"banner\" src=\"../PFinal-BackEnd/archivos_banners/$nombre\">";
    ?>

    <div class="contenedor tres-columnas">
        <?php
        $randoms = array();
        for ($i = 0; ($i < 3 && $i < $numProcuctos); $i++) {
            do {
                $rand = rand(0, $numProcuctos - 1);
            } while (false !== array_search($rand, $randoms));
            array_push($randoms, $rand);
            $id = mysql_result($resProductos, $rand, "id");
            $archivo_n = mysql_result($resProductos, $rand, "archivo_n");
            $nombre = mysql_result($resProductos, $rand, "nombre");
            $codigo = mysql_result($resProductos, $rand, "codigo");
            $costo = mysql_result($resProductos, $rand, "costo");
            echo "
                <article class=\"entrada-blog\">
                    <div class=\"item\">
                        <img class=\"img-beer\" src=\"../PFinal-BackEnd/archivos_productos/$archivo_n\" width=\"110px\" height=\"215px\">
                        <div class=\"descripcion\">
                            <h3>$nombre</h3>
                            <p>Código: $codigo</p>
                            <p>$ $costo</p>
                            <a href=\"detalle_producto.php?id=$id\"><button class=\"btnComprar\">Comprar</button></a>
                        </div>
                    </div>
                </article>
                ";
        }
        ?>
    </div>

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