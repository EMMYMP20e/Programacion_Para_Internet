<?php
require "conecta.php";

$con = conecta();
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$pass = $_REQUEST['pass'];
$correo = $_REQUEST['correo'];
$rol = $_REQUEST['rol'];

$sql = "UPDATE administradores SET nombre = '$nombre', apellidos='$apellidos', correo='$correo',  rol='$rol'"; 

if ($pass != '') {
    $pass = md5($pass);
    $sql .= ", pass='$pass'";
}

$file_name = $_FILES['archivo']['name']; 
if ($file_name != '') {
    $file_tmp  = $_FILES['archivo']['tmp_name'];
    $cadena    = explode(".", $file_name);        
    $ext       = end($cadena);                    
    $dir       = "archivos/";                    
    $file_enc  = md5_file($file_tmp);            

    $fileName1  = "$file_enc.$ext";
    copy($file_tmp, $dir . $fileName1);

    $archivo_n = $fileName1;
    $archivo = $file_name;

    $sql .= ", archivo = '$archivo', archivo_n='$archivo_n'";
}
$sql .= " WHERE id=$id";

$res = mysql_query($sql, $con);

echo $res;
