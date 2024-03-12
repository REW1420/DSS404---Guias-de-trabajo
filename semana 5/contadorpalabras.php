<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expresiones regulares reemplazo en textos</title>
    
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <main class="container py-4">
        <form method="POST "action="<?php echo $_SERVER['PHP_SELF'] ?>" >
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Contador de palabras</h3>
                </div>
                <div class="card-body">
                    <label for="mensaje" class="form-label">Este texto puede ser de prueba</label>
                </div>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="9"></textarea>
                <div class="card-footer">
                    <input type="submit" name="submit" class="btn btn-success" value="Enviar" />
                </div>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] = "POST" && isset($_POST['Enviar'])) {
            require "wordcount.php";
            $texto = !empty($_POST["mensaje"]) ? trim($_POST["mensaje"]) : "";

            if (strlen($texto) == 0) {
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Ambos campos son obligatorios.<br/><a href="' . $_SERVER['PHP_SELF'] . '" class="alert-link">Volver al formulario</a>';
                echo '</div>';
                exit();
            }
            $textolimpio = wordcount($texto);
            $complemento = count($textolimpio) > 1 ? "palabras" : "palabra";
            echo '<div class="alert alert-info" role="alert">';
            echo 'Se han contabilizado:' . count($textolimpio) . ' ' . $complemento . '<br/>';
            echo '</div>';
        }

        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh950GNyZPhcTNXj1NW7RuBCsyN/o@jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>