<?php
session_start();
$idU = $_SESSION['id'];
$nombreU =  $_SESSION['nombre'];
if ($idU == '') {
    header("Location: ../index.php");
}

require "../conecta.php";

$con = conecta();

$sql = "SELECT * FROM pedidos WHERE status=1";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);


?>

<!DOCTYPE html>

<head>
    <title>Listado Pedidos</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <?php
                echo "<li><a href=\"../bienvenida.php\">Bienvenido: $nombreU</a></li>";
                ?>
                <li><a href="../lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="../productos/lista_productos.php">Productos </a></li>
                <li><a href="lista_pedidos.php">Pedidos </a></li>
                <li><a href="../banners/lista_banners.php">Banners </a></li>
                <li><a href="../salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </header>
    <main class="contenedor-alta seccion contenedor-alta-centrado">
        <table id="tabla" align="center" border="1" width="960">
            <tr height="100">
                <td id="titulo" align="center" colspan="3">Lista de Pedidos</td>
            </tr>
            <?php
            for ($i = 0; $i < $num; $i++) {
                $id = mysql_result($res, $i, "id");
                $usuario = mysql_result($res, $i, "usuario");
                echo "<tr id=\"fila$id\" height=\"100\">";
                echo "<td>$id</td>";
                echo "<td>$usuario</td>";
                echo "<td><a href=\"ver_detalle_pedido.php?id=$id\"><button class=\"btnEnviar\">Ver Detalle</button></a></td>
            </tr>";
            }
            ?>
        </table>
        <div id="mensaje" class="contenedor mensaje"></div>
    </main>
</body>

</html>