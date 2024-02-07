<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de monedas</title>
    <link rel="stylesheet" href="css/monedas.css">
</head>

<body>
    <header>
        <h2>Tabla de conversion de colones a dolares</h2>
        <hr>
    </header>
    <section>
        <article>
            <?php
            define("EQUIV", 8.75);
            $colones = 0.25;

            $tabla = "<table>\n\t<thead>\n";
            $tabla .= "\t\t<tr>\n";
            $tabla .= "\t\t\t<th>Colones</th>\n";
            $tabla .= "\t\t\t<th>Dolares</th>\n";
            $tabla .= "\t\t<th>\n";
            $tabla .= "\t</thead>\n\t<tbody>\n";
            while ($colones <= 8) {
                $tabla .= "\t\t<tr class=\"highlight\">\n\t\t\t<td>&cent; ";

                $tabla .= number_format($colones, 2, ".", ".") . "</td>\n";
                $tabla .= "\t\t\t<td>\$ " . number_format($colones / EQUIV, 2, ".", ".");
                $colones += 0.25;
                $tabla .= "</td>\n\t\t</tr>\n";

            }
            $tabla .= "\t</tbody>\n</table>\n";
            echo $tabla;


            ?>
        </article>
    </section>
    <script src="js/modernizr.custom.lis.js"></script>

</body>

</html>