<?php
session_start();

// Conectando a la base de datos
$con = new mysqli("localhost:3307", "root", "", "users");

// Verificar si la conexión fue exitosa
if ($con->connect_errno) {
    die("Error de conexión: (" . $con->errno . ") " . $con->error);
}

$con->set_charset("utf8");

// Escapar caracteres especiales en campos del formulario de inicio de sesión
$usuario = $con->real_escape_string(trim($_POST['usuario']));
$contrasena = $con->real_escape_string(trim($_POST['contrasena']));

// Preparando la consulta que se va a ejecutar
$qr = "SELECT usuario, contrasena, nombre, apellido FROM usuario WHERE usuario = ? AND contrasena = ?";
$sql = $con->prepare($qr);

// Verificar si la preparación de la consulta fue exitosa
if (!$sql) {
    die("Error en la preparación de la consulta: (" . $con->errno . ") " . $con->error);
}

$sql->bind_param("ss", $usuario, $contrasena);
$sql->execute();

// Asociando a variables los datos solicitados en la consulta SELECT
$sql->bind_result($user, $password, $name, $lastname);

// Verificar si se encontraron resultados
if ($sql->fetch()) {
    $_SESSION["autenticado"] = "si";
    $_SESSION["usuario"] = $user;
    $_SESSION["nombreusr"] = $name . " " . $lastname;

    // Redirigir al usuario a la página de inicio si la autenticación fue exitosa
    header("Location: home.php");
} else {
    // Redirigir de nuevo a la página de login si las credenciales son incorrectas
    header("Location: login.php?errorusuario=si");
}

// Cerrar la conexión
$con->close();
?>