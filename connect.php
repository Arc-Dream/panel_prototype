<?php
    $server = "localhost";
    $user = "root";
    $password = "123";
    $db = "data_try";
    $table = "heimir_data";
    $deleted_table = "heimir_data_deleted";

    $conn = new mysqli($server, $user, $password, $db);

    if($conn -> connect_error) {
        die("<br>Connection Failed".$conn -> connect_error);
    }

?>