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
    <title>Dar de Alta: Productos</title>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_productos.php';
        }

        function valida() {
            var nombre = document.formulario.nombre.value;
            var codigo = document.formulario.codigo.value;
            var descripcion = document.formulario.descripcion.value;
            var costo = document.formulario.costo.value;
            var stock = document.formulario.stock.value;
            var archivo = document.formulario.archivo.value;

            if (nombre != "" && codigo != "" && descripcion != "" && costo != "" && stock != "" && archivo != "") {
                document.formulario.method = 'post';
                document.formulario.action = 'php/alta_producto.php';
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
                <li><a href="lista_productos.php">Productos </a></li>
                <li><a href="../pedidos/lista_pedidos.php">Pedidos </a></li>
                <li><a href="../banners/lista_banners.php">Banners </a></li>
                <li><a href="../salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </div>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Alta de Producto</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre">

                <label for="codigo">Codigo:</label>
                <input type="number" name="codigo" placeholder="Codigo">

                <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" placeholder="Descripcion">

                <label for="costo">Costo:</label>
                <input type="number" name="costo" placeholder="$">

                <label for="stock">Stock:</label>
                <input type="number" name="stock" placeholder="Stock">

                <label for="archivo">Foto:</label>
                <input type="file" id="archivo" name="archivo">

            </fieldset>
        </form>
        <div id="mensaje" class="mensaje"></div>
        <button class="btnEnviar" onclick="valida()">Enviar</button>

    </main>

</body>

</html>