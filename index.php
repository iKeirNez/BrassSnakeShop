<?php

require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/db.php');
require_once('includes/user.php');

$connection = getMainDbConnection();

session_start();

?>

<html>
    <head>
    <title><?= WEBSITE_NAME ?></title>
    <!-- ADDITION OF EXTERNAL ASSETS - BC 16/05/16 15:33 -->
    <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="includes/css/ftnavbar.css">
    <link rel="stylesheet" type="text/css" href="includes/css/sfnavbar.css">
    <link rel="stylesheet" type="text/css" href="includes/css/main.css">
    <script src="includes/js/main.js"></script>
    <!-- END OF ADDITION - BC 16/05/16 15:33 -->

    </head>
    
    <body>
        <div id="wrapper">
        	<div id="header">
            <?php include('includes/header.php') ?>
	        </div>
	    <div id="content">
            <?php if (isset($_SESSION['user'])): ?>
            <p>Welcome back, <?= $_SESSION['user']->getFirstName(); ?></p>
            <?php else: ?>
            <!--    Addition of forms for login 
                    CSS location        -  "//includes/css/main.css"
                    JavaScript location -  "//includes/js/main.js" - BC 16/05/16 15:09 -->
            <form action="login.php" method="post">

                <fieldset>

                    <legend>Sign In</legend>

                    <label for="username" class="vhide">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username" required minlength="2">

                    <label for="password" class="vhide">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password" required minlength="1">

                    <input type="checkbox" name="remember" id="remember" class="vhide">
                    <label for="remember">
                    
                    <i class="octicon octicon-check"></i> Remember all the things
                
                    </label>

                    <button class="signin">Sign in</button>

                </fieldset>

            </form>
                <!-- END OF ADDITION - BC 16/05/16 15:09 -->
                <?php endif; ?>
	        </div>
	        <footer class="footer">
                	<?php include('includes/footer.php') ?>
            	</footer>
        </div>
    </body>
</html>
