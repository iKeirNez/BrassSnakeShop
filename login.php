<?php

require_once ('includes/config.php');
require_once ('includes/db.php');
require_once ('includes/functions.php');

if (!empty($_POST)) {
    checkInputVar($_POST['username'], 'Please enter your username.');
    checkInputVar($_POST['password'], 'Please enter your password.');

    $mysqli = getMainDbConnection();
    $salt = getSaltForUser($_POST['username']);
    $password = hashPassword($_POST['password'], $salt);

    $statement = $mysqli->prepare('SELECT id FROM users WHERE username = ? AND password_hash = ? LIMIT 1;');
    $statement->bind_param('ss', $_POST['username'], $password);
    $statement->execute();
    $statement->bind_result($userId);
    $statement->store_result();

    if ($statement->num_rows != 1) {
        die("Invalid username/password combo.");
    }

    $_SESSION['user_id'] = $userId;

    header('Location: index.php');
    die('Log in successful, redirecting...');
}

include('includes/header.php');

?>

<h2>Login</h2>

<form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="" />
    <br /><br />
    Password:<br />
    <input type="password" name="password" value="" />
    <br /><br />
    <input type="submit" value="Login" />
</form>

<?php include ('includes/footer.php');