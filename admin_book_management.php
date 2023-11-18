<?php

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

    <style>
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .authors{
            display: flex;
            flex-direction: column;
        }
    </style>

    <form  action="includes/admin_book_management.inc.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="bookFile">Upload</label>
            <input type="file" name="bookFile">
        </div>

        <div>
            <label for="bookCover">Book Cover</label>
            <input type="file" name="bookCover">
        </div>
    
        <div>
            <label for="bookYear">Year of Publication</label>
            <input type="text" name="bookYear">
        </div>
    
        <!-- Input fields for authors (using square brackets for arrays) -->
        <div class="authors">
            <label for="authors[]">Name of the Author</label>
            <input type="text" name="authors[]">
        </div>
    
        <!-- You can add more author input fields as needed -->
    
        <!-- Add a button to dynamically add more author fields if necessary -->
        <button type="button" onclick="addAuthorField()">Add Another Author</button>
    
        <!-- Submit button -->
        <button>Submit</button>
    </form>
    
    <script src="js/book_management.js">
    
    </script>
    
</body>

</html>