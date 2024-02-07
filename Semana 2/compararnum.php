<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de palabras</title>
    <link rel="stylesheet" href="http://fonst.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/formstyle2.css">
    <script src="js/prefixfree.min.js"></script>
</head>
<body>
    <header>
        <h1>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                ?>
                                <?php $num1 = isset($_POST['numero1']) ? $_POST['numero1'] : 0 ?>
                                <?php $num2 = isset($_POST['numero2']) ? $_POST['numero2'] : 0 ?>
                                <?php $num3 = isset($_POST['numero3']) ? $_POST['numero3'] : 0 ?>
                                <?php
                                if ($num1 == 0 || $num2 == 0 || $num3 == 0) {
                                    echo 'Todos los numeros son requeridos';
                                    exit();
                                }

            }
            ?>
        </h1>
    </header>
    <section>
        <article>
            <p class="msg">
                <?php
                $elmayor = ($num1 > $num2) ? $num1 : $num3;
                $elmayor = ($elmayor > $num3) ? $elmayor : $num3;
                printf("El resultado de comparar %d, con %d y %d es: ", $num1, $num2, $num3);
                printf("El numero mayor es : %d", $elmayor);
                ?>

            </p>
        </article>
    </section>
</body>
</html>