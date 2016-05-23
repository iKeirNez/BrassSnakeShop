<?php

require_once('includes/config.php');

echo '<b>Output:</b><br />';
echo 'Executing...<br />';

exec('sh scripts/update.sh', $messages, $code);

foreach ($messages as $message) {
    echo $message . '<br />';
}

echo 'Process exited with code: ' . $code;