<?php

/**
 * @param SplFileObject $configFile
 * @param resource $tunnel
 * @return mysqli
 */
function getDbConnection($configFile, $tunnel) {
    $host = $configFile->fgets();
    $port = $configFile->fgets();
    $database = $configFile->fgets();
    $username = $configFile->fgets();
    $password = null; // TODO handle pass

    $connection = new mysqli($host, $username, $password, $database, $port, $tunnel);
    
    if ($connection->connect_error) {
        die('<h1>MYSQL CONNECT FAILED.</h1><p>' . $connection->connect_error . '</p>');
    }
    
    return $connection;
}

/**
 * @param SplFileObject $configFile
 * @return resource ssh session
 */
function getSshConnection($configFile) {
    $host = $configFile->fgets();
    $port = $configFile->fgets();

    $ssh = ssh2_connect($host, $port);

    $username = $configFile->fgets();
    $password = $configFile->fgets();

    if (!ssh2_auth_password($ssh, $username, $password)) {
        die('<h1>SSH authentication failed</h1>');
    }

    return $ssh;
}

/**
 * @param resource $ssh
 * @param SplFileObject $configFile
 * @return resource tunnel
 */
function getTunnelConnection($ssh, $configFile) {
    $destination = $configFile->fgets();
    $port = $configFile->fgets();
    
    return ssh2_tunnel($ssh, $destination, $port);
}

$ssh = getSshConnection(new SplFileObject('config/ssh.dat'));
$tunnel = getTunnelConnection($ssh, new SplFileObject('config/tunnel.dat'));
$connection = getDbConnection(new SplFileObject('config/mysql.dat'), $tunnel);

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