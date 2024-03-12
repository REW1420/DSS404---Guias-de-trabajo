<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $size = $_FILES['file']['size'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    switch ($error) {
        // Verificando que el archivo ha sido subido con éxito utilizando las constantes de error devueltas por la matriz superglobal $_FILES['archivo_usuario']['error']
        case UPLOAD_ERR_OK:
            $valid = true;
            // Validando que la extensión del archivo subido al servidor sea de las extensiones permitidas
            if (!in_array($ext, array("jpg", "jpeg", "png", "gif"))) {
                $valid = false;
                $response = '<div class="col-md-3"><div class="caption"><p>La extensión del archivo no es válida.</p></div></div>';
            }
            // Validando que el archivo pese 4 MB o menos
            if ($size > 4096000) {
                $valid = false;
                $response = '<div class="col-md-3"><div class="caption"><p>El tamaño del archivo excede el máximo permitido de 4 MB.</p></div></div>';
            }
            // Si se pasaron todas las verificaciones, mover el archivo a la carpeta destino que es uploads
            if ($valid) {
                $targetPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $name;
                move_uploaded_file($tmpName, mb_convert_encoding($targetPath, "ISO-8859-1", "UTF-8"));
                // Redirigir al usuario a la página de inicio index.php
                header('Location: index.php');
                exit;
            }
            break;
        // El archivo subido excede la directiva upload_max_filesize del php.ini
        case UPLOAD_ERR_INI_SIZE:
            $response = '<div class="col-md-3"><div class="caption"><p>El tamaño del archivo excede el establecido en la directiva upload_max_filesize del php.ini.</p></div></div>';
            break;
        // El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML
        case UPLOAD_ERR_FORM_SIZE:
            $response = '<div class="col-md-3"><div class="caption"><p>El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.</p></div></div>';
            break;
        // El archivo solo se subió parcialmente
        case UPLOAD_ERR_PARTIAL:
            $response = '<div class="col-md-3"><div class="caption"><p>El archivo se subió solo parcialmente.</p></div></div>';
            break;
        // No se subió archivo alguno
        case UPLOAD_ERR_NO_FILE:
            $response = '<div class="col-md-3"><div class="caption"><p>No se ha subido ningún archivo.</p></div></div>';
            break;
        // No existe la carpeta temporal requerida en el servidor para implementar la carga de archivos
        case UPLOAD_ERR_NO_TMP_DIR:
            $response = '<div class="col-md-3"><div class="caption"><p>No existe la carpeta temporal en el servidor para subida de archivos.</p></div></div>';
            break;
        // No se ha podido escribir el archivo en disco, seguramente por problemas de permisos y porque falta la carpeta o directorio destino en el servidor
        case UPLOAD_ERR_CANT_WRITE:
            $response = '<div class="col-md-3"><div class="caption"><p>Se ha producido un error de escritura en disco cuando se intentó subir el archivo al servidor.</p></div></div>';
            break;
        default:
            $response = 'Error desconocido';
            break;
    }
    echo $response;
}
?>
