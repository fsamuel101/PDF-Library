<?php

require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plsp Library</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <section>
        <h1>Login</h1>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="studentnumber" placeholder="Student Number" id="">
            <input type="password" name="password" placeholder="Password" id="">
            <button>Login</button>
        </form>
        <br>

        <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="studentnumber" placeholder="Student Number">
            <input type="text" name="lastname" placeholder="Lastname">
            <input type="password" name="password" placeholder="Password">
            <button>Register</button>
        </form>
    </section>
    

    <?php
    check_signup_errors();
    ?>
</body>

</html>