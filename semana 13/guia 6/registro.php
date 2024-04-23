<?php

include_once ("class/database.class.php");


$nom = isset($_POST['nombre']) ? trim($con->real_escape_string($_POST["nombre"])) : "err";
$ape = isset($_POST['apellido']) ? trim($con->real_escape_string($_POST['apellido'])) : "er";
$cor = isset($_POST['correo']) ? trim($con->real_escape_string($_POST['correo'])) : "e";


$sql = "INSERT INTO empleados (nombre, apellido, correo) VALUES ('$nom', '$ape', '$cor')";
$res = $con->query($sql);

if (!$res) {
    echo "Error: El registro no se ha podido ingresar.";
    exit(0);
}


include "consulta.php";
?>