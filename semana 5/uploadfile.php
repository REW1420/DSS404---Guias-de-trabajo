<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale-1.0" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon/family-Material+Icons" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/materialize.css" />
</head>

<body>
    <section>
        <article>
            <div class="row">
                <h1 class="title-form"> Adjuntar un archivo de imagens</h1>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] = "POST" && isset($_POST['send'])):
                        require_once("comprobarimagen.php");
                        $archivos = array();

                        if (!empty($_FILES['files']['name'][0])):
                            $list = "<ol class=\"list-files\">\n";

                            foreach ($_FILES['files']['name'] as $i => $archivo):
                                $archivos[$i] = $archivo;
                                $list .= "<li>\n<a href=\"#\">" . $archivos[$i] . comprobarimagen($archivos[$i]) . "</a>\n\t</li>\n";
                            endforeach;
                            $list .= "</ol>\n";
                            echo $list;
                        else:
                            echo "<p>No hay archivo(s) seleccionado(s)</p>";
                            exit(0);
                        endif;

                    else:
                        ?>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"
                            class="col $12">

                            <div class="row col s12">
                                <div class="file-field input-field col s8">
                                    <div class="btn">
                                        <span>Adjuntar</span>
                                        <input type="hidden" name="MAX FILE SIZE" value="2097152" />
                                        <input type="file" name="files[]" multiples="multiple" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input type="text" class="file-path validate"
                                            placeholder="Seleccione sólo archivos de imagen" />
                                    </div>
                                </div>

                                <div class="row col s4">
                                    <button type="submit" class="btn waves-effect waves-light" name="send">Enviar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                    endif;
                    ?>
            </div>
        </article>
    </section>
</body>
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>

</html>