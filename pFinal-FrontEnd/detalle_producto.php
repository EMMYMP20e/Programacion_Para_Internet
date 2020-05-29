<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function agregar(id, costo, stock) {
            var cantidad = document.getElementById("cantidad").value;
            if (cantidad > stock) {
                error('La cantidad es mayor a la disponible');
                return;
            } else if (cantidad <= 0) {
                error('Introduzca cantidad válida');
                return;
            } else {
                $.ajax({
                    url: 'php/agregaCompra.php',
                    type: 'post',
                    data: {
                        id: id,
                        cantidad: cantidad,
                        costo: costo
                    },
                    success: function(msg) {
                        if (msg == 1) {
                            alert('Tu compra se agregó al carrito');
                            $(location).attr('href', 'productos.php');
                        } else {
                            error('Error en el envío del correo');
                        }
                    },
                    error: function() {
                        error('Error al conectar al servidor...');
                    }
                });
            }
        }

        function error(mensaje) {
            $('#mensaje').html(mensaje);
            $('#mensaje').animate({
                height: "3rem"
            });
            setTimeout("$('#mensaje').html('');", 5000);
            setTimeout("$('#mensaje').animate({height:\"0rem\"});", 5000);
        }
    </script>
</head>

<body>

    <?php
    require "php/conecta.php";
    $con = conecta();

    $user = $_SESSION['usuario'];

    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM Productos WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $id = mysql_result($res, $i, "id");
        $archivo_n = mysql_result($res, $i, "archivo_n");
        $nombre = mysql_result($res, $i, "nombre");
        $codigo = mysql_result($res, $i, "codigo");
        $descripcion = mysql_result($res, $i, "descripcion");
        $stock = mysql_result($res, $i, "stock");
        $costo = mysql_result($res, $i, "costo");
    }
    ?>

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

    <main class="contenedor-detalle seccion-detalle">
        <div class="imagen">
            <?php
            echo "<img class=\"img-beer-detail\" src=\"../PFinal-BackEnd/archivos_productos/$archivo_n\" width=\"190px\" height=\"350px\">"; ?>
        </div>
        <div class="form-detalle">
            <form id="formulario" name="formulario" class="contacto" method="post">
                <fieldset>
                    <?php
                    echo "
                    <legend>ID Producto: $id</legend>
                    <h6>Producto:</h6>
                    <div class=\"dato\">$nombre</div>
                    <h6>Código:</h6>
                    <div class=\"dato\">$codigo</div>
                    <h6>Descripción:</h6>
                    <div class=\"dato\">$descripcion</div>
                    <h6>Stock:</h6>
                    <div class=\"dato\">$stock</div>
                    <h6>Precio:</h6>
                    <div class=\"dato\">$$costo</div>
                    $usuario
                    "; ?>
            </form>
            <div class="cantidad">
                <label for="cantidad">Cantidad:</label>
                <input id="cantidad" type="number" name="cantidad" value="0">
                <?php
                echo "<button class=\"btnCarrito\" type=\"button\" onclick=\"agregar($id, $costo, $stock)\">Agregar al Carrito</button>";
                ?>

            </div>
            </fieldset>
            <div id="mensaje" class="mensaje"></div>
        </div>
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