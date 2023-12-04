<?php

declare(strict_types=1);

include_once 'dbh.inc.php';
include_once 'library.model.inc.php';

function show_books($pdo){
    $books = get_books($pdo);


    if(!empty($books)){
        foreach($books as $book){
            echo '<div class="books">';
            echo '<a href="pdfbooks/general/' . $book['bookname'] . '" class="book-link" target = _blank>';
            echo '<img src="coverpages/general/' . $book['bookcover'] . '" alt="' . $book['bookname'] . '" class="book-cover">';
            echo '<h2 class="book-title">' . ucwords(pathinfo($book['bookname'], PATHINFO_FILENAME)) . '</h2>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo 'No books here.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    // Sanitize the search query
    $searchQuery = htmlspecialchars($_GET['query']);

    // Perform the search in the database
    $searchResults = search_books($pdo, $searchQuery);

    // Display the search results
    if (!empty($searchResults)) {
        foreach ($searchResults as $result) {
            echo '<div class="search-books">';
            echo '<a href="pdfbooks/general/' . $result['bookname'] . '" class="search-book-link">';
            echo '<img src="coverpages/general/' . $result['bookcover'] . '" alt="' . $result['bookname'] . '" class="search-book-cover">';
            echo '<h2 class="search-book-title">' . ucwords(pathinfo($result['bookname'], PATHINFO_FILENAME)) . '</h2>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo 'No results found.';
    }
}

