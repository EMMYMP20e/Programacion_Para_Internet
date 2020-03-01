<!DOCTYPE html>

<head>

    <title>Práctica 13</title>
    <script>
        function creaTabla() {
            document.formulario.method = 'post';
            document.formulario.action = 'tabla.php';
            document.formulario.submit();
        }
    </script>
</head>

<body>
    <form name="formulario">
        <?php
        echo "<select name=\"filas\">";
        for ($i = 1; $i <= 6500; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        ?>
        <input type="button" value="Crear Tabla" onClick="creaTabla()">
    </form>
</body>

</html>