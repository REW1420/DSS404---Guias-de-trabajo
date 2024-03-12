<?php
// Implementación de la clase classAutoLoader
if (!function_exists('classAutoLoader')) {
    function classAutoLoader($classname)
    {
        $classname = strtolower($classname);
        if ($classname == "empleado" || $classname == "estudiante" || $classname == "bebe") {
            $classFile = "class/poocompleto.class.php";
        } else {
            $classFile = "class/" . $classname . ".class.php";
        }
        if (is_file($classFile) && !class_exists($classname)) {
            include $classFile;
        }
    }
}

// Registrando la clase classAutoLoader
spl_autoload_register('classAutoLoader');

// Establecer el conjunto de caracteres desde el servidor
header("Content-Type: text/html; charset=utf-8");

// Creando al primer empleado
echo "&ndash; Primera persona y empleado: <br />\n";
$employeel = new empleado('Carlos López');
echo $employeel . "<br /><br />\n";

// Creando al empleado 2 utilizando clonación
echo "&ndash; Segundo empleado creado con clonación: <br />\n";
$employee2 = clone $employeel;
$employee2->asignaNombre("Maria Calderón");
echo $employee2 . "<br /><br />\n";

// Se crea el empleado 3 y luego se anula
echo "&ndash; Se crea al empleado 3 y después se anula su referencia: <br />\n";
$employee3 = new empleado('Sonia Cuellar');
echo $employee3 . "<br /><br />\n";
$employee3 = NULL;

// Se crea un par de personas más
echo "&ndash; Creación de 2 personas más que no son empleados: <br />\n";
$personal = new estudiante('Medardo Enrique Somoza', 'Ingeniería en Computación');
$personal->tienelibro('La Biblia de PHP 5');
echo $personal . "<br /><br />\n";

$persona2 = new bebe('Bebé 1');
echo $persona2 . "<br />\n";
echo "Principal ocupación: ";
echo $persona2->ocupacionPrincipal() . "<br /><br />\n";
echo "Población actual: " . persona::poblacion() . "<br /><br />\n";

// Se crea un nuevo empleado reutilizando el identificador $id
echo "&ndash; Creando al empleado 4 y mostrando información: <br />\n";
$employee4 = new empleado('Pedro Cruz');
echo $employee4 . "<br /><br />\n";
echo "Población actual: " . persona::poblacion() . "<br /><br />\n";
?>
