<?php
require "../../conecta.php";

$con = conecta();
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$codigo = $_REQUEST['codigo'];
$descripcion = $_REQUEST['descripcion'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];

$sql = "UPDATE productos SET nombre = '$nombre', codigo='$codigo', descripcion='$descripcion', costo='$costo', stock='$stock'"; 

$file_name = $_FILES['archivo']['name']; 
if ($file_name != '') {
    $file_tmp  = $_FILES['archivo']['tmp_name'];
    $cadena    = explode(".", $file_name);        
    $ext       = end($cadena);                    
    $dir       = "../../archivos_productos/";                    
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
