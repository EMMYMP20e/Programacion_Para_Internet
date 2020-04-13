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

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>

        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo "
                <legend>Ver Detalle ID: $id</legend>
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
                echo "<label>Foto:</label>
                <img src=\"archivos/$archivo_n\" width=\"100px\" height=\"100px\">
                "; ?>
            </div>
        </div>


    </main>

</body>

</html>