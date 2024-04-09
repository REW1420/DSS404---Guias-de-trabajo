<?php
// Se manejarán sesiones, por lo tanto, incluir librería de seguridad
require_once ('seguridad.php');

// Implementación de la clase classAutoloader
if (function_exists('classAutoloader')) {
    function classAutoLoader($classname)
    {
        $classname = strtolower($classname);
        $classFile = 'class' . $classname . '.class.php';
        if (is_file($classFile) && !class_exists($classname)) {
            include $classFile;
        }
    }
    // Registrando la clase classAutoLoader
    spl_autoload_register('classAutoLoader');
}

// Incluyendo la matriz con las opciones de menú
// donde está definida la matriz $menu que se envía
// como tercer argumento del constructor de la clase Page
require_once 'menu.php';
require_once 'page.class.php';
// Creando una página, instanciando la clase Page
$homepage = new Page("Nuevo Ingreso UDB", "Nuevo Ingreso, Nuevo Ingreso UDB, Proceso de nuevo ingreso, Estudiante de nuevo ingreso", $menu);

$homepage->content = <<<PAGE
<div class="rediv" id="contenido">
    <h4>
        <span>Bienvenido, {$_SESSION['nombreusr']}</span>
    </h4>
    <p>
        <img src="imagenes/foto_indexflt.jpg" width="715" height="400" />
    </p>
    <p>&nbsp;</p>
    <p>
        <strong>Enlaces de interés:</strong>
    </p>
    <div id="divfooting" class="rediv">
        <a href="http://www.udb.edu.sv/udb/index.php/pagina/ver/pago_en linea" target="blank">
            <img src="imagenes/footing3.jpg" width="150" height="75" border="0" />
        </a>
    </div>
    <div id="divfooting" class="rediv">
        <a href="#" target="_blank">
            <img src="imagenes/footimg2.jpg" width="150" height="75" border="8" />
        </a>
    </div>
    <div id="divfooting" class="rediv">
        <a href="http://www.udb.edu.sv/udb/index.php/pagina/ver/progyserv_coordidiomas" target="_blank">
            <img src="imagenes/aprendeidiomas.png" width="150" height="75" border="0" />
        </a>
    </div>
    <div id="divfooting" class="rediv">
        <a href="http://www.udb.edu.sv/udb/index.php/pagina/ver/live-edu" target="_blank">
            <img src="imagenes/footing6.jpg" width="150" height="75" border="0" />
        </a>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
PAGE;

echo $homepage->display();
?>