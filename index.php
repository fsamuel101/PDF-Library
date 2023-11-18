<?php

require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
require_once 'includes/config_session.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/903a3ecc19.js" crossorigin="anonymous"></script>
    <title>Plsp Library</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/errors.css">
</head>

<body>

    <?php include('header.php')?>
    <div class="index-container">
        <section>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="studentnumber" placeholder="Student Number" id="" class="green-input">
                <input type="password" name="password" placeholder="Password" id="" class="green-input">
                <button class="green-input">Login</button>
            </form>

            <a href="password.php" class="forgot">Forgot Password?</a>
            <a href="signup.php" class="green-input register-button">Register</a>


            <!-- <form action="includes/logout.inc.php">
                <button>Log out</button>
            </form> -->

            <?php
            check_login_errors();
            ?>
        </section>  


    
    </div>

</body>

</html>