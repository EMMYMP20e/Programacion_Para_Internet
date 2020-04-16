<?php
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
                            alert('Error en la eliminacion');
                        }
                    },
                    error: function() {
                        alert('Error al conectar al servidor...');
                    }
                });
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <div class="contenedor-header contenido-header">

                <ul>
                    <li><a href="bienvenida.php">Bienvenido</a></li>
                    <li><a href="lista_administradoresHTML.php">Listado </a></li>
                    <li><a href="formulario_alta.php">Alta </a></li>
                    <li><a href="#about">Edicion </a></li>
                    <li><a href="#about">Detalle </a></li>
                </ul>

        </div> <!-- contenedor -->
    </header>

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

</body>

</html>