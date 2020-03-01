<!DOCTYPE html>
<html>
<head>
    <title>Práctica 12</title>

    <script>
        function valida(){
            var user=document.formulario.nombre.value;
            var pass=document.formulario.correo.value;
            var rol=document.formulario.rol.value;
            console.log(user)
            console.log(pass)
            console.log(rol)
            if(user!="" && pass!="" && rol!=0){
                enviaDatos();
            }
            else{
                alert("Campos por llenar");
            }
        }
        
        function enviaDatos(){
            if(confirm('Enviar datos?')){
                document.formulario.method = 'post';
                document.formulario.action = 'recibe.php';
                document.formulario.submit();
            }
        }
    </script>
</head>
<body>
    <form name="formulario">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Nombre">
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" placeholder="Correo" value="@">
        <br>
        <select name="rol">
            <?php
                echo "<option value=\"0\">Seleccionar</option>";
            ?>
            <option value="1">Admin</option>
            <option value="2">Usuario</option>
        </select>
        <br>
        <input type="button" value="Enviar" onClick="valida()">
    </form>
</body>
</html>