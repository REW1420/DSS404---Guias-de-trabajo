<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con archivos</title>
    <link rel="stylesheet" href="/css/filemanager.css">
    <link rel="stylesheet" href="/css/demo.css">
    <link rel="stylesheet" href="/css/component.css">
</head>

<body>
    <header>
        <h1>
            <?php
            error_reporting(E_ALL & ~E_NOTICE);
            if (!empty($_GET['directorio']) && $_GET['directorio'] !== null):
                echo basename($_GET['directorio']);
                $valor_directorio = rawurldecode($_GET['directorio']);
            endif;
            ?>
        </h1>
    </header>
    <section>

        <article>
            <?php

            $form = "<form method=\"POST\" action=\"";
            $form .= "operacion.php?operacion=3&directorio=" . $valor_directorio . "\"class=\"ccform\">\n\t\t\t";

            echo $form;
            ?>

            <div class="ccfield-prepend">
                <input type="image" name="borrar" id="borrar" src="/img/delete-file.gif" alt="Borrar archivo"
                    class="ccimagufield" />
                <label for="borrar">Borrar</label>
            </div>
            </form>
            <?php

            $form = "<form method=\"POST\" action=\"";
            $form .= "operacion.php?operacion=4&directorio=" . $valor_directorio . "\"class=\"ccform\">\n\t\t\t";
            echo $form;
            ?>
            <div class="ccfield-prepend">
                <span class="ccform-addon">
                    <i class="fa fa-user fa-2x fa-spin"></i>
                </span>
                <input type="text" name="destino" id="destino" placeholder="Nostire de la copia required class="
                    ccformfield" /> input type="image" name="copiar id copiar srce ing/copyfile.jog" alt="Coplar
                archive" class="ccimagefield"
                <label for="copiar">Copiar</label>
            </div>
            </form>
            <?php
            $form = "<form method=\"POST\" action=\"";
            $form .= "operacion.php?operacion=5&directorio=" . $valor_directorio . "\"class=\"ccform\">\n\t\t\t";
            echo $form;

            ?>

            <div class="ccfield-prepend">
                <span class="ccform-addon">
                    <i class="fa fa-envelope fa-2x"></i>
                </span>
                <input type="text" name="nuevo nombre de nuevo nombre placeholder=" Nuevo nombre required
                    class="ccforefield" />
                <input type="image" name="rencebrar 10 renombrar" src="img/renamefile.png" alt="Hencebrar archivo"
                    class="ccinagefield" />
                <label for="renombrarenombrar">renombrar</label>
            </div>
            </form>
            <?php
            $form = "<form method=\"POST\" action=\"";

            $form .= "administrador.php?directorio=" .
                rawurlencode(dirname($_GET['directorio'])) . "\">\t\t\t";
            echo $form;
            ?>
            <div class="ccfield-prepend">
                <input type="submit" name="volver" value="Volver al directorio" class="ccbtn" />
            </div>
            </form>
        </article>
    </section>
</body>
<script src="js/modernizr.custom.lis.js"></script>

</html>