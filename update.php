<?php

require_once('includes/config.php');

echo '<b>Output:</b><br />';
echo 'Executing...<br />';

exec('sh scripts/update.sh', $message, $code);

echo $message . '<br />';
echo 'Process exited with code: ' . $code;