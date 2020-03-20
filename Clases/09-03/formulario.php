<!DOCTYPE html>
<html>

<head>
    <title>Práctica 14</title>

    <script>
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
    <form name="formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Nombre">
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" placeholder="Apellidos">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" placeholder="@">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password">
        <br>
        <select name="rol">
            <option value="0">Seleccionar Rol</option>
            <option value="1">Gerente</option>
            <option value="2">Ejecutivo</option>
        </select>
        <br>
        <input type="button" value="Enviar" onClick="valida()">
    </form>
</body>

</html>