<?php

// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page
    header("Location: index.php");
    exit();
}

// Include the logout script


// Display the library page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>log in na yarn?</h1>

    <form action="includes/logout.inc.php">
            <button>Log out</button>
    </form>
</body>
</html>
