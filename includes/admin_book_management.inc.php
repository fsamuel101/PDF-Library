<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if a file was uploaded without errors
    // Corrected condition
    if (isset($_FILES["bookFile"], $_FILES["bookCover"]) &&
         $_FILES["bookFile"]["error"] === 0 && $_FILES["bookCover"]["error"] === 0) {


        $book_dir = "../pdfbooks/general/";
        $book_file = $book_dir . basename($_FILES["bookFile"]["name"]);
        $book_type = strtolower(pathinfo($book_file, PATHINFO_EXTENSION));

        $cover_dir = "../coverpages/general/";
        $cover_file = $cover_dir . basename($_FILES["bookCover"]["name"]);
        $cover_type = strtolower(pathinfo($cover_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)

        $allowed_book_types = array("pdf");
        $allowed_cover_types = array("jpeg", "jpg", "png");
        if (!in_array($book_type, $allowed_book_types) || !in_array($cover_type, $allowed_cover_types)) {
            echo "Sorry, only PDF files for books and JPEG, JPG, and PNG files for covers are allowed.";
            header("Location: ../index.php"); // If there are errors, it will redirect to the index page to start again
            exit();
        } else {
            // Moves the uploaded file to the folder
            if (move_uploaded_file($_FILES["bookFile"]["tmp_name"], $book_file) &&
                move_uploaded_file($_FILES["bookCover"]["tmp_name"], $cover_file)) {
                $bookname = $_FILES["bookFile"]["name"];
                $bookcover = $_FILES["bookCover"]["name"];
                $bookyear = $_POST["bookYear"];
                $booksize = $_FILES["bookFile"]["size"];

                try {
                    require_once 'dbh.inc.php';
                    require_once 'admin_book_management_model.inc.php'; // The model always comes first
                    require_once 'admin_book_management_contr.inc.php'; // The model always comes first

                    handleUpload($pdo, $bookname, $bookcover, $bookyear, $booksize);
                } catch (PDOException $e) {
                    die('Query failed: ' . $e->getMessage());
                }
            } else {
                echo "Sorry, there was an error uploading your files.";
            }
        }
    } else {
        echo "Please select both book file and cover file.";
    }
} else {
    header("Location: ../index.php");
    die(); // To terminate the program
}
?>
