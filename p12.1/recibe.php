<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$genero = $_POST['sexo'];
$boletin = $_POST['boletin'];
$comentario = $_POST['comentario'];
$carrera = $_POST['carrera'];
$pass = $_POST['pass'];
$promedio = $_POST['promedio'];
$fecha = $_POST['fecha'];

$genero_txt = ($genero == "F") ? 'Femenino' : 'Masculino';
$boletin_txt = ($boletin == "1") ? 'Recibe Bolentin' : 'No recibe boletin';
$carrera_txt = ($carrera == "1") ? 'Ing. Informatica' : 'Ing. Computacion';

echo "Nombre: $nombre <br>
Correo: $correo <br>
Genero: $genero_txt <br>
Boletin: $boletin_txt <br>
Comentario: $comentario <br>
Carrera: $carrera_txt <br>
Password: $pass <br>
Promedio: $promedio <br>
Fecha: $fecha <br>
";
?>