<?php

/**
 * @return string random salt, 24 characters long
 */
function generateRandomSalt() {
    return strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
}

/**
 * String values equal to '#NULL#' will be replaced with null.
 *
 * @param String $strValue
 * @return object
 */
function parseValue($strValue) {
    $value = trim($strValue);

    if ($value === '#NULL#') {
        $value = null;
    }

    return $value;
}