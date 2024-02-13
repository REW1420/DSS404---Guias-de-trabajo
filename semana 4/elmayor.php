<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajando con funciones de lista variable de argumentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        Integrity="sha384-T3c6Co116uLrA9TneNEoa7RxnatzjcDSCmGIMXxSRIGASXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <main>

        <div class="container px-4 py-5">
            <h2 class="po-2 border-bottom text-center"> Mayor de una lista de números</h2>
            <?php
            function elMayor()
            {

                //Obtener el número de argumentos enviados
                $num_args = func_num_args();
                //Obtener los argumentos enviados
                $args = func_get_args();
                //Se asume que el número mayor es el priser argumento
                $elmayor = $args[0];

                for ($i = 1; $i < $num_args; $i++) {

                    //Compara en cada iteración si el argumento actual es mayor
                    $elmayor = $args[$i] > $elmayor ? func_get_arg($i) : $elmayor;
                }

                return $elmayor; //Retornar el número mayor
            }
            ?>

            <div class="row row-cols-1 row-cols-nd-2 g-4">
                <div class="col">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <?php
                            echo "<p>El mayor de 58, 167, 242, 85, 31, 109, -26, 81, 16, 126 es: </p>\n" .
                                "<h3>" . elMayor(58, 167, 242, 85, 31, 109, 26, 81, 16, 126) . "</h3>";
                            ?>

                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-bg-primary">
                        <div class="card-body">
                            <?php
                            echo "<p>El mayor de 61, 37, 75, 184, 42, 303, 43, 56, 121, 226, 172, 78, 6, 86 es: </p>\n" .
                                "<h3>" . elMayor(61, 37, 75, 184, 42, 303, 43, 56, 121, 226, 172, 78, 6, 86) . "</h3>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh950GlyZPhcTNXj1NW7Ru8CsyN/o@jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>