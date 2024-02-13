<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <title>Introducción de datos</title>
    <link href="https://cdn.jsdelivr.net/npn/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TnellEoa7RxnatzjcDSCHG1MXXSR1GASXEV/Dwwykc2MPK8H2HN" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5">
            <h2 class="pb-2 border-bottom text-center">
                Equivalencia entre monedas
            </h2>
            <?php

            $conversion = array("aDolares", "aQuetzal", "aLempira", "aCordova", "aColon");
            $precios = array(500, 750, 1000, 1500, 3000, 7500, 12000, 18000, 25000);
            //Funciones para usar como funciones variables
//y hacer la tabla de llamadas que permitirá
//Invocar a las funciones del array con retrollanadas
            
            function aDolares($dato)
            {
                return sprintf("%02.2f", $dato * 0.11425);
            }
            function aQuetzal($dato)
            {
                return sprintf("%02.2f", $dato * 0.87214);
            }
            function aLempira($dato)
            {
                return sprintf("%02.2f", $dato * 2.14132);
            }



            function aCordova($dato)
            {
                return sprintf("%02.2f", $dato * 2.60470);
            }

            function aColon($dato)
            {
                return sprintf("%02.2f", $dato * 58.1205);
            }
            ?>

            <table class="table table-stripped">
                <thead>
                    <tr class="table-success">
                        <th>Colones (sv)</th>
                        <th>Dólares (sv)</th>
                        <th>Quetzales (gt)</th>
                        <th>Lempiras (ho)</th>
                        <th>Córdovas (ni)</th>
                        <th>Colones (cr)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($precios); $i++):
                        ?>

                        <tr>

                            <td>
                                <?php echo $precios[$i]; ?>
                            </td>
                            <?php

                            for ($j = 0; $j < count($conversion); $j++):
                                $resultado = $conversion[$j];
                                switch ($resultado):
                                    case "aDolares":
                                        $signo = "$";
                                        break;
                                    case "aQuetzal":
                                        $signo = "Q";
                                        break;
                                    case "aLempira":
                                        $signo = "L$";
                                        break;
                                    case "aCordova":
                                        $signo = "C$";
                                        break;
                                    case "aColon":
                                        $signo = "&cent;";
                                        break;
                                endswitch;
                                ?>

                                <td class="text-end">
                                    <?php echo $signo . number_format($resultado($precios[$i], 3, "", "")); ?>
                                </td>
                                <?php
                            endfor;
                            ?>

                        </tr>
                        <?php
                    endfor;
                    ?>

                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/nps/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        Integrity="sha384-C6RzsynM9kDrMlleT87bh950GNyZPhcTX1N7RuBCsyl/o@j1pcV8Qyq46cDFL"
        crossorigin="anonymous"></script>
</body>

</html>