<?php

require_once('db.php');

/**
 * Checks if a variable is empty and if so, displays an error message.
 *
 * @param $var
 * @param string $message
 */
function checkInputVar($var, $message) {
    if (empty($var)) {
        die($message);
    }
}

/**
 * Checks if a row exists with a column matching the search criteria.
 *
 * @param mysqli $mysqli
 * @param string $column
 * @param string $type mysql value type, for example 'i' for integer
 * @param object $value
 * @return bool
 */
function checkRowExists($mysqli, $column, $type, $value) {
    $statement = $mysqli->prepare('SELECT COUNT(*) AS total FROM users WHERE ' . $column . ' = ?;');
    $statement->bind_param($type, $value);
    $statement->execute();
    $statement->bind_result($total);
    return $total > 0;
}

/**
 * @return string random salt, 24 characters long
 */
function generateRandomSalt() {
    return strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
}

/**
 * @param string $username
 * @return string
 */
function getSaltForUser($username) {
    $statement = getMainDbConnection()->prepare('SELECT salt FROM users WHERE username = ? LIMIT 1;');
    $statement->bind_param('s', $username);

    if (!$statement->execute()) {
        die ($statement->error);
    }

    $statement->bind_result($salt);
    $statement->fetch();
    return $salt;
}

/**
 * @param string $password
 * @param string $salt
 * @return string
 */
function hashPassword($password, $salt) {
    $hash = $password;

    for ($i = 0; $i < 65536; $i++) {
        $hash = hash('sha512', $hash . $salt);
    }

    return $hash;
}