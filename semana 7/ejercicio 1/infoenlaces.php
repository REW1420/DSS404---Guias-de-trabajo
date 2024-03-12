<!DOCTYPE html>
chtel lang="es">
chead>
<meta charset="utf-8" />
<title>Listado de enlaces</title>
</head>
<link rel="stylesheet" href="/css/niko.css" />

<body>
    cheader id="vintage">
    <h1>Enlaces registrados</h1>
    </header>
    <section>
        <article>
            <table>
                <caption>Información de los enlaces</caption>
                <thead>
                    <tr>
                        <th>Texto del enlace</th>
                        <th>Enlace</th>
                        <th>Nivel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] = "POST") {
                        include_once("ponercampo.php");
                        if (!file_exists("files")):
                            if (!mkdir("files", 0700)):
                                die("ERROR: No se puede crear el directorio.");
                            endif;
                        endif;

                        define("ENLACES", "files/enlacescsv.txt");
                        $archivo = fopen(ENLACES, 'a') or die("Error al intentar abrir archivo" . ENLACES);
                        //Se genera un array con una posición por cada campo
                        $valores = array($_POST["dominio"], $_POST["enlace"], $_POST["nivel"]);
                        $escritos = fputcsv($archivo, $valores, ",");
                        //Se cierra el archivo para que los datos queden guardados
                        fclose($archivo);
                        //Se abre el archivo para leer los datos de los productos
                        $archivo = fopen(ENLACES, 'r');
                        $fila = 0;
                        //Inicializar variable para llevar el control del número de fila Sfila 0;
//Se recorre el archivo para mostrar el nuevo contenido
                    
                        while (!feof($archivo)) {
                            $buffer = fgetcsv($archivo, 4096, ",");

                            if (is_array($buffer) && $buffer[0] != null) {
                                if ($fila % 2 != 0):
                                    echo "<tr>\n";
                                else:
                                    echo "<tr class=\"odd\">\n";
                                endif;
                                ponercampo($buffer[0]);
                                ponercampo($buffer[1]);
                                ponercampo($buffer[2]);
                                echo "</tr>\n";
                                $fila++;
                            }
                        }
                    } else {
                        echo "\t\t\t<tr>\n";
                        echo "\t\t\t\t<td colspan=\"3\">Error. No se puede acceder de forma directa a este programa.</td>";
                        echo "\t\t\t</tr>\n";
                    }
                    ?>
                </tbody>
            </table>
            <a class="a-btn" title="Regresar" href="nuevocsv.html">
                <span class="a-btn-symbol">#</span>
                <span class="a-btn-text">Ingresar</span>
                <span class="a-btn-slide-text">nuevo enlace</span>
            </a>
        </article>
    </section>
</body>
<script src="js/modernizr.custom.lis.js"></script>

</html>