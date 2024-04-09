<?php


class Page
{


    public $content;

    private $title;

    private $keywords;

    private $buttons = array();


    public function __construct($title, $keywords, $options)
    {
        $this->title = $title;

        $this->keywords = $keywords;

        if (is_array($options)) {
            foreach ($options as $link => $page) {
                $this->buttons[$link] = $page;
            }
        } else {
            die("Las opciones deben ser pasadas a esta propiedad como una matriz asociativa");
        }
    }

    public function display()
    {
        echo "<!DOCTYPE html>\n";
        echo "<html lang=\"es\">\n<head>\n";
        echo "<meta charset=\"utf-8\">\n";
        $this->displayTitle();
        $this->displayKeywords();
        $this->displayStyles("css/incripcion_css.css");
        echo "\t<link rel=\"stylesheet\" href=\" css/incripcion_css.css\" />\n";

        echo "</head>\n<body>\n";
        $this->displayHeader();
        $this->displayMenu($this->buttons);
        echo $this->content;
        $this->displayFooter();
        echo "</body>\n</html>";
    }

    public function displayTitle()
    {
        echo "\t<title>" . $this->title . "</title>\n";
    }

    public function displayKeywords()
    {
        echo "<meta name=\"keywords\" content=\"" . $this->keywords . "\" />\n";
    }

    public function displayStyles($styles)
    {

        $pattern = "%\.{1}(css)$%i";
        $styles = "";
        if (is_array($styles)) {
            foreach ($styles as $cssfile) {
                if (preg_match($pattern, $cssfile) && is_file($cssfile)) {
                    $styles .= "\t<link rel=\"stylesheet\" href=\"" . $cssfile . "\" />\n";
                }
            }
        } else {
            if (empty($styles)) {
                if (preg_match($pattern, $styles) && is_file($styles)) {
                    $styles .= "\t<link rel=\"stylesheet\" href=\"" . $styles . "\" />\n";
                }
            }
        }
        echo $styles;
    }

    public function displayScripts($scripts)
    {

        $pattern = "%\.{1}(js)$%i";
        $scriptsjs = "";
        if (is_array($scripts)) {
            foreach ($scripts as $scriptfile) {
                if (preg_match($pattern, $scriptfile) && is_file($scriptfile)) {
                    $scriptsjs .= "\t<script src=\"" . $scriptfile . "\"></script>\n";
                }
            }
        } else {
            if (empty($scripts)) {
                if (preg_match($pattern, $scripts) && is_file($scripts)) {
                    $scriptsjs .= "\t<script src=\"" . $scripts . "\"></script>\n";
                }
            }
        }
        echo $scriptsjs;
    }

    public function displayHeader()
    {
        $header = <<<HEADER
        <section>
            <article>
                <div id="encabezado"></div>
                <div id="contenedor">
HEADER;
        echo $header;
    }

    public function displayMenu($menuoptions)
    {
        ?>
        <div class="rediv" id="slidebar">
            <div class="rediv" id="slidebart">
                Menu Principal
            </div>
            <?php
            $menu = "<ul id=\"mainmenu\">\n";

            $width = 116 / count($menuoptions);
            reset($menuoptions);


            for ($i = 0; $i < count($menuoptions); $i++) {
                $url = key($menuoptions);
                $name = current($menuoptions);
                echo "\t\t\t<li>\n";
                echo $this->displayButton($width, $name, $url, !$this->isURLCurrentPage($url));
                echo "\t\t\t</li>\n";
                next($menuoptions);
            }
            $menu .= "\t\t\t</ul>\n";
            echo $menu;


            ?>
            <div id="slidebar2" class="rediv">
                <div class="rediv" id="slidebart">

                    Datos Importantes
                </div>
                <p>
                    <strong>Horarios de Atencion</strong><br><br>
                    <u>Colecturia</u>
                    <strong>Lunas a Viernes: </strong><br><br>
                    7:00 am a 5:30 pm <br>
                    Sin cerrar al medio dia <br><br>
                    <strong>Sabado: </strong><br>
                    8:00 am a 12:00 am <br>
                    <u>Gestion Social y <br>
                        Administracion Academica</u><br>
                    <strong>Lunas a viernes: </strong>
                    7:00 am a 12: 00 m <br>
                    1:00pm a 5:30 pm <br>
                    <strong>Sabado: </strong><br>
                    8:00 am a 12:00 m <br>
                    <strong>PBX:</strong> (503) 2251-8200.

                </p>
            </div>
            <?php
    }

    public function isURLCurrentPage($url)
    {
        if (strpos($_SERVER['PHP_SELF'], $url) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function displayButton($width, $name, $url, $active = true)
    {
        $button = "";
        if ($active) {
            $button .= "\t\t\t\t\t<a href=\"" . $url . "\">\n";
            $button .= "\t\t\t\t\t\t<span class=\"menu\">" . $name . "</span>\n";
            $button .= "\t\t\t\t\t</a>\n";
        } else {
            $button .= "\t\t\t\t\t<span class=\"menu\">" . $name . "</span>\n";
        }
        return $button;
    }

    public function displayFooter()
    {
        $footer = <<<FOOT
        <footer>
            <p>
                UDE 2015. Derechos Reservados &copy; cor
                Calle Plan del Pino Km 1 1/2, Ciudadela Don Bosco, Soyapango,
                San Salvador, C.Arbe
                Tel. (503)22518200<br />
                <strong>
                    <a href="http://www.udb.edu.sv" target="_blank">http://www.udb.edu.sv</a>
                </strong>
            </p>
        </footer>
        </article>
        </section>
FOOT;
        echo $footer;
    }
}
?>