<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" <title>Ejercicio de Expresiones Regulares
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap(5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6Coli6uLr49TneNEoa7RxnatzjcDSC=G1MXxSRIGASXEV/Dwwykc2MPKBH2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <nav class="navbar navbar-expand-ig navbar-dark bg-dark" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Uso de expresiones regulares</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-es-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark tabindex=" -1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class offcanvas-title" id="offcanvastiavbar2Label">Uso de expresiones regulares</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-disniss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    </ul>
                    <form class="d-flex nt-3 mt-lg- justify-content-end" role="search"
                        action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" name="frm" id="frm">

                        <input class="form-control me-2" type="text" name="url" id="url"
                            value="https://www.wikipedia.org/" required> <button class="btn btn-outline-success"
                            type="submit" name="Enviar" id="Enviar">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <main class="container py-4">
        <h2 class="border-bottom">Listar enlaces de una webc/h2> <p>El siguiente ejemplo muestra como listar los enlaces
                de una web determinada mediante su direccion web, haciendo
                uso de coincidencias en base a expresiones regulares.</p>
            <p>Para comenzar ingrese una url en la caja de texto
                superior derecha, el proceso puede tardar dependiendo de la cantidad de enlaces encontrados.</p>
            <?php
            if (isset($_POST['Enviar'])) {
                procesarForm();
            } else {
                echo '<div style="height: 300px;"></div>';
            }
            function procesarForm()
            {
                require_once("getremotefile.php");
                $url = isset($_POST['url']) ? $_POST["url"] : null;


                if (!preg_match('|^http(s)?\://|', $url)) {
                    $url = "https://$url";
                }

                $html = getRemoteFile($url);
                preg_match_all("/<a\s*href=['\"](.+?)['\"].*?>/i", $html, $matches);
                echo "tiv style='clear:both'></div>";

                echo "<h2 class=\"border-bottom\">Enlaces encontrados en" . htmlspecialchars($url) . "</h2>";
                echo "<ul>";

                for ($i = 0; $i < count($matches[1]); $i++) {
                    echo "<li>" . htmlspecialchars($matches[1][$i]) . "</li>";
                }
                echo "</ul>";

            }
            ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap(5.3.2/dist/js/bootstrap.bundle.min.js"
        Integrity="sha384-C6Rzsyne T87bh9506NyZPhcTNXj1N7RuBCsyN/o@j1pcV8Qyq46cDfL crossorigin anonymous"></script>
</body>

</html>