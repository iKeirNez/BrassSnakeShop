<?php

/**
 * Connects to a database with settings defined in a config file.
 * Each setting should be declared on a new line in the format:
 *
 * <host>
 * <port>
 * <database>
 * <username>
 * <password>
 *
 * Null values can be defined using: #NULL#
 *
 * @param SplFileObject $configFile
 * @return mysqli
 */
function getDbConnection($configFile) {
    $host = parseValue($configFile->fgets());
    $port = parseValue($configFile->fgets());
    $database = parseValue($configFile->fgets());
    $username = parseValue($configFile->fgets());
    $password = parseValue($configFile->fgets());

    $connection = new mysqli($host, $username, $password, $database, $port);

    if ($connection->connect_error) {
        die('<h1>MYSQL CONNECT FAILED.</h1><p>' . $connection->connect_error . '</p>');
    }

    return $connection;
}