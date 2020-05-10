<?php
session_start();
$idU = $_SESSION['id'];
$nombreU =  $_SESSION['nombre'];
if ($idU == '') {
    header("Location: index.php");
}

require "conecta.php";

$con = conecta();

$sql = "SELECT * FROM administradores WHERE status=1 AND eliminado=0";

$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);


?>

<!DOCTYPE html>

<head>
    <title>Listado</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function eliminaFilas(fila) {
            if (confirm('borrar registro ' + fila + '?')) {
                $.ajax({
                    url: 'elimina_administradores.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'id=' + fila, //para concatenar varias variables: 'id='+fila+'&var1=5'
                    success: function(res) {
                        if (res == 1) {
                            $('#fila' + fila).hide();
                        } else {
                            error('Error en la eliminacion');
                        }
                    },
                    error: function() {
                        error('Error al conectar al servidor...');
                    }
                });
            }
        }

        function error(mensaje) {
            $('#mensaje').html(mensaje);
            $('#mensaje').animate({
                height: "3rem"
            });
            setTimeout("$('#mensaje').html('');", 5000);
            setTimeout("$('#mensaje').animate({height:\"0rem\"});", 5000);
        }

        function alta() {
            window.location.href = 'formulario_alta.php';
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor-header contenido-header">

            <ul>
                <?php
                echo "<li><a href=\"bienvenida.php\">Bienvenido: $nombreU</a></li>";
                ?>
                <li><a href="lista_administradoresHTML.php">Administradores </a></li>
                <li><a href="#">Productos </a></li>
                <li><a href="#">Pedidos </a></li>
                <li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>

        </div>
    </header>
    <main class="contenedor-alta seccion contenedor-alta-centrado">
        <button class="btnAlta" onclick="alta()">Dar de Alta</button>
        <table id="tabla" align="center" border="1" width="960">
            <tr height="100">
                <td id="titulo" align="center" colspan="5">Lista de Administradores</td>
            </tr>
            <?php
            for ($i = 0; $i < $num; $i++) {
                $id = mysql_result($res, $i, "id");
                $nombre = mysql_result($res, $i, "nombre");
                $apellidos = mysql_result($res, $i, "apellidos");
                echo "<tr id=\"fila$id\" height=\"100\">";
                echo "<td>$id</td>";
                echo "<td>$nombre $apellidos</td>";
                echo "<td><button class=\"btnCancelar\" onclick=\"eliminaFilas('$id')\">Eliminar</button></td>";
                echo "<td><a href=\"formulario_editar.php?id=$id\"><button class=\"btnEditar\">Editar</button></a></td>";
                echo "<td><a href=\"ver_detalle.php?id=$id\"><button class=\"btnEnviar\">Ver Detalle</button></a></td>
            </tr>";
            }
            ?>
        </table>
        <div id="mensaje" class="mensaje"></div>
    </main>
</body>

</html>