<?php
session_start();
$idU = $_SESSION['id'];
if($idU==''){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ver Detalle</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_administradoresHTML.php';
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
        $status = mysql_result($res, $i, "status");
        $archivo_n = mysql_result($res, $i, "archivo_n");
    }
    ?>

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
                <li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </header>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>

        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo "
                <legend>Ver Detalle ID: $id</legend>
                <img src=\"archivos/$archivo_n\" width=\"100px\" height=\"100px\">
                <label >Nombre Completo:</label>
                <p>$nombre $apellidos</p>
            
                <label>Correo:</label>
                <p>$correo</p>
                <label>Rol:</label>";
                if ($rol == '1') {
                    echo "<p>Gerente</p>";
                } else if ($rol == '2') {
                    echo "<p>Ejecutivo</p>";
                }
                echo "<label>Status:</label>";
                if ($status == '1') {
                    echo "<p>Activo</p>";
                } else {
                    echo "<p>Inactivo</p>";
                }

                ?>
            </div>
        </div>


    </main>

</body>

</html>