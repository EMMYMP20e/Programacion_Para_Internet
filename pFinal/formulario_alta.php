<?php
session_start();
$idU = $_SESSION['id'];
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
                alert("Campos por llenar");
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">


</head>

<body>
    <header class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <li><a href="bienvenida.php">Bienvenido</a></li>
                <li><a href="lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="formulario_alta.php">Alta </a></li>
                <?php
                echo "<li><a href=\"formulario_editar.php?id=$idU\">Edicion </a></li>";
                echo "<li><a href=\"ver_detalle.php?id=$idU\">Detalle </a></li>";
                ?>
            </ul>

        </div>
    </header>

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
        <button class="btnEnviar" onclick="valida()">Enviar</button>

    </main>

</body>

</html>