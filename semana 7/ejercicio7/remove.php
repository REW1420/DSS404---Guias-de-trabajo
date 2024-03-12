<?php

$filename = $_GET['name'];
$filePath = 'uploads/' . $filename;

if (file_exists($filePath)) {
    unlink($filePath);
    header("Location: index.php");
}
