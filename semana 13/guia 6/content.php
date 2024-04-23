<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "prensa";

$cn = new mysqli($host, $user, $pass, $db);
if ($cn->connect_errno) {
    printf("Falló la conexión: %s\n", $cn->connect_error);
    exit(0);
}
$cn->set_charset("utf8");
$tipo = isset($_GET['content']) ? $_GET['content'] : 0;
if ($tipo != 0) {
    $qr = "SELECT titulonoticia, textonoticia, imgnoticia FROM noticia ";
    $qr .= "WHERE idnota = $tipo";
    $rs = $cn->query($qr);
    $info = '';
    while ($row = $rs->fetch_object()) {
        $info .= "<div id=\"titulo\">\n<h2>{$row->titulonoticia}</h2>\n</div>\n";
        $info .= "<div id=\"texto\">\n<p>\n{$row->textonoticia}\n";
        $info .= "<img src=\"{$row->imgnoticia}\" />\n";
        $info .= "</p>\n</div>\n";
    }
    echo $info;
}
?>