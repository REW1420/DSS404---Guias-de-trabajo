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
spl_autoload_register('contacto');
$contactpage = new page();

$contactpage->content = <<<PAGE
<!-- contact content -->
<div id="topcontent">
<div id="textbox">
<div id="title">
<h2>CONTACTO</h2>
</div>
<div id="paragraph">
<h4>Números de atención:</h4>
<p>
Universidad Don Bosco.<br />
Tel. (503)2251-8200.
</p>
<p>
Administración Académica.<br />
Tel. (503)2251-8200 ext. 1710.
</p>
<p>
Administración Financiera.<br />
Tel. (503)2251-8200 ext. 1700.
</p>
<p>
Nuevo Ingreso.<br />
Tel. (503)2527-2314.
</p>
</div>
</div>
<div id="picture">
<img src="/img/entradapostgrados.jpg" alt="Imagen de portada" width="800" height="370" longdesc="Imagen de portada" />
</div>
</div>
PAGE;
echo $contactpage->display();
?>