<?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $database = "benessere";

    $connection = @new mysqli($host, $user, $pass, $database);

    if ($connection->connect_errno) {
        die('Connect Error: ' . $connection->connect_errno);
    }

    mysqli_set_charset($connection, "utf8");
?>