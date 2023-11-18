CREATE TABLE student_user(
    id INT(11) NOT NULL AUTO_INCREMENT,
    lastname VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    studentnumber VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
    );
    
CREATE TABLE student_data (
    student_number VARCHAR(20) PRIMARY KEY,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    college VARCHAR(255) NOT NULL
);



CREATE TABLE authors (
    author_id INT AUTO_INCREMENT PRIMARY KEY,
    author_name VARCHAR(255) NOT NULL
);

CREATE TABLE book_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bookname VARCHAR(255) NOT NULL,
    bookcover VARCHAR(255) NOT NULL,
    publicationyear VARCHAR(255),
    filesize INT,
    uploaded_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE book_authors (
    book_id INT,
    author_id INT,
    PRIMARY KEY (book_id, author_id),
    FOREIGN KEY (book_id) REFERENCES book_files(id) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES authors(author_id) ON DELETE CASCADE
);
