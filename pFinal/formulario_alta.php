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
    <title>Dar de Alta</title>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_administradoresHTML.php';
        }

        function valida() {
            var nombre = document.formulario.nombre.value;
            var apellidos = document.formulario.apellidos.value;
            var correo = document.formulario.correo.value;
            var password = document.formulario.password.value;
            var rol = document.formulario.rol.value;

            if (nombre != "" && apellidos != "" && correo != "" && password != "" && rol != 0) {
                document.formulario.method = 'post';
                document.formulario.action = 'salva_administrador.php';
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
    <link rel="stylesheet" href="css/styles.css">


</head>

<body>
    <div class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <?php
                echo "<li><a href=\"bienvenida.php\">Bienvenido: $nombreU</a></li>";
                ?>
                <li><a href="lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="productos/lista_productos.php">Productos </a></li>
                <li><a href="#">Pedidos </a></li>
                <li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </div>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Alta de Administradores</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre">

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" placeholder="Apellidos">

                <label for="correo">Correo:</label>
                <input type="email" name="correo" placeholder="@">

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password">

                <label for="rol">Rol:</label>
                <select name="rol">
                    <option value="0">Seleccionar Rol</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select>

                <label for="archivo">foto:</label>
                <input type="file" id="archivo" name="archivo">

            </fieldset>
        </form>
        <div id="mensaje" class="mensaje"></div>
        <button class="btnEnviar" onclick="valida()">Enviar</button>

    </main>

</body>

</html>