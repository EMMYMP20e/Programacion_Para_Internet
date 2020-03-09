<?php
require "conecta.php";

$con = conecta();

$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$pass=$_REQUEST['pass'];
$correo=$_REQUEST['correo'];
$rol=$_REQUEST['rol'];
$archivo_n='';
$archivo='';

$sql = "INSERT INTO administradores VALUES
     (0,'$nombre','$apellidos','$correo','$pass',
     '$rol','$archivo_n','$archivo',1,0)";

$res = mysql_query($sql, $con);
header("Location: listar.php");

/*
$num = mysql_num_rows($res);

echo "<a href =\"formulario.php\">Dar de alta</a><br><br>";

for ($i = 0; $i < $num; $i++) {
    $id = mysql_result($res, $i, "id");
    $nombre = mysql_result($res, $i, "nombre");
    $apellidos = mysql_result($res, $i, "apellidos");
    echo "$id --- $nombre $apellidos <br>";
}*/


?>
