<?php
include_once ("class/database.class.php");

$sql = "SELECT nombre, apellido, correo FROM empleados";
$res = $con->query($sql);
?>

<table id="datos">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        // Con método fetch_object()
        while ($row = $res->fetch_object()) {
            echo "<tr>\n";
            echo "<td>" . ($i + 1) . "</td>\n";
            echo "<td>" . $row->nombre . "</td>\n";
            echo "<td>" . $row->apellido . "</td>\n";
            echo "<td>" . $row->correo . "</td>\n";
            echo "</tr>\n";
            $i++;
        }
        ?>
    </tbody>
</table>