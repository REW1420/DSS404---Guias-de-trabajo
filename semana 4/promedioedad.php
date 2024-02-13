<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edades de personas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6Coli6uLrA9TnellEoa7RxnatzjcDSCG1MXXSR1GASXEV/Dwwykc2MPKBM2HN
crossorigin anonymous">
<link href="css/estilos.css" rel="stylesheet">
</head>
<body>
<main>
<div class="container px-4 py-5">
<h2 class="pb-2 border-bottom text-center">
Edades ingresadas
</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enviar'])) {
    if (isset($_POST['ingresados'])) {
        calcularedadprom($_POST['ingresados']);
    } else {

        $mensaje = '<div class="alert alert-danger" role="alert">';
        $mensaje .= "No hay edades que procesar.<br/>";
        $mensaje .= "<a href=\"edades.html\" class=\"alert-link\">Regresar</a>";
        $mensaje .= '</div>';
        echo $mensaje;
        exit(0);
    }
} else {
    $mensaje = '<div class="alert alert-danger" role="alert">';
    $mensaje .= 'No se puede acceder a esta secuencia de comando directamente.<br />';
    $mensaje .= "<a href=\"edades.html\" class=\"alert-link\">Regresar</a>";
    $mensaje .= "</div>";
    echo $mensaje;
    exit();
}
//Función para calcular la edad promedio

function calcularedadprom($edades)
{
    $promedades = 0;
    $contador = 0;
    if (is_array($edades)) {
        ?>
                        <table class="table table-stripped">
                        <thead>
                        <tr class="table-success">
                        <th>Edades Ingresadas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($edades as $edad) {
                            ?>
                                    <tr>
                                    <td><?php echo $edad; ?></td>
                                    </tr>
                                    <?php
                                    $promedades += $edad;
                                    $contador++;
                        }

                        $promedades / $contador;
                        $promedades = number_format($promedades, 2, '.', ',');
                        ?>
                        </tbody>
                        <tfoot>
                        <tr class="table-success">
                            <td>La edad promedio es: <?php echo $promedades ?></td>
                            </tr>
                        </tfoot>
                        </table>
                        <a href="edades.html">Regresar</a>
                        <?php
    }
}
?>
</div>
</main>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrep.bundle.min.js"
        integrity="sha384-T879500N/2PhcTj7RBCsy/@jlpcVBQyq46cDfL"
        crossorigin="anonymous"
      ></script>
      </html>
