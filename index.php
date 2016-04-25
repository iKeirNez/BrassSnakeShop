<?php

require_once('includes/functions.php');
require_once('includes/config.php');
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
<?php include('includes/footer.php') ?>
</body>
</html>