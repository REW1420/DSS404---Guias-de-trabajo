<?php

include 'database_connection.php';

if (isset($_POST['poll_option'])) {
    $query = "insert into tbl_poll (php_framework) values (:php_framework)";
    $data = array(
        ":php_framework" => $_POST['poll_option']
    );
    $statement = $connect->prepare($query);
    $statement->execute($data);
}