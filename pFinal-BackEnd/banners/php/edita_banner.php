<?php
require "../../conecta.php";

$con = conecta();
$id = $_REQUEST['id'];

$res = 0;

$file_name = $_FILES['archivo']['name'];
if ($file_name != '') {
    $file_tmp  = $_FILES['archivo']['tmp_name'];
    $cadena    = explode(".", $file_name);
    $ext       = end($cadena);
    $dir       = "../../archivos_banners/";
    $file_enc  = md5_file($file_tmp);

    $fileName1  = "$file_enc.$ext";
    copy($file_tmp, $dir . $fileName1);

    $nombre = $fileName1;
    $archivo = $file_name;

    $sql = "UPDATE banners SET archivo = '$archivo', nombre='$nombre'  WHERE id=$id";

    $res = mysql_query($sql, $con);
}


echo $res;
