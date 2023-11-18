<?php

declare(strict_types=1);

function upload_book(object $pdo, string $bookname, string $bookcover, string $publicationyear, int $filesize)
{
    // Use placeholders in the query and correct the binding statements
    $query = "INSERT INTO book_files (bookname, bookcover, publicationyear, filesize) VALUES
    (:bookname, :bookcover, :publicationyear, :filesize);";

    $stmt = $pdo->prepare($query);

    // Use proper binding with colons
    $stmt->bindParam(":bookname", $bookname);
    $stmt->bindParam(":bookcover", $bookcover);
    $stmt->bindParam(":publicationyear", $publicationyear);
    $stmt->bindParam(":filesize", $filesize);

    $stmt->execute();
}