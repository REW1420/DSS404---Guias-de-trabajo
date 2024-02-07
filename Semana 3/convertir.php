<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor a binario</title>
    <link rel="stylesheet" href="css/decimalbinario.css">
    <script src="js/modernizr.custom.lis.js"></script>

</head>

<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["convertir"])) {
            $decimal = isset($_POST["numero"]) && ($_POST["numero"] > 0) ? intval($_POST["numero"]) : 0;
            if ($decimal === 0) {
                $msg = <<<MSG
                <header>
                <h1>Ha ocurrido un error </h1>
                </header>
                <article>
                <div id="wrapper">
                <span class="marked">El valor ingresado no es valido</span>
                <a href="ejercicio1.html">Regresar</a>
                </div>
                </article>
                MSG;
                echo $msg;
                exit();
            }
        }

        ?>
        </header>
        <?php
    } else {
        $msg = <<<MSG
        <header>
        <h1>Ha ocurrido un error </h1>
        </header>
        <article>
        <div id="wrapper">
        <span class="marked">No se puede acceder a este programa</span>
        <a href="ejercicio1.html">Regresar</a>
        </div>
        </article>
        MSG;
        echo $msg;
        exit();
    } ?>
    <?php

    if (is_numeric($decimal)) {

        $msg = <<<MSG
        <header>
        <h1>$decimal <sub>10</sub> convertido a binario </h1>
        </header>
        <section>
        <article>
        <div id="wrapper">
        <p>El numero decimal es: <b>$decimal</b></p>
        
        MSG;
        echo $msg;
        $binario = '';
        
        do {
            $binario = $decimal % 2 . $binario;
            $msg = "$decimal % 2 =";
            $msg .= "<b>$binario</b><br>\n";
            echo $msg;
            $decimal = (int) ($decimal / 2);
        } while ($decimal > 0);
        $msg = "<span class=\"marked\">Numero binario resultante: ";
        $msg .= "$binario </span>\n";
        $msg .= "</div>\n</article>\n</section>\n";
        echo $msg;
    }
    ?>
</body>

</html>