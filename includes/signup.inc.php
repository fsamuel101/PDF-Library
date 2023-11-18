<?php

// this is essential to prevent the user to go here without sending a request
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $lastname = $_POST["lastname"]; //get the lastname
    $pwd = $_POST["password"];      //getting the password
    $studentnumber = $_POST["studentnumber"];       //getting the email

    try{
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php'; // the model always comes first
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS TO PREVENT FUCKED UP MOMENTS
        $errors = [];
        if(is_input_empty($lastname, $pwd, $studentnumber)){
            $errors['empty_input'] = 'Fill in all fields';
        }
        elseif(is_student_number_used($pdo, $studentnumber)){
            $errors['student_number_used'] = 'This student number is already taken';
        }
        elseif(is_student_number_valid($pdo, $studentnumber, $lastname)){
            $errors['invalid_student_number'] = 'Invalid Student Number';
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../signup.php"); //if there are errors it will redirect in signup.php
            exit();
            
        }

        create_user($pdo, $lastname, $pwd, $studentnumber );
 

        header("Location: ../index.php?signup=success");

        $pdo= null;
        $stmt = null;
        die(); // to terminate the program

    }catch(PDOException $e){
        die('Query failed'. $e->getMessage());
    }

}else{  
    header("Location: ../index.php");
    die(); // to terminate the program
}