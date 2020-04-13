<!DOCTYPE html>
<html>

<head>
    <title>Dar de Alta</title>

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

        function valida() {
            var nombre = document.formulario.nombre.value;
            var apellidos = document.formulario.apellidos.value;
            var correo = document.formulario.correo.value;
            var password = document.formulario.password.value;
            var rol = document.formulario.rol.value;

            if (nombre != "" && apellidos != "" && correo != "" && password != "" && rol != 0) {
                document.formulario.method = 'post';
                document.formulario.action = 'salva_administrador.php';
                document.formulario.submit();
            } else {
                alert("Campos por llenar");
            }
        }
    </script>


</head>

<body>
    <main class="contenedor seccion contenido-centrado">
        <button class="btnRegresar" onclick="regresa()">Regresar</button>
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Alta de Administradores</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" placeholder="Nombre">

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" placeholder="Apellidos">

                <label for="correo">Correo:</label>
                <input type="email" name="correo" placeholder="@">

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Password">

                <label for="rol">Rol:</label>
                <select name="rol">
                    <option value="0">Seleccionar Rol</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
                </select>
            </fieldset>
        </form>
        <button onclick="valida()">Enviar</button>

    </main>

</body>

</html>