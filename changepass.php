<?php

require_once ('includes/config.php');
require_once ('includes/db.php');
require_once ('includes/functions.php');
require_once ('includes/user.php');

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    die('Redirecting...');
}

if (!empty($_POST)) {
    checkInputVar($_POST['password'], 'Please enter a password.');
    $mysqli = getMainDbConnection();
    
    $salt = getSaltForUser($_SESSION['user']->getUsername());
    $password = hashPassword($_POST['password'], $salt);
    
    $statement = $mysqli->prepare('UPDATE users SET password_hash = ? WHERE id = ?');
    $statement->bind_param('si', $password, $_SESSION['user']->getId());

    if ($statement->execute()) {
        header('Location: index.php');
        die("Redirecting...");
    } else {
        die($statement->error);
    }
}

include ('includes/header.php');

?>

<h2>Change Password</h2>

<form action="changepass.php" method="post">
    New Password:<br />
    <input type="password" name="password" value="" />
    <br /><br />
    <input type="submit" value="Change" />
</form>

<?php include ('includes/footer.php');