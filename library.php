<?php
include_once 'includes/library.view.inc.php';
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
    <link rel="stylesheet" href="css/library.css">
    <title>PLSP Library</title>
</head>



<body>
    <div class="green-header">
        <div class="solidgreen1"></div>
        <div class="admin-title">
            <h1> <strong>PLSP Library</strong></h1>
            <p>Browse books</p>
        </div>
        <div class="solidgreen2"></div>
    </div>

    <section class="library">
        <div class="book-container">
            <?php show_books($pdo); ?>
        </div>
        <div class="search-container">
            <form id="search-form">
                <input type="text" name="query" id="search-input" placeholder="Search books...">
                <button type="submit">Search</button>
            </form>
            <div class="search-results" id="book-container">

            </div>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search-form').submit(function (e) {
                e.preventDefault();
    
                var query = $('#search-input').val();
    
                $.ajax({
                    type: 'GET',
                    url: 'includes/library.view.inc.php',
                    data: { query: query },
                    success: function (data) {
                        $('#book-container').html(data);
                    },
                    error: function () {
                        alert('Error occurred during the search.');
                    }
                });
            });
        });
    </script>

    <!-- <form action="includes/logout.inc.php">
        <button>Log out</button>
    </form> -->
</body>

</html>