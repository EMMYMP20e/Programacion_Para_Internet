<?php
session_start();
$usuario = $_SESSION['usuario'];
$id_pedido = $_SESSION['id_pedido'];

require "php/conecta.php";
$con = conecta();

$sql = "SELECT * FROM 
    ( SELECT * FROM pedidos_productos WHERE id_pedido = $id_pedido)
    AS this_pedido
    INNER JOIN productos ON this_pedido.id_producto = productos.id";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);


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


    <main class="margen">
        <?php
        $total = 0;
        for ($i = 0; $i < $num; $i++) {
            $id_producto = mysql_result($res, $i, "id_producto");
            $nombre = mysql_result($res, $i, "nombre");
            $cantidad = mysql_result($res, $i, "cantidad");
            $precio = mysql_result($res, $i, "precio");
            $archivo_n = mysql_result($res, $i, "archivo_n");
            $subtotal = $cantidad * $precio;
            $total += $subtotal;
            echo "
            <div class=\"contenedor-carrito seccion-carrito\">
                <div class=\"imagen\">
                    <img class=\"img-beer-detail\" src=\"../PFinal-BackEnd/archivos_productos/$archivo_n\" width=\"97px\" height=\"180px\">
                </div>
                <div class=\"form-carrito\">
                    <div class=\"datos\">
                        <div class=\"nombre\">$nombre</div>
                        <h6>Precio Unitario:</h6>
                        <div class=\"precio\">$$precio</div>
                        <h6>Cantidad:</h6>
                        <div class=\"nombre\">$cantidad</div>
                        
                    </div>
                    <div class=\"subtotal\">
                        <div class=\"dato\">Subtotal:</div>
                        <div class=\"precio\">$$subtotal</div>
                    </div>
                    <div class=\"eliminar\">
                        <button class=\"btnEliminar\">Eliminar</button>
                    </div>
                </div>
            </div>";
        }
        echo "
        <div class=\"contenedor-total\">
            <div class=\"total-compra\">
                <button class=\"btnTerminar\">Enviar Pedido</button>
            </div>
            <div class=\"total-text\">
                Total:
            </div>
            <div class=\"total\">
                <div class=\"precio\">$$total</div>
            </div>
        </div>

        ";

        ?>

    </main>
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