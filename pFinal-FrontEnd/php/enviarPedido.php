<?php
session_start();
session_destroy();

require "conecta.php";

$con = conecta();
$id_pedido = $_REQUEST['id_pedido'];

$sql = "SELECT * FROM 
    ( SELECT * FROM pedidos_productos WHERE id_pedido = $id_pedido)
    AS this_pedido
    INNER JOIN productos ON this_pedido.id_producto = productos.id";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

for ($i = 0; $i < $num; $i++) {
    $id_producto = mysql_result($res, $i, "id_producto");
    $cantidad = mysql_result($res, $i, "cantidad");
    $stock = mysql_result($res, $i, "stock");
    $stock-=$cantidad;

    $sql = "UPDATE productos SET stock = $stock WHERE id=$id_producto";
    mysql_query($sql, $con);
}

$sql = "UPDATE pedidos SET status = 1 WHERE id=$id_pedido";

$res = mysql_query($sql, $con);

echo $res;
