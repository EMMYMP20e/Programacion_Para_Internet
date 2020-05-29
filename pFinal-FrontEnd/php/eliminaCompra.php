<?php
session_start();
require "conecta.php";

$con = conecta();
$id_pp = $_REQUEST['id_pp'];

$sql = "DELETE FROM pedidos_productos WHERE id=$id_pp";

$res = mysql_query($sql, $con);

echo $res;
