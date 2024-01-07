<?php

require_once 'includes/config_session.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/903a3ecc19.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin-panel.css">
    <title>PLSP Library</title>
</head>

<body>
    <div class="green-header navbar">
        <div class="solidgreen1"></div>
        <div class="admin-title">
            <h1> <strong>Admin Interface</strong></h1>
            <p>Manage Books and Users</p>
        </div>
        <div class="solidgreen2"></div>
    </div>



    <section class="container">
        <div class="row align-items-center">
            <div class="col xl">
                <a href="admin_book_management.php">
                    <img src="images/19.png" alt="">
                </a>
            </div>
            <div class="col">
                <a href="admin_user_management.php">
                <img src="images/20.png" alt="">
                </a>
            </div>
        </div>


    </section>
</body>

</html>