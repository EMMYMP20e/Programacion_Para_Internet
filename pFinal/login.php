<?php
session_start();
require "conecta.php";
$con = conecta();
$correo = $_REQUEST['correo'];
$pass = $_REQUEST['pass'];
$pass = md5($pass);


$sql = "SELECT * FROM administradores WHERE correo='$correo' AND pass='$pass'  AND eliminado = 0 AND status=1";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

if ($num) {
    $bool = 1;
    $idU    = mysql_result($res, 0, "id");
    $nombre = mysql_result($res, 0, "nombre");
    $apellidos = mysql_result($res, 0, "apellidos");
    $_SESSION['id']    = $idU;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $apellidos;
} else {
    $bool = 0;
}

echo $bool;
