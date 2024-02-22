<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de fechas</title>
    <link rel="stylesheet" href="css/styles4.css">
</head>

<body>
    <?php
    $newdate = $newtime = "";
    //Verificando que se ha dado un envio de formulario por POST
    if ($_SERVER['REQUEST METHOD'] = "POST" && isset($_POST["send"])) {
        foreach ($_POST as $field => $value) {
            switch ($field) {
                case "fecha":

                    $value = date("d/F/V", strtotime($value)); //Observe que en el partrón de la expresión regular
                    $regex = "#(\d{2})/(\w(3,10))/(\d{4})#";
                    $newdate = preg_replace($regex, "Tienes cita para el $1 de $2 del $3", $value);
                    break;
                case "hora":
                    $regex = "#^(\d{2}):(\d{2})$#";
                    $newtime = preg_replace(
                        $regex,
                        "A las $1 hora(s) con $2 segundo(s).",
                        $value
                    );
                    break;
            }
        }

        $link = <<<LNK
<p> $newdate. $newtime</p>
<div class="frame">
<div class="button">
<a href="{$_SERVER['PHP_SELF']} title="Otra cita">
<span>Otra cita</span>
<svg>
<polyline class="ol" points"80, 1500, 150 55, 55, 8
@"></polyline>
<polyline class="02" points="0 0, 150 0, 150 55, 055, 0
0"></polyline>
</svg>
</a>
</div>
</div>
LNK;
        echo $link;
    } else {
        ?>
        <section class="form">
            <h1>Realiza tu cita</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="date">Selecciona la fecha deseada:</label>
                <input type="date" name="fecha" id="date" min="2024-03-01" step="1" value="2024-02-19"><br>

                <label for="time">Seleciona la hora deseada:</label>
                <input type="time" name="hora" id="time" min="07:00" max="20:00" value="17:30"><br>
                <input type="submit" name="send" id="Enviar" class="btn btn-primary btnclock btn-large">
            </form>
            </article>

        </section>
    <?php } ?>
</body>

</html>