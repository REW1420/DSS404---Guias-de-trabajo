<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular salario</title>
    <link rel="stylesheet" href="css/salario.css">
    <link rel="stylesheet" href="css/links.css">
    <script src="js/modernizr.custom.lis.js"></script>

</head>

<body>
    <header id="inset">
        <h1>Detalle del salario</h1>
    </header>
    <section>
        <article>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $empleado = isset($_POST['empleado']) ? $_POST['empleado'] : '';
                $sueldobase = isset($_POST['sueldobase']) ? floatval($_POST['sueldobase']) : 0.0;
                if (isset($_POST['hextra'])) {
                    $horasextras = isset($_POST['numhorasex']) ? intval($_POST['numhorasex']) : 0;
                    $pagoextra = isset($_POST['pagoextra']) ? floatval($_POST['pagoextra']) : 0.0;
                    $sueldohextras = $horasextras * $pagoextra;
                } else {
                    $horasextras = 0;
                    $pagoextra = 0;
                }

                $sueldoneto = $sueldobase + $sueldohextras;

                //format values
                $sueldobase = number_format($sueldoneto, 2, '.', '');
                $sueldohextras = number_format($sueldohextras, 2, '.', '');
                $sueldoneto = number_format($sueldoneto, 2, '.', '');

                if (!empty($empleado) || !empty($sueldobase)) {
                    echo "<div>\n<h3>Boleta de pago</h3>\n";
                    echo "<table>\n";
                    echo "\t<tr>\n\t\t<th colspan=\"2\">\n\t\tDetalle del pago\n\t\t</th>\n\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl empleado es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t", $empleado, "\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl sueldo base es: \n\t\t</td>\n\t\t<td class=\"detail\"\n\t\t\t$", $sueldobase, "\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tLas horas extras son: \n\t\t</td>\n\t\t<td class=\"detail\"\n\t\t\t$", $horasextras, "\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl pago por hora extra es: \n\t\t</td>\n\t\t<td class=\"detail\"\n\t\t\t$", $sueldohextras, "\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl sueldo neto devengado es: \n\t\t</td>\n\t\t<td class=\"detail\"\n\t\t\t$", $sueldoneto, "\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "</table>\n</div>\n";

                } else {
                    $backlink = <<<LINK
                    <a href="salario.html" class="a-btn">
                    <span class="a-btn-symbol">i</span>
                    <span class="a-btn-symbol">Regresar</span>
                    
                    <span class="a-btn-slide-text">al formulario</span>
                    <span class="a-btn-slide-icon"></span>
                    </a>
                    LINK;
                    echo $backlink;
                    exit();

                }



            }


            ?>
            <a href="salario.html" class="a-btn">
                <span class="a-btn-symbol">i</span>
                <span class="a-btn-symbol">Ingresar</span>

                <span class="a-btn-slide-text">otro empleado</span>
                <span class="a-btn-slide-icon"></span>

        </article>
    </section>
</body>

</html>