<?php
// Implementar la autocarga de clases cuando se intente instanciar
function autoload($classname)
{
    require_once "class/" . $classname . ".class.php";
}

// Registrando la función de autocarga de clases
spl_autoload_register('autoload');

// Procesar el envío del formulario a través del método POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validar que los campos contengan un valor y no estén vacíos
    $isbn = isset ($_POST["isbn"]) ? trim($_POST['isbn']) : null;
    $autor = isset ($_POST['author']) ? trim($_POST['author']) : null;
    $titulo = isset ($_POST['title']) ? trim($_POST['title']) : null;
    $precio = isset ($_POST['price']) ? trim($_POST['price']) : null;

    // Crear el objeto de conexión utilizando el patrón Singleton
    $db = Database::getInstance();
    $mysqli = $db->getConnection();

    // Definir un array para manejar los errores que puedan ocurrir al validar los datos ingresados
    $errors = array();

    // Escapar caracteres especiales para evitar problemas al insertar
    $isbn = $mysqli->real_escape_string($isbn);
    $autor = $mysqli->real_escape_string($autor);
    $titulo = $mysqli->real_escape_string($titulo);
    $precio = $mysqli->real_escape_string($precio);

    // Validación del ISBN con filter_var()
    $opciones = array(
        "options" => array(
            "regexp" => "/^(97[89])\-\d{2}\-\d{3}\-\d{4}\-\d{1}$/"
        )
    );
    if (!filter_var($isbn, FILTER_VALIDATE_REGEXP, $opciones)) {
        $errors[] = "El ISBN no es válido";
    }

    // Validación del nombre del autor con filter_var()
    $opciones = array(
        "options" => array(
            "regexp" => "/^([A-Za-záéíóúüÜÜÜ]+\s?)+([A-Za-zÑñÁáÉéÍíÓóÚúÜü]+$)/"
        )
    );
    if (!filter_var($autor, FILTER_VALIDATE_REGEXP, $opciones)) {
        $errors[] = "El nombre del autor no es válido";
    }

    // Validación del título del libro usando filter_var()
    if (!filter_var($titulo, FILTER_SANITIZE_STRING)) {
        $errors[] = "El título del libro parece no ser correcto";
    }

    if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
        $errors[] = "El precio no es válido";
    }

    // Verificar que no hubo errores en el ingreso de datos
    if (count($errors) == 0) {
        // Consulta SQL de inserción
        $sql = "INSERT INTO libros (isbn, autor, titulo, precio) VALUES (?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $mysqli->prepare($sql);

        // Vincular los valores de los campos proporcionados
        $stmt->bind_param("sssd", $isbn, $autor, $titulo, $precio);

        // Ejecutar la consulta
        $stmt->execute();

        // Mostrar información de las filas afectadas después de la inserción
        echo "<p>" . $stmt->affected_rows . " fila(s) insertada(s).</p>";

        // Cerrar la sentencia y la conexión a la base de datos
        $stmt->close();
        $mysqli->close();
    } else {
        // Mostrar los errores
        $list_errors = "\t\t\t<ul>\n";
        for ($i = 0; $i < count($errors); $i++) {
            $list_errors .= "\t\t\t\t<li>" . $errors[$i] . "</li>\n";
        }
        $list_errors .= "\t\t\t</ul>\n";
        echo $list_errors;
    }
} else {
    // Si los datos del formulario no se han enviado por el método adecuado
    die ("<p>Los datos del formulario no se han enviado por el método adecuado.</p>");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Ejemplo de uso del patrón Singleton con extensión MySQLi de PHP</title>
<link rel="stylesheet" href="css/basic.css" />
<link rel="stylesheet" href="css/button.css" />
</head>
<body>
<section>
<div id="content">
    <div id="button">
        <a href="libros-insert-singleton.php" data-icon="#" class="button orange shield glossy">Regresar</a>
    </div>
</div>
</section>
</body>
</html>
