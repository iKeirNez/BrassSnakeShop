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