<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serie de Fibonacci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        Integrity="sha384-T3c6Co116uLrA9TneNEoa7RxnatzjcDSCmG1MXxSRIGASXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5">
            <h2 class="pb-2 border-bottom">
                Serie de Fibonacci con recursividad
            </h2>
            <?php
            //Función de Fibonacci recursiva
            function fibonacci($n)
            {
                if ($n == 0 || $n == 1) {
                    return $n;
                } else {
                    return fibonacci($n - 1) + fibonacci($n - 2);
                }
            }
            //Verificar si se ha producido un envio de formulario con metodo GET
// o en caso contrario mostrar el formulario
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['enviar']) && $_GET['enviar'] == 'Generar'):
                //Verificando el correcto ingreso de datos
                $numero1 = !empty($_GET['numero']) ? intval($_GET['numero']) : 0;
                if ($numero1 == 0):
                    $mensaje = '<div class="alert alert-danger" role="alert">';
                    $mensaje .= 'Valor del campo no valido.<br />';
                    $mensaje .= 'Ingrese el dato nuevamente.<br/>';
                    $mensaje .= "<a href=\"{$_SERVER['PHP_SELF']}\" class=\"alert-link\">Regresar</a>";
                    $mensaje .= '</div>';
                    echo $mensaje;
                    exit(0);
                endif;
                ?>
                <div class="card border-success">
                    <div class="card-header">
                        <h5 class="card-title text-success">Generando serie de Fibonacci</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-success">
                            <tbody>
                                <?php
                                ?>
                                </tbod>
                                <?php

                                $i = 0;
                                while ($i <= $numero1) {
                                    echo "<tr><td>F<sub>$i</sub></td><td>" . fibonacci($i) . "</td></tr>";
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Ingresar nuevos datos</a>
                <?php
            else:
                ?>
                <div class="card border-success">
                    <div class="card-header">
                        <h5 class="card-title text-success">Serie de</h5>
                        <h6 class="card-subtitle text-muted text-success">Fibonacci</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Cantidad de valores para serie</label>
                                <input type="number" class="form-control" id="numero" name="numero" required>
                            </div>
                            <input type="submit" name="enviar" value="Generar" class="btn btn-success" />
                            <input type="reset" name="limpiar" value="Cancelar" class="btn btn-danger" />
                        </form>
                    </div>
                    <?php
            endif;
            ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh950GNyZPhcTNXJ1NW7RuBCsyN/o@jlpcV8Qyq46cDFL"
        crossorigin="anonymous"></script>
</body>

</html>