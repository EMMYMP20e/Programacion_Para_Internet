<?php
require "conecta.php";

$con = conecta();
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$pass = $_REQUEST['pass'];
$correo = $_REQUEST['correo'];
$rol = $_REQUEST['rol'];

$sql = "UPDATE administradores SET nombre = '$nombre', apellidos='$apellidos', correo='$correo', pass='$pass', rol='$rol' WHERE id=$id";

$res = mysql_query($sql, $con);

echo $res;
