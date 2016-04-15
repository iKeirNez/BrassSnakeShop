<html>
<head>
    <title>BrassSnakeShop</title>
</head>
<body>
<h1>BrassSnakeShop</h1>
<p>Welcome to the BrassSnakeShop, this will soon be a fully fledged store.</p>
<br />
<hr>
Git Revision - <pre><?= shell_exec('git rev-parse HEAD') ?></pre><br \>
Last Commit by - <?= shell_exec('git log -1 --pretty=%an') ?>
</body>
</html>