<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de imagenes</title>
    <link rel="stylesheet" href="/css/miniaturas.css">
</head>
<body>
    <header class="engraved" >Imagenes miniaturas con PHP</header>
<section>
    <article>
    <?php
    //Implementación de la clase classAutoLoader
    if (!function_exists('classAutoLoader')) {
        function classAutoLoader($classname)
        {
            $classname = strtolower($classname);
            $classFile = 'class/' . $classname . '.class.php';
            if (is_file($classFile) && !class_exists($classname))
                include $classFile;
        }
    }


    spl_autoload_register('classAutoLoader');
    $objpng = new archivoPNG("escudo-el-salvador.png");


    $archivoimagen = "escudo-el-salvador.png";

    $archivoimagenmuestra = "thumbs-escudo-es.png";
    $objpng = new archivoPNG($archivoimagen);
    $objpng->creamuestra($archivoimagenmuestra, 64, 64);
    $objpngmuestra = new archivoPNG($archivoimagenmuestra);
    $objpng->mostrarimagenesPNG(
        $archivoimagen,
        $archivoimagenmuestra,
        $objpng,
        $objpngmuestra
    );
    ?>
</article>
</section>
</body>
</html>