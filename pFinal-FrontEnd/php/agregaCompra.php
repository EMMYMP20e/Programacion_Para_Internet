   <?php
    session_start();
    require "conecta.php";

    $con = conecta();
    $id_producto = $_REQUEST['id'];
    $cantidad = $_REQUEST['cantidad'];
    $costo = $_REQUEST['costo'];

    if (empty($_SESSION['usuario'])) {//Si no hay sesion crea usuario y pedido
        $_SESSION['usuario'] = time() . "" . rand();
        $usuario = $_SESSION['usuario'];
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO pedidos VALUES
     (0,'$fecha','$usuario',0)";
        $res = mysql_query($sql, $con);
        $_SESSION['id_pedido'] = mysql_insert_id();
    }
    $usuario = $_SESSION['usuario'];
    $id_pedido = $_SESSION['id_pedido'];

    $sql = "INSERT INTO pedidos_productos VALUES
     (0,'$id_pedido','$id_producto','$cantidad','$costo')";
    $res = mysql_query($sql, $con);

    echo $res;
