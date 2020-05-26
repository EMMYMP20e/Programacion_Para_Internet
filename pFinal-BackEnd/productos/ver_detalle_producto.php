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
    <title>Ver Detalle Producto</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_productos.php';
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
        $status = mysql_result($res, $i, "status");
        $archivo_n = mysql_result($res, $i, "archivo_n");
    }
    ?>

    <header class="site-header">
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
    </header>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>

        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo "
                <legend>Ver Detalle ID: $id</legend>
                <img src=\"../archivos_productos/$archivo_n\" width=\"80px\" height=\"130px\">
                <label >Nombre:</label>
                <p>$nombre</p>
                <label >Codigo:</label>
                <p>$codigo</p>
                <label>Descripcion:</label>
                <p>$descripcion</p>
                <label>Costo:</label>
                <p>$costo</p>
                <label>Stock:</label>
                <p>$stock</p>";
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