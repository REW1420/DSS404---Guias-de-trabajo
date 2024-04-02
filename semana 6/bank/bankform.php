<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas de ahorro</title>
    <link rel="stylesheet" href="/css/table.css">
    <link rel="stylesheet" href="/css/formoid-flat-green.css">
    <link rel="stylesheet" href="/css/stylees.css">
    <script src="js/jquery.min.js"></script>
</head>

<body>
    <section>
        <article>
            <form method="post" name="operacioes" action="<?php echo $_SERVER['PHP_SELF'] ?>"
                class="formoid-flat-green">
                <div class="title">
                    <h2>Operaciones bancarias</h2>
                </div>
                <div class="element-input">
                    <label class="title">
                        Nommbre : <span class="required">*</span>
                    </label>
                    <input type="text" name="nombre" maxlength="40" required class="large">
                </div>

                <div class="element-input">
                    <label class="title">
                        Cantidad : <span class="required">*</span>
                    </label>
                    <input type="text" name="cantidad" maxlength="10" required class="large">
                </div>

                <div class="element-radio">
                    <label class="title">Operaciones: </label>
                    <div class="column column1">
                        <label>
                            <input checked type="radio" name="operacion" id="apertura">
                            <span>Apertura</span>
                        </label>
                    </div>

                    <div class="column column1">
                        <label>
                            <input type="radio" name="operacion" id="deposito">
                            <span>Deposito</span>
                        </label>
                    </div>

                    <div class="column column1">
                        <label>
                            <input type="radio" name="operacion" id="retiro">
                            <span>Retiro</span>
                        </label>
                    </div>
                </div>

                <div class="submit">
                    <input name="restablecer" type="button" value="Cancelar">
                    <input type="submit" value="Enviar" name="enviar">
                </div>

            </form>

            <?php
            if (!function_exists('classAutoLoader')) {
                function classAutoLoader($classname)
                {
                    $classname = strtolower($classname);
                    $classfile = 'class/' . $classname . '.class.php';
                    if (is_file($classfile) && !class_exists($classname))
                        include $classfile;


                }

            }
            spl_autoload_register('classAutoLoader');

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['enviar'])) {
                $msg = "";
                $titular = isset ($_POST['nombre']) ? $_POST["nombre"] : "";

                if ($titular == "") {
                    $msg = "<h3> El nombre de la cuenta no puede estar vacio </h3><br />";
                }

                $cantidad = isset ($_POST['cantidad']) && is_numeric($_POST["cantidad"]) ? $_POST["cantidad"] : 0;

                if ($cantidad == 0 || $cantidad < 0) {
                    $msg = "<h3> La cantidad no puede ser negativa ni cero </h3><br />";
                }

                if ($msg != '') {
                    echo $msg;
                    echo "<a href=\"{$_SERVER['PHP_SELF']}\"> Volver al formulario</a><br/>";
                    exit (0);
                }
                $operacion = isset ($_POST['operacion']) ? $_POST['operacion'] : null;

                $nuevacuenta = new bankAccount();

                switch ($operacion) {
                    case 'apertura':
                        $nuevacuenta->openAccount($titular, $operacion, $cantidad);
                        break;
                    case 'deposito':
                        $nuevacuenta->makeDeposit($cantidad, $operacion);
                        break;
                    case 'retiro':
                        $nuevacuenta->makeWithdrawal($cantidad, $operacion, 500.00);
                        break;
                    default:
                        echo "<p>No se a selecionado ninguna operacion</p>";
                        exit();
                }


            }

            ?>

        </article>
    </section>
</body>
<script src="js/formoid-flat-green.js"></script>

</html>