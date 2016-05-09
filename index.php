<?php

require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/db.php');

$connection = getMainDbConnection();

?>

<html>
<head>
    <title><?= WEBSITE_NAME ?></title>
</head>
<body>
<h1><?= WEBSITE_NAME ?></h1>
<p>Welcome to the <?= WEBSITE_NAME ?>, this will soon be a fully fledged store.</p>

<br />
<?php include('includes/footer.php') ?>
</body>
</html>