<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Ciudades de destino</title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Bitter" />
<link rel="stylesheet" href="css/fields.css" />
</head>
<body>
<header>
<h1 class="inset">Ciudades de destino</h1>
</header>
<section>
<div class="form-style">
<?php
//La función espera una matriz con una lista (Slista)
//ya sea de países o ciudades y un parámetro opcional
////con el tipo de lista que tendrá un valor por defecto "ul" 
function createList($lista, $tipo = "ul")
{
    //Inicializando variables para ambos tipos de listas HTML
    $ullist = "";
    $ollist = "";
    switch ($tipo):
        case "ul":
            $ullist .= "<article id=\"countries\">\n";
            $ullist .= "\t<h1>\n";
            $ullist .= "\t\tPaíses y ciudades\n";
            $ullist .= "\t\t<span>seleccionadas</span>\n";
            $ullist .= "\t</h2>\n";
            $ullist .= "\t<ul class=\"imglist\">\n";

            foreach ($lista as $key => $value):
                $ullist .= "\t\t<li><a href=\"javascript:void(0)\">$key=>$value</a></li>\n";
            endforeach;

            $ullist .= "\t</ul>\n";
            $ullist .= "</article>\n";
            print $ullist;
            break;

        case "ol":
            $ollist .= "<article id=\"cities\">\n";
            $ollist .= "\t<h1><span>Ciudades</span></h1>\n";
            $ollist .= "\t<div class=\"numberlist\">\n";
            $ollist .= "\t\t<ol>\n";
            foreach ($lista as $key => $value):
                $ollist .= "\t\t\t<li><a href=\"javascript:void(0)\">$key=>$value</a></li>\n";
            endforeach;
            $ollist .= "\t\t</ol>\n";
            $ollist .= "\t</div>\n";
            $ollist .= "</article>";
            print $ollist;
            break;
        default:
            print "<p>No está definido este tipo de lista</p>";
            break;
    endswitch;
}
//Inicia el procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] = 'POST'):
    //Análisis de los elementos de campo select
    if (is_array($_POST['location'])):
        //Si se tiene una matriz invocar a la función
//createlist para crear la lista UL
    else:
        createlist($_POST['location']);
        echo "Se esperaba una lista, no un valor escalar.";
        exit(0);
    endif;
    //Análisis de los elementos checkbox
    extract($_POST);
    if (is_array($place)):
    else:
        createlist($place, "ol");
    endif;
    print "<p>El procesamiento del formulario requiere que se hayan enviado datos desde el formulario.</p>";
    $refererpage = isset($_SERVER['HTTP_REFERRER']) ? $_SERVER['HTTP_REFERRER'] : "index.html";
    print "<a href=\"$refererpage\">Regresar</a>";
    exit(0);
endif;
?>
</div>
</section>
</body>
</html>