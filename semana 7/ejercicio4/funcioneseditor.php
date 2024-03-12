<?php
define("PATH", "archivos");

function displayfilelist($message)
{
    displaypageheader();
    // Verificar si existe el directorio. Si no existe, crearlo
    if (!file_exists(PATH)) {
        // Crear el directorio y asignar los permisos al mismo
        if (!mkdir(PATH, 0777, true)) {
            die('No se ha podido crear el directorio');
        }
    }

    $dir = dir(PATH);
    if (!$dir) {
        die("No se puede abrir el directorio");
    }

    echo "<p class=\"error\">$message</p>";

    // Imprimiendo encabezados de la tabla
    echo "<table id=\"file-data\">\n";
    echo "<caption>Seleccione el archivo a editar</caption>\n";
    echo "<thead>\n<tr>\n<th>\nNombre del archivo\n</th>\n<th>\nTamaño\n</th>\n<th>\nModificación\n</th>\n</tr>\n</thead>\n";

    // Imprimiendo los archivos contenidos en el directorio y creando los enlaces para su edición
    echo "<tbody>\n";
    $numfilas = 0;

    while ($filename = $dir->read()) {
        $filepath = PATH . "/" . $filename;

        if ($filename != "." && $filename != ".." && is_dir($filepath) && strrchr($filename, ".txt")) {
            $clase = ($numfilas % 2 == 0) ? "odd" : "even";
            echo "<tr class=\"$clase\">\n<td>\n";
            echo "<a href=\"editortesto.php?filename=" . urlencode((binary) $filename) . "\">$filename</a>\n</td>\n";
            echo "<td>" . filesize($filepath) . "</td>";
            echo "<td>" . date("M j, Y H:i:s", filemtime($filepath)) . "</td>\n\n";
            $numfilas++;
        }
    }

    $dir->close();

    echo "</tbody>\n</table>\n";

    // Formulario para crear un nuevo archivo
    echo "<form name=\"nuevoarchivo\" action=\"editortexto.php\" method=\"POST\">\n";
    echo "<fieldset>\n<legend>Creando un nuevo archivo:</legend>\n";
    echo "<div style=\"width:40%;\">\n";
    echo "<label for=\"filename\">Nombre del archivo: </label>";
    echo "<input type=\"text\" name=\"filename\" id=\"filename\" placeholder=\"(Ingrese el nombre del archivo)\" maxlength=\"100\" />\n";
    echo "</div>\n";
    echo "<div id=\"boton\">\n";
    echo "<input type=\"submit\" name=\"createfile\" value=\"Crear archivo\" />";
    echo "</div>\n";
    echo "</fieldset>\n";
    echo "</form>\n";

    displaypagefooter();
}

function displayeditform($filename)
{
    $archivo = isset($_GET['filename']) ? $_GET['filename'] : '';
    echo "<div id=\"info-file\">\n";

    if (!$filename) {
        $filename = basename($archivo);
    }

    if (!$filename) {
        die("Nombre de archivo inválido");
    }

    $filepath = PATH . "/" . $filename;

    echo $filepath . "<br />\n";

    echo "</div>\n";

    if (!file_exists($filepath)) {
        die("Archivo no encontrado");
    }

    displaypageheader();

    echo "<section id=\"formulario\">\n";
    echo "<h2>Editando archivo: $filename</h2>\n";
    echo "<form name=\"creararchivo\" action=\"editortexto.php\" method=\"POST\">\n";
    echo "\t<input type=\"hidden\" name=\"Filename\" value=\"$filename\" />\n";
    echo "\t<textarea name=\"filecontents\" id=\"filecontents\" cols=\"100\" rows=\"20\">\n";
    echo file_get_contents($filepath);
    echo "</textarea>\n";
    echo "\t<input type=\"submit\" name=\"savefile\" value=\"Guardar archivo\" />\n";
    echo "\t<input type=\"submit\" name=\"cancel\" value=\"Cancelar\" />\n";
    echo "</form>\n";
    echo "</section>\n";

    displaypagefooter();
}

function savefile()
{
    $archivo = isset($_POST['filename']) ? $_POST['filename'] : '';
    $filename = basename($archivo);
    $filepath = PATH . "/" . $filename;

    if (!file_exists($filepath)) {
        die("Archivo no encontrado");
    }

    $filecontents = isset($_POST['filecontents']) ? $_POST['filecontents'] : '';

    if (file_put_contents($filepath, $filecontents) === false) {
        die("<p class=\"error\">No se ha podido guardar el archivo</p>\n");
    }

    displayfilelist();
}

function createfile()
{
    $filename = basename($_POST['filename']);

    // Verificar si el nombre del archivo contiene caracteres inválidos
    $filename = preg_replace('/[^A-Za-z0-9]/', '', $filename);

    if (!$filename) {
        displayfilelist("<p class=\"error\">Nombre de archivo no válido. Pruebe con otro nombre.</p>");
        return;
    }

    $filepath = PATH . "/" . $filename;

    if (file_exists($filepath)) {
        displayfilelist("El archivo $filename ya existe.");
    } else {
        if (file_put_contents($filepath, '') === false) {
            die("No se ha podido crear el archivo");
        }
        chmod($filepath, 0777);
        displayeditform($filename);
    }
}

function displaypageheader()
{
    echo "<!DOCTYPE html>\n";
    echo "<html lang=\"es\">\n";
    echo "<head>\n";
    echo "<meta charset=\"utf-8\" />\n";
    echo "<title>Editor de texto basado en web</title>\n";
    echo "<link rel=\"stylesheet\" href=\"css/page.css\" />\n";
    echo "</head>\n";
    echo "<body>\n";
}

function displaypagefooter()
{
    echo "</body>\n";
    echo "</html>";
}
?>
