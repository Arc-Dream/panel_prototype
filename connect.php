<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "db_name";
    $table = "table_name";
    $deleted_table = "table_deleted";

    $conn = new mysqli($server, $user, $password, $db);

    if($conn -> connect_error) {
        die("<br>Connection Failed".$conn -> connect_error);
    }

?>
