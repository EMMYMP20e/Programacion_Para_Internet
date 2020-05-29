<?php
session_start();
session_destroy();

require "conecta.php";

$con = conecta();
$id_pedido = $_REQUEST['id_pedido'];

$sql = "UPDATE pedidos SET status = 1 WHERE id=$id_pedido";

$res = mysql_query($sql, $con);

echo $res;