<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximumscale=1">
<title>Datos del empleado</title>
<link rel="stylesheet" href="/css/material.css"/>
<link rel="stylesheet" href="/css/links.css" />
<link rel="stylesheet" href="/css/table.css" />
</head>
<body>
<div class="contenedor-formulario">
<div class="игар">
<?php
//Implementación de la clase classAutoloader
if (!function_exists('classAutoLoader')) {
    function classAutoLoader($classname)
    {
        $classname = strtolower($classname);
        $classFile = 'class/' . $classname . 'class.php';

        if (is_file($classFile) && !class_exists($classname))
            include $classFile;
    }
}

//Registrando la clase classAutoloader
spl_autoload_register('classAutoLoader');

if ($_SERVER["REQUEST_METHOD"] = 'POST' && isset($_POST["enviar"])) {
    if (isset($_POST['enviar'])) {
        echo "<h3>Boleta de pago del empleado</h3>";
        $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";

        $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';

        $sueldo = (isset($_POST['sueldo'])) ? doubleval($_POST['sueldo']) : 0.0;

        $numHorasExtras = (isset($_POST['horasextras'])) ?
            intval($_POST['horasextras']) : 0;
        $pagohoraextra = (isset($_POST['pagohoraextra'])) ?
            floatval($_POST['pagohoraextra']) : 0.0;

        //Creando instancias de la clase empleado
        $empleadol = new empleado();
        $empleadol->obtenerSalarioNeto(
            $name,
            $apellido,
            $sueldo,
            $numHorasExtras,
            $pagohoraextra
        );
    }
} else {
    ?>

                                                                        <h1>Ingresar información del empleado</h1>
                                                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="formulario"
                                                                        name="formulario_registro">
                                                                        <div>
                                                                        <div class="input-group">
                                                                        <input type="text" id="nombre" name="nombre" maxlength="30">
                                                                        <label class="label" for="nombre">Nombre empleado</label>
                                                                        </div>

                                                                        <div class="input-group">
                                                                        <input type="text" id="apellido" name="apellido" maxlength="30">
                                                                        <label class="label" for="apellido">Apellido empleado</label>
                                                                        </div>
                                                                        <div class="input-group">
                                                                        <input type="number" id="sueldo" name="sueldo" maxlength="9" min="0.00" step=".01">
                                                                        <label class="label" for="sueldo">Sueldo empleado ($)</label>
                                                                        </div>
                                                                        <div class="input-group">
                                                                        <input type="number" id="horasextrasextras" name="horase prasextras" maxlength="2" sin="0" step="1">
                                                                        <label class="label" for="horasextras">Número hor horas extras</label>
                                                                        </div>
                                                                        <div class="input-group">
                                                                        <input type="number" id="pagohoraextra" name="pagohoraextra aextra" maxlength="6" min="0.00" step="01">
                                                                        <label class="label" for="pagohoraextra">Pago por hora extra</label>
                                                                        </div>
                                                                        <input type="submit" id="btn-submit" name="enviar" value="Enviar">
                                                                        </div>
                                                                        </form>
                                                                        <?php
}
?>

</div>
</div>
</body>
<script src="/js/material.js"></script>
</html>