
<?php
require "../../conecta.php";

$con = conecta();

$nombre = $_REQUEST['nombre'];
$codigo = $_REQUEST['codigo'];
$descripcion = $_REQUEST['descripcion'];
$costo = $_REQUEST['costo'];
$stock = $_REQUEST['stock'];


$file_name = $_FILES['archivo']['name'];     //Nombre real del archivo
$file_tmp  = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
$cadena    = explode(".", $file_name);          //Separa el nombre para obtener la extension
$ext       = end($cadena);                         //Extension
$dir       = "../../archivos_productos/";                         //carpeta donde se guardan los archivos
$file_enc  = md5_file($file_tmp);               //Nombre del archivo encriptado

if ($file_name != '') {
     $fileName1  = "$file_enc.$ext";
     copy($file_tmp, $dir . $fileName1);
}
$archivo_n = $fileName1;
$archivo = $file_name;

$sql = "INSERT INTO productos VALUES
     (0,'$nombre','$codigo','$descripcion','$costo',
     '$stock','$archivo_n','$archivo',1,0)";

$res = mysql_query($sql, $con);
//header("Location: ../lista_productos.php");
echo "<script>window.location.href='../lista_productos.php';</script>";
exit;
?>
