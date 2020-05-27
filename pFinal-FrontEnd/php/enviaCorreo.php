<?php
require "conecta.php";

$con = conecta();
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$correo=$_REQUEST['correo'];
$texto=$_REQUEST['texto'];

ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "emmanuel.mendez7878@alumnos.udg.mx";
$to = "emmy.mp.98e@gmail.com";
$subject = $nombre." ".$apellidos." ".$correo;
$message = $texto;
$headers = "From:" . $from;
$success=mail($to, $subject, $message, $headers);
echo $success;