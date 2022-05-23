<?php

/**
 * Gets the database connection
 *
 *
 * @return object connection to mySQL server
 *
 * @throws error if connection fails
 **/
function getDB()
{
    $db_host = "localhost";
    $db_name = "dfasms";
    $db_user = "root";
    $db_pass = "";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    return $conn;
}