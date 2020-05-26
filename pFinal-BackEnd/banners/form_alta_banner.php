<?php
session_start();
$idU = $_SESSION['id'];
$nombreU = $_SESSION['nombre'];
if ($idU == '') {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dar de Alta: Banners</title>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_banners.php';
        }

        function valida() {
            var archivo = document.formulario.archivo.value;

            if (archivo != "") {
                document.formulario.method = 'post';
                document.formulario.action = 'php/alta_banner.php';
                document.formulario.enctype = "multipart/form-data";
                document.formulario.submit();
            } else {
                error("Campos por llenar");
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
    <link rel="stylesheet" href="../css/styles.css">


</head>

<body>
    <div class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <?php
                echo "<li><a href=\"../bienvenida.php\">Bienvenido: $nombreU</a></li>";
                ?>
                <li><a href="../lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="../productos/lista_productos.php">Productos </a></li>
                <li><a href="../pedidos/lista_pedidos.php">Pedidos </a></li>
                <li><a href="lista_banners.php">Banners </a></li>
                <li><a href="../salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </div>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Alta de Banner</legend>
                <label for="archivo">Banner: </label>
                <input type="file" id="archivo" name="archivo">
            </fieldset>
        </form>
        <div id="mensaje" class="mensaje"></div>
        <button class="btnEnviar" onclick="valida()">Enviar</button>

    </main>

</body>

</html>