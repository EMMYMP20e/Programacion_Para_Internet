<?php
require "conecta.php";

$con = conecta();

$sql = "SELECT * FROM administradores WHERE status=1 AND eliminado=0";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

echo "<a href =\"formulario.php\">Dar de alta</a><br><br>";

for ($i = 0; $i < $num; $i++) {
    $id = mysql_result($res, $i, "id");
    $nombre = mysql_result($res, $i, "nombre");
    $apellidos = mysql_result($res, $i, "apellidos");
    echo "$id --- $nombre $apellidos <br>";
}
?>