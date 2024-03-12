<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Registrar usuarios en libro de visitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/responsive.css" />
    <style type="text/css">
        @import url(jscalendar/calendar-blue2.css);
    </style>
    <script src="js/actions.js"></script>
    <script src="jscalendar/calendar.js"></script>
    <script src="jscalendar/lang/calendar-es.js"></script>
    <script src="jscalendar/calendar-setup.js"></script>
</head>
<body>
<?php
// Implementación de la clase classAutoloader
if (!function_exists('classAutoLoader')) {
    function classAutoLoader($classname)
    {
        $classname = strtolower($classname);
        $classFile = $classname . ".class.php";
        if (is_file($classFile) && !class_exists($classname)) {
            include $classFile;
        }
    }
    // Registrando la clase classAutoloader
    spl_autoload_register('classAutoLoader');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Obtener los datos del formulario sin procesamiento
    // Algo que solo haremos por motivos de demostración
    extract($_POST);
    $entry = new guestBook();
    $entry->setName($yourname);
    $entry->setAddress($youraddress);
    $entry->setPhone($yourphone);
    $entry->setBirthday($yourbirthday);
    $entry->setFile($yourfile);
    $entry->showGuest();
    $entry->saveGuest();
} else {
    ?>
                <section id="container">
                    <h2>Ingreso de datos</h2>
                    <form name="hongkiat" id="hongkiat-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div id="wrapping" class="clearfix">
                            <section id="aligned">
                                <input type="text" name="yourname" id="yourname" placeholder="(Tu nombre)" autocomplete="off" maxlength="40" tabindex="1" class="txtinput" />
                                <input type="text" name="youraddress" id="youraddress" placeholder="(Tu dirección)" autocomplete="off" maxlength="60" tabindex="2" class="txtinput" />
                                <input type="tel" name="yourphone" id="yourphone" placeholder="(Tu número de teléfono)" tabindex="4" maxlength="14" class="txtinput" />
                                <input type="hidden" name="yourfile" id="yourfile" value="guestbook.txt"/>
                            </section>
                            <section id="aside" class="clearfix">
                                <section id="recipientcase">
                                    <h3>Fecha de nacimiento:</h3>
                                    <input type="date" name="yourbirthday" id="yourbirthday" placeholder="(Tu fecha de nacimiento)" class="txtdate" />
                                    <img src="jscalendar/image.png" id="imgcalendar" style="cursor: pointer; border: 1px solid red; display: inline-block;" title="Ingrese la fecha" /><br />
                                    <script>
                                        Calendar.setup({
                                            inputField: "yourbirthday", // ID of the input field
                                            ifFormat: "%Y-%m-%d", // the date format
                                            button: "imgcalendar", // ID of the button
                                            singleClick: true
                                        });
                                    </script>
                                </section>
                            </section>
                        </div>
                        <section id="buttons">
                            <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Restaurar" />
                            <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Guardar" />
                            <br style="clear:both;">
                        </section>
                    </form>
                </section>
                <?php
}
?>
</body>
</html>
