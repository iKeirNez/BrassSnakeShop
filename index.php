<?php

require_once('includes/functions.php');
require_once('includes/db.php');

$connection = getDbConnection(new SplFileObject('config/mysql.dat'));

?>

<html>
<head>
    <title>BrassSnakeShop</title>
</head>
<body>
<h1>BrassSnakeShop</h1>
<p>Welcome to the BrassSnakeShop, this will soon be a fully fledged store.</p>
<br />
<div id="footer" align="center">
    <hr>
    Git Revision <code><?= shell_exec('git rev-parse HEAD') ?></code><br />
    Last Commit by <?= shell_exec('git log -1 --pretty=%an') ?>
</div>
</body>
</html>