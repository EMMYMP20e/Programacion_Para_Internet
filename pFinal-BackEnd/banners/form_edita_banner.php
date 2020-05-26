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
    <title>Editar Banner</title>

    <style>

    </style>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_banners.php';
        }

        function valida(id) {

            var formData = new FormData($("form#formulario")[0]);
            formData.append('id', id);
            $.ajax({
                url: 'php/edita_banner.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(msg) {
                    console.log(msg);
                    if (msg == 1) {
                        $(location).attr('href', 'lista_banners.php');
                    } else {
                        error('Error en la edicion');
                    }
                },
                error: function() {
                    error('Error al conectar al servidor...');
                }
            });


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

    $sql = "SELECT * FROM Banners WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $nombre = mysql_result($res, $i, "nombre");
    }
    ?>

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
        <form name="formulario" id="formulario" method="post" enctype="multipart/form-data">
            <fieldset>
                <?php
                echo "            
                <legend>Editar ID: $id</legend>
                <img src=\"../archivos_banners/$nombre\" width=\"130px\" height=\"80px\">"; ?>

                <label for="archivo">Cambiar Banner:</label>
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