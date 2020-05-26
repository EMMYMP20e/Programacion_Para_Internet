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
    <title>Editar Producto</title>

    <style>

    </style>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_productos.php';
        }

        function valida(id) {
            var nombre = document.formulario.nombre.value;
            var codigo = document.formulario.codigo.value;
            var descripcion = document.formulario.descripcion.value;
            var costo = document.formulario.costo.value;
            var stock = document.formulario.stock.value;

            var formData = new FormData($("form#formulario")[0]);
            formData.append('id', id);

            if (nombre != "" && codigo != "" && descripcion != "" && costo != "" && stock != "") {
                $.ajax({
                    url: 'php/edita_producto.php',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        console.log(msg);
                        if (msg == 1) {
                            $(location).attr('href', 'lista_productos.php');
                        } else {
                            error('Error en la edicion');
                        }
                    },
                    error: function() {
                        error('Error al conectar al servidor...');
                    }
                });
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
    <?php
    require "../conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM Productos WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $nombre = mysql_result($res, $i, "nombre");
        $codigo = mysql_result($res, $i, "codigo");
        $descripcion = mysql_result($res, $i, "descripcion");
        $costo = mysql_result($res, $i, "costo");
        $stock = mysql_result($res, $i, "stock");
        $archivo_n = mysql_result($res, $i, "archivo_n");
    }
    ?>

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
        <form name="formulario" id="formulario" method="post" enctype="multipart/form-data">
            <fieldset>
                <?php
                echo "            
                <legend>Editar ID: $id</legend>
                <label for=\"nombre\">Nombre:</label>
                <input value=$nombre type=\"text\" name=\"nombre\">
                <label for=\"codigo\">Codigo:</label>
                <input value=$codigo type=\"number\" name=\"codigo\">
                <label for=\"descripcion\">Descripcion:</label>
                <input value=$descripcion type=\"text\" name=\"descripcion\">
                <label for=\"costo\">Costo:</label>
                <input value=$costo type=\"number\" name=\"costo\">
                <label for=\"stock\">Stock:</label>
                <input value=$stock type=\"number\" name=\"stock\">
                <img src=\"../archivos_productos/$archivo_n\" width=\"80px\" height=\"130px\">"; ?>

                <label for="archivo">Cambiar Foto:</label>
                <input type="file" name="archivo">
            </fieldset>
        </form>
        <div id="mensaje" class="mensaje"></div>
        <?php
        echo "<button class=\"btnEnviar\"onclick=\"valida('$id')\">Enviar</button>";
        ?>
    </main>
</body>

</html>