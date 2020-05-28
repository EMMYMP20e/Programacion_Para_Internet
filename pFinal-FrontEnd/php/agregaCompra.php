<?php
require "conecta.php";

$con = conecta();
$id=$_REQUEST['id'];
$stock=$_REQUEST['stock'];

if(empty($_SESSION['usuario'])){
    $_SESSION['usuario'] = time() . "" . rand();
}
$usuario=$_SESSION['usuario'];

if(empty($_SESSION['pedido_actual'])){

}

?>