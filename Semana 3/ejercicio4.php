<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial de un numero</title>
    <link rel="stylesheet" href="css/fonst.css">
    <link rel="stylesheet" href="css/factorial.css">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/filterTextField.js"></script>



</head>

<body>
    <header>
        <h1>Obtener el factorial de un numero</h1>
    </header>
    <section>
        <article>
            <div class="contenedor">
                <?php
                $smg = "\t\t<p>Calculo del factorial</p>\n";
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["enviar"])):

                    $cont = is_numeric($_POST["factorial"]) ? trim($_POST["factorial"]) : null;
                    $msg = !isset($cont) ? "\t\t<p>No ha ingresado ninun numero</p>\n" : "";
                    echo $msg;
                    echo "<div class=\"encabezado\"\n";
                    if (!empty($smg)):
                        echo "<h3>No ha ingresado un numero entero</h3>";
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\">Volver a intentarlo</a>";
                        exit(0);
                    endif;

                    if (!is_numeric($cont)):
                        echo "<h3>No ha ingresado un numero entero</h3>";
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\">Volver a intentarlo</a>";
                        exit(0);
                    endif;
                    if ($cont == 0):
                        $factorial = 1;
                        echo "0! = " . $factorial . "<br/>";
                        exit(0);
                    endif;
                    $factorial = 1;
                    echo "0! = " . $factorial . "<br/>";
                    while ($cont > 0):
                        $factorial *= $cont;
                        $cont--;
                    endwhile;
                    echo "<strong>" . $factorial . "</strong></p>";
                    echo "<p><a href=\"{$_SERVER['PHP_SELF']}\">Calcular factorial de otro numero</a>";
                    echo "</div>";

                endif;


                ?>
            </div>
        </article>
    </section>
</body>

</html>