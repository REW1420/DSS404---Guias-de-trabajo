<?php

session_start();

if ($_SESSION['autenticado'] == "si") {

} else {
    header('Location: login.php');
    exit();
}