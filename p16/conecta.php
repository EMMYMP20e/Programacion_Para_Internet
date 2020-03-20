<?php

define("HOST", 'localhost');
define("BD", 'proyecto01');
define("USER_BD", 'root');
define("PASS_BD", 'root');

function conecta()
{
    if (!($con = mysql_connect(HOST, USER_BD, PASS_BD))) {
        echo "Error conectando al Servidor de BBDD";
        exit();
    }
    if (!mysql_select_db(BD, $con)) {
        echo "Error Seleccionando BD";
        exit();
    }
    return $con;
}
