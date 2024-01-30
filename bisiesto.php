<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Año bisiesto</title>
    <link rel="stylesheet" href="css/fonst.css">
    <link rel="stylesheet" href="css/formstyle.css">
    <link rel="stylesheet" href="css/bisiesto.css" media="screen">
    <script src="js/validatedata.js"></script>
    <script src="js/prefixfree.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php
        //if alternativos
        
        if (!isset($_POST["enviar"])):


            ?>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" name="frmdatos">

                <h2 class="contact">Año bisiesto</h2>
                <span class="contact">
                    <label for="txtdato">Probar año:</label>
                </span>
                <input type="text" name="year" value="" maxlength="20" placeholder="(Ingrese el dato)"><br />
                <span id="numbersOnly">Ingrese numeros enteros</span>
                <input type="submit" name="enviar" id="enviar" value="Probar">

            </form>
        <?php
        else:
            //scritp
            $year = isset($_POST["year"]) ? $_POST["year"] : 0;
            if ($year != 0):
                if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0):
                    echo "<p class=\"bisiesto\">\n";
                    echo "\t<span style=\"color:black;font:bold 15px 'Lucida Sans';\"El año $year es bisiesto</span><br/>\n";
                    echo "\t<span style=\"color:#021540;font:bold 15px 'Lucida Sans';\">\n\t<a href=\"{$_SERVER['PHP_SELF']}\"Probar otro año </a>\n\t</span>\n";
                    echo "</p>\n";
                else:
                    echo "<p class=\"bisiesto\">\n";
                    echo "\t<span style=\"color:#ec1111;font:bold 15px 'Lucida Sans';\"El año $year no es bisiesto</span><br/>\n";
                    echo "\t<span style=\"color:#021540;font:bold 15px 'Lucida Sans';\">\n\t<a href=\"{$_SERVER['PHP_SELF']}\"Probar otro año </a>\n\t</span>\n";
                    echo "</p>\n";
                endif;
            else:
                echo "<p class=\"bisiesto\">\n";
                echo "\t<span style=\"color:#ec1111;font:bold 15px 'Lucida Sans';\"No se a ingresado un año valido</span><br/>\n";
                echo "\t<span style=\"color:#021540;font:bold 15px 'Lucida Sans';\">\n\t<a href=\"{$_SERVER['PHP_SELF']}\"Regresar </a>\n\t</span>\n";
                echo "</p>\n";
            endif;
        endif;
        ?>

    </div>
</body>

</html>