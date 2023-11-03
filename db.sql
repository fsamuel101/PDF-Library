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