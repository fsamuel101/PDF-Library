<?php
declare(strict_types=1);

function handleUpload(object $pdo, string $bookname, string $bookcover, string $publicationyear, int $filesize) {
    require_once 'admin_book_management_model.inc.php'; // Adjust the file name if needed
    upload_book($pdo, $bookname, $bookcover, $publicationyear, $filesize);
}