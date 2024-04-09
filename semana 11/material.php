<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("Location: autenticacionbasica.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>Descarga de materiales de la materia LIS</title>
        <link rel="stylesheet" media="screen" href="css/enlaces.css" />
    </head>

    <body>
        <header>
            <h1>Lenguajes Interpretados en el Servidor</h1>
        </header>
        <section>
            <article>
                <div id="login">
                    <p>
                    </p>
                </div>
                <a href="logout.php">Cerrar sesión</a>
                <h3>Clases</h3>
                <ul class="navi">
                    <li>
                        <a href="https://www.mediafire.com/file/gcsr4gxnagkvigh/Clase_1.pdf/file" target="_blank">
                            Clase 01: Programación web del lado del servidor
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mediafire.com/file/ay8f83c7zdhpwbs/Clase_2.pdf/file" target="_blank">
                            Clase 02: Introducción a la programación y sintaxis de PHP
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mediafire.com/file/kxguq8e4334cbzy/Clase_3.pdf/file" target="_blank">
                            Clase 03: Estructuras de control Sentencias condicionales y repetitivas
                        </a>
                    </li>
                </ul>
                <h3>Guías de práctica</h3>
                <ul class="navi">
                    <li>
                        <a href="https://www.mediafire.com/file/wp816nibkxkijei/UDB_Guía_1_DSS.pdf/file" target="_blank">
                            Guía 01: Introducción a la Programación web con PHP
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mediafire.com/file/1xv44e2sgovqyB/UDB_Guía_2_DSS.pdf/file" target="_blank">
                            Guía 02: Estructuras de Control Sentencias condicionales y repetitivas
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mediafire.com/file/79zp3v5nfmfulki/UDB_Guía_3_DSS.pdf/file" target="_blank">
                            Guía 03: Matrices y funciones en PHP
                        </a>
                    </li>
                </ul>
                <h3>Sitios web</h3>
                <ul class="navi">
                    <li>
                        <a href="http://www.php.net/manual/es" target="_blank">
                            Sitio web oficial de PHP
                        </a>
                    </li>
                    <li>
                        <a href="http://www.manualdephp.com/section/manual-de-php/" target="_blank">
                            Manual de PHP
                        </a>
                    </li>
                </ul>
            </article>
        </section>
    </body>

    </html>
    <?php
}
?>