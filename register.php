<?php

require_once ('includes/config.php');
require_once ('includes/db.php');
require_once ('includes/functions.php');

if (!empty($_POST)) {
    checkInputVar($_POST['username'], 'Please enter a username.');
    checkInputVar($_POST['email'], 'Please enter an email address.');
    checkInputVar($_POST['password'], 'Please enter a password.');
    checkInputVar($_POST['first_name'], 'Please enter your first name.');
    checkInputVar($_POST['last_name'], 'Please enter your last name.');
    
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die('Please enter a valid email address.');
    }

    $mysqli = getMainDbConnection();

    if (checkRowExists($mysqli, 'username', 's', $_POST['username'])) {
        die('That username is already in use.');
    }

    if (checkRowExists($mysqli, 'email', 's', $_POST['email'])) {
        die('That email address is already in use.');
    }

    $salt = generateRandomSalt();
    $password = hashPassword($_POST['password'], $salt);

    $statement = $mysqli->prepare('INSERT INTO users (username, first_name, last_name, email, salt, password_hash) VALUES (?, ?, ?, ?, ?, ?);');
    $statement->bind_param('ssssss', $_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $salt, $password);

    if ($statement->execute()) {
        header('Location: index.php');
        die('Redirecting...');
    } else {
        die($statement->error);
    }
}

include('includes/header.php');
?>
<html>
<head>
    <title><?= WEBSITE_NAME ?></title>
    <?php include('includes/head.php') ?>
</head>


<form action="register.php" method="post">
    <fieldset>
    <legend>Register</legend>
    First Name:<br />
    <input type="text" name="first_name" value="" />
   
    Last Name:<br />
    <input type="text" name="last_name" value="" />
  
    Username:<br />
    <input type="text" name="username" value="" />
 
    E-Mail:<br />
    <input type="text" name="email" value="" />
 
    Password:<br />
    <input type="password" name="password" value="" />
    
    <input type="submit" class="signin" value="Register" />
    </fieldset>
</form>

<?php include ('includes/footer.php'); ?>
</body>
</html>
