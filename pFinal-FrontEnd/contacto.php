<?php
session_start();

require "php/conecta.php";
$con = conecta();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function enviarCorreo() {
            var nombre = document.formulario.nombre.value;
            var apellidos = document.formulario.apellidos.value;
            var correo = document.formulario.correo.value;
            var texto = document.getElementById("texto").value;
            if (nombre != "" && apellidos != "" && correo != "" && texto != "") {
                alert('Cargando...');
                $.ajax({
                    url: 'php/enviaCorreo.php',
                    type: 'post',
                    data: {
                        nombre: nombre,
                        apellidos: apellidos,
                        correo: correo,
                        texto: texto
                    },
                    success: function(msg) {
                        if (msg == 1) {
                            alert('Correo enviado');
                            document.getElementById("formulario").reset();
                        } else {
                            alert('Error en el envío del correo');
                        }
                    },
                    error: function() {
                        alert('Error al conectar al servidor...');
                    }
                })
            }
            else{
                alert("Llene todos los campos");
            }
        }

        function alert(mensaje) {
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

    <main class="contenedor seccion contenido-centrado">
        <form id="formulario" name="formulario" class="contacto">
            <fieldset>
                <legend>Formulario de Contacto</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre">

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" placeholder="Apellidos">

                <label for="correo">Correo:</label>
                <input type="email" name="correo" placeholder="@">

                <label for="texto">Texto:</label><br>
        </form>
        <textarea id="texto" name="texto" cols="30" rows="10" form="formulario"></textarea>
        </fieldset>
        <div id="mensaje" class="mensaje"></div>
        <button class="btnEnviar" onclick="enviarCorreo()">Enviar</button>

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