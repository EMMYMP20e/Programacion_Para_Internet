<?php
session_start();
$idU = $_SESSION['id'];
if($idU!=''){
    header("Location: bienvenida.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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
                        pass: password
                    },
                    success: function(res) {
                        if (res == 1) {
                            $(location).attr('href', 'bienvenida.php');
                        } else {
                            error('El usuario o password no existe');
                        }
                    },
                    error: function() {
                        error('Error al conectar al servidor...');
                    }
                });
            } else {
                error('Datos Incompletos');
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
    </script>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <main class="contenedor seccion contenido-centrado-login margen-login">
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Login</legend>
                <label for="correo">Correo:</label>
                <input type="email" name="correo">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </fieldset>
        </form>
        <div id="mensaje" class="mensaje"></div>
        <button class="btnLogin" onclick="login()">Entrar</button>

    </main>

</body>

</html>