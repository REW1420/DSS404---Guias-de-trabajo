<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Subir múltiples archivos</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/upload.css" />
</head>
<body>
<?php
define("PATH", "archivos");

// Verificar que la matriz asociativa $_FILES["archivos"] haya sido definida
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["archivos"])) {
    // Obtener la cantidad de archivos que se están subiendo
    $total = count($_FILES["archivos"]["name"]);

    // Recorrer cada archivo que se está subiendo
    for ($i = 0; $i < $total; $i++) {
        // Obtener las propiedades de cada archivo
        $tmp_name = $_FILES["archivos"]["tmp_name"][$i];
        $name = $_FILES["archivos"]["name"][$i];
        $size = $_FILES["archivos"]["size"][$i];

        echo "<h3 class=\"title\">Archivo " . ($i + 1) . "</h3>";
        echo "<b>Nombre original:</b> $name <br />";
        echo "<b>Nombre temporal:</b> $tmp_name <br />";
        echo "<b>Tamaño del archivo:</b> " . number_format($size, 2) . " bytes <br />";

        // Verificar la carpeta en el servidor donde se alojarán los archivos
        // que se desean subir. Si no existe esta carpeta se creará
        if (!file_exists(PATH)) {
            if (!mkdir(PATH, 0777, true)) {
                die("No se ha podido crear el directorio");
            }
        }

        // Mover el archivo a la carpeta especificada en el servidor
        if (move_uploaded_file($tmp_name, PATH . "/" . mb_convert_encoding($name, "ISO-8859-1", "UTF-8"))) {
            echo "Se ha cargado correctamente el archivo $name <br />";
        } else {
            echo "Error al cargar el archivo $name <br />";
            switch ($_FILES['archivos']['error'][$i]) {
                case UPLOAD_ERR_OK:
                    echo "<p>Se ha producido un problema con la carga del archivo.</p>\n";
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    echo "<p>El archivo es demasiado grande, no se puede cargar.</p>\n";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "<p>El archivo es demasiado grande, no se pudo cargar.</p>\n";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "<p>Sólo se ha cargado una parte del archivo.</p>\n";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "<p>Debe elegir un archivo para cargar.</p>\n";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "<p>Problema con el directorio temporal. Parece que no existe</p>\n";
                    break;
                default:
                    echo "<p>Se ha producido un problema al intentar mover el archivo $name.</p>\n";
                    break;
            }
        }
    }
} else {
    echo "<h3>No se han seleccionado archivos.</h3>";
}
?>
</body>
</html>
