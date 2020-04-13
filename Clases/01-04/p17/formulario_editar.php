<!DOCTYPE html>
<html>

<head>
    <title>Editar</title>

    <style>
        html {
            box-sizing: border-box;
            font-size: 62.5%;
            /** Reset para REMS - 62.5% = 10px de 16px **/
        }


        body {
            background-color: #009688;
            color: #00796b;
            font-family: base-font-family;
            font-size: base-font-size;
            line-height: base-line-height;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font: bold;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.6rem;
            line-height: 2;
        }

        .contenedor {
            width: 95%;
            max-width: 120rem;
            /** = 1200px; **/
            margin: 0 auto;
            background-color: white;
            border-radius: 1.5rem;
        }

        .seccion {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .contenido-centrado {
            max-width: 800px;
        }

        .contacto p {
            font-size: 1.4rem;
            color: #2979ff;
            margin: 2rem 0 0 0;
        }

        legend {
            font-size: 2rem;
            color: #4f4f4f;
        }

        label {
            font-weight: 700;
            text-transform: uppercase;
            display: block;
        }

        input,
        select {
            padding: 1rem;
            display: block;
            width: 90%;
            background-color: #eceff1;
            margin-bottom: 2rem;
            border: none;
            border-radius: 1rem;
        }



        button {
            background-color: #2962ff;
            color: white;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            margin: 4px 2px;
            padding: 10px 40px;
            text-decoration: none;
            margin: 0rem 0rem 1rem 1.5rem;
        }

        form {
            padding: 1.5rem;
        }

        .btnRegresar {
            background-color: #0097a7;
            margin: 1rem 1rem 0rem 1.5rem;
        }
    </style>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function regresa() {
            window.location.href = 'lista_administradoresHTML.php';
        }

        function valida(id) {
            var nombre = document.formulario.nombre.value;
            var apellidos = document.formulario.apellidos.value;
            var correo = document.formulario.correo.value;
            var password = document.formulario.password.value;
            var rol = document.formulario.rol.value;

            if (nombre != "" && apellidos != "" && correo != "" && password != "" && rol != 0) {
                $.ajax({
                    url: 'edita_administrador.php',
                    type: 'post',
                    data: {
                        id: id,
                        nombre: nombre,
                        apellidos: apellidos,
                        correo: correo,
                        pass: password,
                        rol: rol
                    },
                    success: function(msg) {
                        if (msg == 1) {
                            $(location).attr('href', 'lista_administradoresHTML.php');
                        } else {
                            alert('Error en la edicion');
                        }
                    },
                    error: function() {
                        alert('Error al conectar al servidor...');
                    }
                });
            } else {
                alert("Campos por llenar");
            }
        }
    </script>


</head>

<body>
    <?php
    require "conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM Administradores WHERE id=$id";
    $res = mysql_query($sql, $con);
    $num = mysql_num_rows($res);
    for ($i = 0; $i < $num; $i++) {
        $nombre = mysql_result($res, $i, "nombre");
        $apellidos = mysql_result($res, $i, "apellidos");
        $correo = mysql_result($res, $i, "correo");
        $pass = mysql_result($res, $i, "pass");
        $rol = mysql_result($res, $i, "rol");
    }
    ?>

    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>
        <form name="formulario" class="contacto">
            <fieldset>
                <?php
                echo "
                
                
                <legend>Editar ID: $id</legend>
        <label for=\"nombre\">Nombre:</label>
        <input value=$nombre type=\"text\" name=\"nombre\">
     
        <label for=\"apellidos\">Apellidos:</label>
        <input value=$apellidos type=\"text\" name=\"apellidos\">
        <label for=\"correo\">Correo:</label>
        <input value=$correo type=\"email\" name=\"correo\">
        <label for=\"password\">Password:</label>
        <input value=$pass type=\"password\" name=\"password\">"; ?>
                <label for="rol">Rol:</label>
                <select name="rol">
                    <option value="0">Seleccionar Rol</option>"
                    <option value="1" <?php if ($rol == '1') {
                                            echo ("selected");
                                        } ?>>Gerente</option>
                    <option value="2" <?php if ($rol == '2') {
                                            echo ("selected");
                                        } ?>>Ejecutivo</option>
                </select>
            </fieldset>

        </form>
        <?php
        echo "<button onclick=\"valida('$id')\">Enviar</button>";
        ?>
    </main>

</body>

</html>