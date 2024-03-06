<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Crear y usar interfaces</title>
<link rel="stylesheet" href="/css/common.css" />
</head>
<body>
<header>
<h1>Almacén "El Machetazo"</h1>
</header>
<section>
<article>
<?php
// Implementación de la clase classAutoloader
if (!function_exists('classAutoLoader')) {
    function classAutoloader($classname)
    {
        $classname = strtolower($classname);
        $classFile = 'class/' . $classname . '.class.php';
        if (file_exists($classFile) && class_exists($classname)) {
            include $classFile;
        }
    }
}

// Registrando la clase classAutoloader
spl_autoload_register("classAutoLoader");

$tv = new television;
$tv->setScreenSize(42);
$ball = new tennisBall;
$ball->setColor("amarilla");
$manager = new storeManager();
$manager->addProduct($tv);
$manager->addProduct($ball);
$manager->stockUp();

echo "<p>Existen " . $tv->getStockLevel() . " televisores de " . $tv->getScreenSize() . "-pulgadas y " . $ball->getStockLevel() . " pelotas de tenis " . $ball->getColor() . " en existencia.</p>";

echo "<p>Vendiendo un televisor...</p>";
$tv->sellItem();
echo "<p>Vendiendo dos pelotas de tenis...</p>";
$ball->sellItem();
$ball->sellItem();

echo "<p>Ahora existen " . $tv->getStockLevel() . " televisores de " . $tv->getScreenSize() . "-pulgadas y " . $ball->getStockLevel() . " pelotas de tenis en existencia.</p>";
?>
</article>
</section>
</body>
</html>
