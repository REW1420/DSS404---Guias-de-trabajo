<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector de lenguaje del navegador</title>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <link rel="stylesheet" href="css/idioma.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <h1 class="emboss">Idioma del navegador</h1>
        </header>
        <section>
            <?php
            //mensajes
            
            $spanol = "hola";
            $ingles = "Hello";
            $aleman = "hallo";
            $frances = "bonjour";
            $italiano = "ciao";
            $portugues = "ola";

            //obtener idioma
            $completo = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            //switch
            echo "<p>" . $completo . "<br>";
            echo $idioma . "</p>\n";

            if ($idioma == "es") {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el español: %s </p>\n", $spanol);
            } elseif ($idioma == 'fr') {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el frances: %s </p>\n", $frances);
            } elseif ($idioma == 'en') {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el ingles: %s </p>\n", $ingles);
            } elseif ($idioma == 'fr') {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el frances: %s </p>\n", $aleman);
            } elseif ($idioma == 'it') {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el frances: %s </p>\n", $italiano);
            } elseif ($idioma == 'pt') {
                echo '<p class="msgOff">';
                printf("El lenguaje que se esta utilizando es el frances: %s </p>\n", $portugues);
            } else {
                echo '<p class="msgOff">';
                echo "navegador desconocido";
            }
            ?>
        </section>
    </div>
</body>
<script src="js/modernizr.custom.list.js"></script>
<script src="js/switchclass.js"></script>

</html>