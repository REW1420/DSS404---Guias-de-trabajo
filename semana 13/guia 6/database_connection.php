<?php
$servidor = 'localhost';
$usuario = 'root';
$password = '';

try {
    $connect = new PDO(
        "mysql:host=$servidor;dbname=livepollphp",
        $usuario,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'conectado';
} catch (PDOException $e) {
    echo 'error ' . $e->getMessage();
}