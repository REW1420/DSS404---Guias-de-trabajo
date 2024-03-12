<?php
require_once("funcioneseditor.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['savefile'])) {
    savefile();
} elseif ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['filename'])) {
    displayeditform();
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['createfile'])) {
    createfile();
} else {
    displayfilelist();
}
?>
