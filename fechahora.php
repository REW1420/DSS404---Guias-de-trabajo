<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha y hora del sistema</title>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <link rel="stylesheet" href="css/fechahora.css">
</head>

<body>
    <?php

    date_default_timezone_set("America/El_Salvador");
    $dia = date("w");
    switch ($dia) {
        case 0:
            $dia = "Domingo";
            break;
        case 1:
            $dia = "Lunes";
            break;
        case 2:
            $dia = "Martes";
            break;
        case 3:
            $dia = "Miercoles";
            break;
        case 4:
            $dia = "Jueves";
            break;
        case 5:
            $dia = "Viernes";
            break;
        case 6:
            $dia = "Sabado";
            break;

    }
    $mes = date("n");
    switch ($mes) {
        case 1:
            "Enero";
            break;
        case 2:
            "Febrero";
            break;
        case 3:
            "Marzo";
            break;
        case 4:
            "Abril";
            break;
        case 5:
            "Mayo";
            break;
        case 6:
            "Junio";
            break;
        case 7:
            "Julio";
            break;
        case 8:
            "Agosto";
            break;
        case 9:
            "Septiembre";
            break;
        case 10:
            "Octubre";
            break;
        case 11:
            "Noviembre";
            break;
        case 12:
            "Diciembre";
            break;
    }

    $numer = date("j");
    $anio = date("Y");
    $hora = date("g:i a");

    printf("<section>\n");
    printf("\t<div class=\"box box shadow3\">\n");
    printf("\t\t<p>Hoy es %s, %d de %s del %d \n</p>\n", $dia, $numer, $mes, $anio);
    printf("\t</div>\n");
    printf("\t<div class=\"box box4 shadow4\">\n");
    printf("\t\t\t<p>Son las: %s \n\t\t</p>\n", $hora);
    printf("\t</div>\n");
    printf("</section>\n");

    ?>
</body>
<script src="js/modernizr.custom.lis.js"></script>
<script src="js/prefixfree.js"></script>
</html>