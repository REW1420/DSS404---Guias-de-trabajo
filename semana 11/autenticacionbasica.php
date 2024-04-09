<?php

session_start();

if (substr($_SERVER['SERVER_SOFTWARE'], 0, 9) === 'Microsoft' && isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW']) && substr($_SERVER['HTTP_AUTHORIZATION'], 0, 6) === 'Basic') {
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
}


if ($_SERVER['PHP_AUTH_USER'] !== 'usuario' || $_SERVER['PHP_AUTH_PW'] !== '') {

    header('WWW-Authenticate: Basic realm="Realm-Name"');
    if (substr($_SERVER['SERVER_SOFTWARE'], 0, 9) === 'Microsoft') {
        header('HTTP/1.0 401 Unauthorized');
    } else {
        header('Status: 401 Unauthorized');
        $msgden = "<h2 style=\"font-family: Impact; font-size: 15pt;color:Red;\">No tienes acceso a este sitio</h2>";
        echo $msgden;
    }
} else {

    $_SESSION['user'] = $_SERVER['PHP_AUTH_USER'];
    $_SESSION['pass'] = $_SERVER['PHP_AUTH_PW'];
    header("Location: material.php");
}
?>