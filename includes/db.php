<?php

require_once('config.php');

/**
 * Connects to a database with settings defined in the configuration.
 * @return mysqli
 */
function getMainDbConnection() {
    $connection = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);

    if ($connection->connect_error) {
        die('<h1>MYSQL CONNECT FAILED.</h1><p>' . $connection->connect_error . '</p>');
    }

    return $connection;
}