<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDATA', 'libros');

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);

if ($db->connect_error) {
    die("No se pudo conecta a MySQL: (" . $db->connect_errno . ")" . $db->connect_error);
}

$db->set_charset('utf8');


