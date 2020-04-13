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
    </script>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <main class="contenedor seccion contenido-centrado-login">
        <form name="formulario" class="contacto">
            <fieldset>
                <legend>Login</legend>
                <label for="correo">Correo:</label>
                <input type="email" name="correo">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </fieldset>
        </form>

        <button class="btnLogin" onclick="login()">Entrar</button>

    </main>

</body>

</html>