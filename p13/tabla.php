<?php
$filas = $_POST['filas'];

echo "<table align=\"center\" border=\"1\" width=\"100\">";

for ($i = 1; $i <= $filas; $i++) {
    echo "<tr height=\"30\">
            <td>$i</td>
        </tr>";
}
?>