<?php
require "conecta.php";
$con = conecta();
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$pass = md5($pass);


$sql = "SELECT * FROM administradores WHERE correo='$correo' AND pass='$pass'  AND eliminado = 0 AND status=1";
$res = mysql_query($sql, $con);

if ($res1 = mysql_result($res, 0, "correo") == $correo) {
    $bool = 1;
} else {
    $bool = 0;
}

echo $bool;
