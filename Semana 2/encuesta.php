<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <link rel="stylesheet" href="css/encuesta.css">
    <link rel="stylesheet" href="css/cd-dropdown-menu.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/links.css">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/prefixfree,min.js"></script>


</head>
<body>
    <header>
        <h1 class="extruded">Favor responser la pregunta</h1>
    </header>
    <section>
        <article>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'):
                $contact = $_POST["contacto"];

                switch ($contact):
                    case "client":
                        echo "<p>Cliente que visita constantemente el sitio";
                        break;
                    case "television":
                        echo "<p>Cliente referido por anuncio de television";
                        break;
                    case "phonebook":
                        echo "<p>Cliente referido por gui telefonica";
                        break;
                    case "social":
                        echo "<p>Cliente referido por anuncio redes sociales";
                        break;
                    case "friend":
                        echo "<p>Cliente referido por un amigo";
                        break;
                    default:
                        echo "<p>No se puede especificar como el cliente contacto el sitio web</p>";

                endswitch;

                $link = "<a href=\"" . $_SERVER['PHP_SELF'] . "\" class=\"a-btn\">";
                $link = "\t<span class=\"a-btn-symbol\">i</span>";
                $link = "\t<span class=\"a-btn-text\">Volver</span> ";
                $link = "\t<span class=\"a-btn-slide-text\">al formulario</span> ";
                $link = "\t<span class=\"a-btn-slide-icon\">Volver</span> ";
                $link = "</a> ";

            else:
                ?>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <select name="contacto" id="cd-dropdown" class="cd-select">
                            <option value="-1" selected>(Seleccione una opción)</option>
                            <option value="client" class="icon-chrome">Soy cliente frecuente</option>
                            <option value="television" class="icon-safari">Publicidad por television</option>
                            <option value="phonebook" class="icon-IE">Directorio telefonico</option>
                            <option value="social" class="icon-firefox">A travez de redes sociales</option>
                            <option value="frined" class="icon-opera">Por sugerencia de amigo(s)</option>
                        </select>
                        <input type="submit" value="Enviar" class="styled-button" id="enviar" name="enviar"/>
                </form>

                    <?php
            endif; ?>
        </article>
    </section>
</body>
</html>