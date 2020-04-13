<?php
//a binvenida


session_start();
$idU=$_SESSION
$id
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <style>
        html {
            box-sizing: border-box;
            font-size: 62.5%;
        }


        body {
            background-color: #0277bd;
            color: #01579b;
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
            max-width: 1200rem;
            margin: 0 auto;
            background-color: white;
            border-radius: 1.5rem;
        }

        .seccion {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .contenido-centrado {
            max-width: 600px;
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
            background-color: #009688;
            color: white;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            margin: 4px 2px;
            padding: 10px 40px;
            text-decoration: none;
            margin: 0rem 0rem 1rem 1.5rem;
            width: 93%;
        }

        form {
            padding: 1.5rem;
        }
    </style>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function login() {
            var correo = document.formulario.correo.value;
            var password = document.formulario.password.value;

            if (correo != "" && password != "") {
                $.ajax({
                    url: 'login.php',
                    type: 'post',
                    data: {
                        correo: correo,
                        pass:password
                    },
                    success: function(res) {
                        console.log(res);
                        if (res == 1) {
                            $(location).attr('href', 'lista_administradoresHTML.php');
                        } 
                        else {
                            alert('El usuario o password no existe');
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
        //setTimeout() en vez de alerts
    </script>


</head>

<body>
    <main class="contenedor seccion contenido-centrado">
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Login</legend>
                <label for="correo">Correo:</label>
                <input type="email" name="correo">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </fieldset>
        </form>

        <button onclick="login()">Entrar</button>

    </main>

</body>

</html>


<!-- tabla