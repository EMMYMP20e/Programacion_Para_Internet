<?php
session_start();
$idU = $_SESSION['id'];
$nombreU = $_SESSION['nombre'];
if ($idU == '') {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>

    <style>

    </style>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_administradoresHTML.php';
        }

        function valida(id) {
            var nombre = document.formulario.nombre.value;
            var apellidos = document.formulario.apellidos.value;
            var correo = document.formulario.correo.value;
            var password = document.formulario.pass.value;
            var rol = document.formulario.rol.value;

            var formData = new FormData($("form#formulario")[0]);
            formData.append('id', id);

            if (nombre != "" && apellidos != "" && correo != "" && rol != 0) {
                $.ajax({
                    url: 'edita_administrador.php',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        console.log(msg);
                        if (msg == 1) {
                            $(location).attr('href', 'lista_administradoresHTML.php');
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
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM Administradores WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $nombre = mysql_result($res, $i, "nombre");
        $apellidos = mysql_result($res, $i, "apellidos");
        $correo = mysql_result($res, $i, "correo");
        $rol = mysql_result($res, $i, "rol");
        $archivo_n = mysql_result($res, $i, "archivo_n");
    }
    ?>

    <div class="site-header">
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
     
        <label for=\"apellidos\">Apellidos:</label>
        <input value=$apellidos type=\"text\" name=\"apellidos\">
        <label for=\"correo\">Correo:</label>
        <input value=$correo type=\"email\" name=\"correo\">
        <label for=\"pass\">Password:</label>
        <input type=\"password\" name=\"pass\">"; ?>
                <label for="rol">Rol:</label>
                <select name="rol">
                    <option value="0">Seleccionar Rol</option>"
                    <option value="1" <?php if ($rol == '1') {
                                            echo ("selected");
                                        } ?>>Gerente</option>
                    <option value="2" <?php if ($rol == '2') {
                                            echo ("selected");
                                        } ?>>Ejecutivo</option>
                </select>

                <?php
                echo "
            <img src=\"archivos/$archivo_n\" width=\"100px\" height=\"100px\">
                "; ?>
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