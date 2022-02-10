<?php
    $server = "localhost";
    $user = "root";
    $password = "123";
    $db = "data_try";
    $table = "";

    $conn = new mysqli($server, $user, $password, $db);

    if($conn -> connect_error) {
        die("<br>Connection Failed".$conn -> connect_error);
    }

?>