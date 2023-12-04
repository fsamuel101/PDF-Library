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
    <div class="green-header">
        <div class="solidgreen1"></div>
        <div class="admin-title" >
            <h1> <strong>Admin Interface</strong></h1>
            <p>Manage things Like a Pro</p>
        </div>
        <div class="solidgreen2"></div>
    </div>

    <section>
        <a href="admin_book_management.php">
            
            <i class="fa-regular fa-folder fa-2xl" style="color: #266a2d;">Book Files Management</i>
        </a>
        <a href="admin_user_management.php">
            <i class="fa-regular fa-folder fa-2xl" style="color: #266a2d;">User Management</i>
        </a>
        
    </section>
</body>

</html>