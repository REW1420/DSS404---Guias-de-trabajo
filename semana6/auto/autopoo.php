<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/autospoo.css">
</head>

<body>
    <header>
        <h1>Autos disponibles</h1>
    </header>

    <section>
        <article>
            <?php
            if (!function_exists('classAutoLoader')) {
                function classAutoLoader($classname)
                {
                    $classname = strtolower($classname);
                    $classfile = 'class/' . $classname . '.class.php';
                    if (is_file($classfile) && !class_exists($classname))
                        include $classfile;


                }

            }
            spl_autoload_register('classAutoLoader');

            $movil[0] = new auto("Peugeot", "307", "Gris", "/img/peugeot.jpg");
            $movil[1] = new auto("Renault", "Clio", "Marron", "/img/renaultclio.jpg");
            $movil[2] = new auto("BMW", "Serie6", "Azul", "/img/bmwserie6.jpg");

            $movil[3] = new auto();

            for ($i = 0; $i < count($movil); $i++) {
                $movil[$i]->mostrar();
            }


            ?>


        </article>
    </section>
</body>

</html>