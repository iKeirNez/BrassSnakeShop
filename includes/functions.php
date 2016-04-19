<?php

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

function getLastCommitHash() {
    return shell_exec('git rev-parse HEAD');
}

/**
 * @return string
 */
function getLastCommitterName() {
    return shell_exec('git log -1 --pretty=%an');
}