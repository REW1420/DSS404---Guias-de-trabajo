<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Ejemplo usando singleton</title>
<link rel="stylesheet" href="css/boxes.css"/>
</head>

<?php
// Implementación de la clase Autoloader
if (!function_exists('classAutoLoader')) {
    function classAutoLoader($className)
    {
        $className = strtolower($className);
        $classFile = "class/" . $className . ".class.php";
        if (is_file($classFile) && class_exists($className)) {
            include $classFile;
        }
    }
}

// Registrando la clase Autoloader
spl_autoload_register('classAutoLoader');
include_once ('class/database.class.php');
// Probando el objeto conexión con el patrón Singleton
$db = Database::getInstance();
$mysqli = $db->getConnection();

// Creando una consulta para obtener el autor, título y precio de los libros registrados en la base de datos
$sql = "SELECT autor, titulo, precio FROM libros ORDER BY titulo, autor";
$rs = $mysqli->query($sql);
$list = "";
while ($row = $rs->fetch_object()) {
    $list .= "\t<div class=\"block\">\n\t\t<ul>\n";
    $list .= "\t\t\t<li>Autor: " . $row->autor . "</li>\n";
    $list .= "\t\t\t<li>Título: " . $row->titulo . "</li>\n";
    $list .= "\t\t\t<li>Precio: " . $row->precio . "</li>\n";
    $list .= "\t\t</ul>\n\t</div>\n";
}
echo $list;

// Obteniendo el número de registros obtenidos después de ejecutar la consulta
echo "<p>Número de registros devueltos: " . $rs->num_rows . "</p>";

// Creando otra instancia del objeto
$dbdos = Database::getInstance();
$mysqli2 = $dbdos->getConnection();

// Ahora la consulta obtendrá únicamente los títulos de los libros ordenados en orden descendente
$rsdos = $mysqli2->query("SELECT titulo FROM libros WHERE titulo LIKE '%javascript%' ORDER BY titulo DESC");
$listdos = "";
while ($rowdos = $rsdos->fetch_object()) {
    $listdos .= "\t<div class=\"block\">\n\t\t<ul>\n";
    $listdos .= "\t\t\t<li>Título: " . $rowdos->titulo . "</li>\n";
    $listdos .= "\t\t</ul>\n\t</div>\n";
}
echo $listdos;

// Obteniendo el número de registros obtenidos después de ejecutar la consulta
echo "<p>Número de registros devueltos: " . $rsdos->num_rows . "</p>";
?>
</body>
</html>