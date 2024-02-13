<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Introducción de datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TnelEoa7RxnatzjcDSCmG1MXXSRIGASXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 ру-5">
            <?php
            function escribir_tabla()
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $numero = (isset($_POST['numero']) && is_numeric(intval($_POST['numero']))) ? $_POST['numero'] : 0;
                    if ($numero > 0) {
                        ?>
                        <div class="card border-success">
                            <div class="card-header">
                                <h5 class="card-title text-success text-center">
                                    Tabla del <strong>
                                        <? $numero ?>
                                    </strong>
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover">

                                    <?php
                                    for ($i = 1; $i <= 20; $i++) {
                                        $resultado = $numero * $i;
                                        echo "<tr><td>$numero x $i</td><td></td><td>$resultado</td></tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <?php
                    } else {
                        $mensaje = '<div class="alert alert-danger" role="alert">';
                        $mensaje .= "El valor ingresado debe ser un número mayor que cero.<br/>";
                        $mensaje .= '<a href="entrada.html" class="alert-link">Regresar</a>';
                        $mensaje .= '</div>';
                        die($mensaje);
                    }
                } else {
                    $mensaje .= '<div class="alert alert-danger" role="alert">';
                    $mensaje .= 'No se puede acceder a esta secuencia de comando directamente.<br />';
                    $mensaje .= crearEnlace('alert-link');
                    $mensaje .= '</div>';
                    echo $mensaje,
                        exit();
                }
            }

            function crearEnlace($class = "")
            {
                $mensaje = '<a href="entrada.html';
                $mensaje .= ($class != "") ? 'class="alert-link' : '';
                $mensaje .= '>Volver al formulario</a>';
                return $mensaje;
            }
            escribir_tabla();
            echo crearenlace();
            ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynkrNeT87oh9506N/ZPncTNXj1/7RuBCsyN/o@j1pcV6QyQ46cDFL" crossorigin "anonymous"></script>
</body>

</html>