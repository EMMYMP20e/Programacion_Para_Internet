<?php
require "conecta.php";

$con = conecta();

$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$pass=$_REQUEST['password'];
$correo=$_REQUEST['correo'];
$rol=$_REQUEST['rol'];
$archivo_n='';
$archivo='';

$sql = "INSERT INTO administradores VALUES
     (0,'$nombre','$apellidos','$correo','$pass',
     '$rol','$archivo_n','$archivo',1,0)";

$res = mysql_query($sql, $con);
header("Location: lista_administradoresHTML.php");

?>
