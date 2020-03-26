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
    <style>
        button {
            background-color: #D32F2F;
            color: white;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            margin: 4px 2px;
            padding: 10px 40px;
            text-decoration: none;
        }



        #titulo {
            background-color: #009688;
            color: white;
            font: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: larger;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #tabla {
            border-collapse: collapse;
        }

        .btnEditar {
            background-color: #00695c;
            color: white;
        }
    </style>
</head>

<body>



    <table id="tabla" align="center" border="1" width="960">
        <tr height="100">
            <td id="titulo" align="center" colspan="4">Lista de Administradores</td>
        </tr>
        <?php
        for ($i = 0; $i < $num; $i++) {
            $id = mysql_result($res, $i, "id");
            $nombre = mysql_result($res, $i, "nombre");
            $apellidos = mysql_result($res, $i, "apellidos");
            echo "<tr id=\"fila$id\" height=\"100\">";
            echo "<td>$id</td>";
            echo "<td>$nombre $apellidos</td>";
            echo "<td><button onclick=\"eliminaFilas('$id')\">Eliminar</button></td>";
            echo "<td><a href=\"formulario_editar.php?id=$id\"><button class=\"btnEditar\">Editar</button></a></td>
            </tr>";
        }
        ?>

</body>

</html>