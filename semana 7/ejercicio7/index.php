<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Subida de archivos al servidor con PHP</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- Static navbar-->
<div class="navbar navbar-default navbar-static-top">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="index.php">Cargador de archivos al servidor</a>
</div>
</div>
</div>
<div class="container">
<div class="row">
<?php
// Escaneando la carpeta uploads para verificar
// si existen archivos subidos y mostrarlos.
$folder = "uploads";
$results = scandir('uploads');
foreach ($results as $result) {
    if ($result === '.' || $result === '..') {
        continue;
    }
    if (is_file($folder . '/' . $result)) {
        echo '<div class="col-md-3">';
        echo '<!-- Dentro de este elemento DIV se muestran todas las imágenes que han sido subidas previamente a la carpeta uploads -->';
        echo '<div class="thumbnail">';
        // Se utiliza utf8_encode() para garantizar que se muestren correctamente los nombres de los archivos si incluyen caracteres especiales del idioma español
        echo '<img src="' . $folder . '/' . utf8_encode($result) . '" alt="...">';
        echo '<div class="caption">';
        // Se utiliza basename para extraer únicamente el nombre del archivo sin la ruta de la variable $result
        echo '<p>' . basename(utf8_encode($result)) . '</p>';
        echo '<p><a href="remove.php?name=' . $result . '" class="btn btn-danger btn-xs" role="button">Eliminar</a></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
</div>

<div class="row">
<div class="col-lg-12">
<form class="well" action="uploadFile.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<input type="hidden" name="MAX_FILE_SIZE" value="4096000" />
<!-- <label for="file">Seleccione el archivo a cargar</label> -->
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="inputGroupFileAddon1">Upload</span>
</div>
<div class="custom-file">
<input type="file" accept="image/gif, image/jpeg, image/png" name="file" id="inputGroupFile01" class="custom-file-input" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="inputGroupFile01">Seleccione el archivo a cargar</label>
</div>
</div>
<p class="help-block">Solo se permiten imágenes de formato jpg, jpeg, png y gif con un máximo de 4 MB.</p>
</div>
<input type="submit" class="btn btn-lg btn-primary" value="Subir">
</form>
</div>
</div>
</div> <!-- Fin del div class="container" -->
</body>
</html>
