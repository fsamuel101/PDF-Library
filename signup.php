<?php

require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="studentnumber" placeholder="Student Number">
            <input type="text" name="lastname" placeholder="Lastname">
            <input type="password" name="password" placeholder="Password">
            <button>Register</button>
        </form>

        <?php
        check_signup_errors();
        ?>
</body>
</html>