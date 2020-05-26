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
    <title>Ver Detalle Pedido</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_pedidos.php';
        }
    </script>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php
    require "../conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM Pedidos WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $fecha = mysql_result($res, $i, "fecha");
        $usuario = mysql_result($res, $i, "usuario");
        $status = mysql_result($res, $i, "status");
    }

    $sql = "SELECT * FROM 
    ( SELECT * FROM pedidos_productos WHERE id_pedido = $id)
    AS this_pedido
    INNER JOIN productos ON this_pedido.id_producto = productos.id";

    $res2 = mysql_query($sql, $con);
    $num2 = mysql_num_rows($res2);

    ?>

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

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>

        <div class="anuncio">
            <div class="contenido-anuncio">
                <?php
                echo "
                <legend>Ver Detalle ID: $id</legend>
                <label >Fecha:</label>
                <p>$fecha</p>
                <label >Usuario:</label>
                <p>$usuario</p>";
                echo "<label>Status:</label>";
                if ($status == '1') {
                    echo "<p>Carrito Cerrado</p>";
                } else {
                    echo "<p>Carrito Abierto</p>";
                }

                ?>
            </div>
        </div>


    </main>

    <div class="contenedor-alta seccion contenedor-alta-centrado"">
        <table id= "tabla" align="center" border="1" width="960">
        <tr height="100">
            <td id="titulo" align="center" colspan="5">Lista de Productos</td>
        </tr>
        <tr height="100" style="color: #26a69a">
            <td>ID Producto</td>
            <td>Producto</td>
            <td>Cantidad</td>
            <td>Costo Unitario</td>
            <td>Subtotal</td>
        </tr>
        <?php
        $total = 0;
        for ($i = 0; $i < $num2; $i++) {
            $id_producto = mysql_result($res2, $i, "id_producto");
            $nombre = mysql_result($res2, $i, "nombre");
            $cantidad = mysql_result($res2, $i, "cantidad");
            $precio = mysql_result($res2, $i, "precio");
            $subtotal = $cantidad * $precio;
            echo "<tr id=\"fila$id\" height=\"100\">";
            echo "<td>$id_producto</td>";
            echo "<td>$nombre</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$precio</td>";
            echo "<td>$subtotal</td>";
            echo "</tr>";
            $total += $subtotal;
        }
        echo "<tr id=\"fila$id\" height=\"100\">";
        echo "<td colspan=\"4\">Total:</td>";
        echo "<td>$total</td>";
        echo "</tr>";
        ?>
        </table>
    </div>
</body>

</html>