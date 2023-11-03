<?php

// this is essential to prevent the user to go here without sending a request
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"]; //getting the input username
    $pwd = $_POST["password"];      //getting the password
    $email = $_POST["email"];       //getting the email

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php'; // the model always comes first
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS TO PREVENT FUCKED UP MOMENTS
        $errors = [];
        if(is_input_empty($username, $pwd, $email)){
            $errors['empty_input'] = 'Fill in all fields';
        }
        if(is_email_invalid($email)){
            $errors['invalid_email'] = 'Email is invalid';
        }
        if(is_username_taken($pdo, $username)){
            $errors['username_taken'] = 'Username is already taken';
        }
        if(is_email_registered( $pdo, $email)){
            $errors['email_taken'] = 'Email is already taken';
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
        }
    }catch(PDOException $e){
        die('Query failed'. $e->getMessage());
    }

}else{  
    header("Location: ../index.php");
    die(); // to terminate the program
}