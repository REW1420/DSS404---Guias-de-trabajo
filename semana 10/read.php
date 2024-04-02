<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Obtener información del usuario con PDO</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="content">
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-offset-2 col-md-8">
<h1>Mostrar información del usuario</h1>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-offset-2 col-md-8">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<a href="index.php" class="btn btn-default">Back</a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-offset-2 col-md-8">
<table class="table table-bordered">
<thead>
<tr>
<th class="text-center">#</th>
<th class="text-center">Nombre</th>
<th class="text-center">Apellido</th>
<th class="text-center">Edad</th>
<th class="text-center">Género</th>
<th class="text-center">Ciudad</th>
</tr>
</thead>
<tbody>
<?php
if (!empty ($_GET)) {
    //Implementación de la clase Autoloader
    if (!function_exists('classAutoLoader')) {
        function classAutoLoader($className)
        {
            $className = strtolower($className);
            $classFile = $className . '.php';
            if (is_file($classFile) && !class_exists($className)) {
                include $classFile;
            }
        }
    }
    //Registrando la clase Autoloader
    spl_autoload_register('classAutoLoader');
    $cn = Database::connect();
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $cn->prepare("SELECT * FROM usuario WHERE idusuario = ?");
    $query->execute(array($_GET['id']));
    $data = $query->fetch(PDO::FETCH_ASSOC);
    echo "<tr>";
    echo "<td class='text-center'>" . $data["idusuario"] . "</td>";
    echo "<td class='text-center'>" . $data["nombre"] . "</td>";
    echo "<td class='text-center'>" . $data["apellido"] . "</td>";
    echo "<td class='text-center'>" . $data["edad"] . "</td>";
    echo "<td class='text-center'>" . $data["genero"] . "</td>";
    echo "<td class='text-center'>" . $data["ciudad"] . "</td>";
    echo "</tr>";
} else {
    echo "<tr><td colspan='6' class='text-center'>Nada ha venido</td></tr>";
}
?>
</tbody>
</table>
</div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
