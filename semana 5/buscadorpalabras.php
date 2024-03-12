<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de expresiones regulares</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de <span>expresiones regulares</span></h1>
        </header>

        <div id="contents">
            <section id="main">
                <div class="leftcontainer">
                    <h2>Buscador de palabras</h2>
                    <section id="sidebar">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enviar'])) {
                            $text = isset($_POST['comment']) ? trim($_POST['comment']) : null;
                            $palabra = isset($_POST['palabra']) ? trim($_POST['palabra']) : null;

                            // Buscar todas las coincidencias de la palabra en el texto
                            preg_match_all("/\b(" . $palabra . ")\b/i", $text, $matches);
                            $cantidad_coincidencias = count($matches[0]);

                            // Resaltar las coincidencias en el texto
                            $text_resaltado = preg_replace("/\b(" . $palabra . ")\b/i", '<span style="background:#cd3">\1</span>', $text);
                            ?>
                            <div id="sidebarwrap">
                                <h2>Resultados</h2>
                                <h2>Cantidad de palabras <?php echo $cantidad_coincidencias; ?> </h2>
                                <p>
                                    <?php echo $text_resaltado; ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </section>
                    <div class="clear"></div>

                    <article class="post">
                        <form method="POST" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <p class="textfiel">
                                <label for="palabra">
                                    <small>Palabra a buscar</small>
                                </label>
                                <input type="text" name="palabra" id="palabra" value="tierra" size="22" tabindex="1" />
                            </p>
                            <p>
                                <small>Ingrese el texto de prueba para procesarlo con las <strong>expresiones
                                        regulares</strong></small>
                            </p>
                            <p class="text-area">
                                <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">
                                PHP es, hoy en día, un lenguaje de programación diseñado para desarrollar páginas web
dinámicas que son ejecutadas en un servidor web y, luego, devueltas en formato HTML al
navegador del usuario que las solicita. No obstante, en sus principios PHP fue más bien un
lenguaje de secuencias de comando, guiones o scripts del lado del servidor desarrollado por
Rasmus Lerdorf en 1995 con el propósito de crear un conjunto de scripts que le permitieran
contabilizar el número de visitantes que accedían a su hoja de vida que había puesto en línea
para conseguir empleo o contratos de trabajo. Debido a que PHP estaba diseñado para
trabajar en un ambiente web y que este se podía insertar directamente dentro del código
(X)HTML propició que se volviera muy popular para procesar datos ingresados a través de
formularios
                        </textarea>
                            </p>
                            <p>
                                <input name="Enviar" id="Enviar" value="1" type="hidden" />
                                <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png" />
                            </p>
                            <div id="clear"></div>
                        </form>
                        <div id="clear"></div>
                    </article>
                </div>
            </section>
            <div id="clear"></div>
        </div>

    </div>
    <footer id="pahgefooter">
        <div id="footerwrap"></div>
    </footer>
</body>

</html>