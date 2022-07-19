<?php

    function database_connect()
    {
        $hostName = "localhost";
        $dbUsername = "root";
        $dbPassword = NULL;
        $dbName = "bingo";

        $connection_link = @mysqli_connect($hostName, $dbUsername, $dbPassword, $dbName) or die("DataBase Connection Error!");

        return $connection_link;
    }

    $connect = database_connect();
?>