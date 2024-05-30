<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $studentnum = $_POST["student_num"];
    $pwd = "upmin";

    try {
        
        require_once "../dbh.inc.php";
        require_once "signup_student_model.inc.php";
        require_once "signup_student_contr.inc.php";

        //ERROR HANDLERS

        $errors = [];

        if (is_input_empty($studentnum)) {
            $errors["empty_input"] = "Please fill in all fields.";
        } else if (is_studentnum_right_length($studentnum)) {
            $errors["studentnum_length"] = "Student number should be exactly 10 characters long";
        } 

        if (is_studentnum_taken($pdo, $studentnum)) {
            $errors["username_taken"] = "Username already taken.";
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            header("Location: /signup_student.php");
            die();
        }

        create_user($pdo, $pwd, $studentnum); 

        header("Location: /signup_student.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {

    header("Location: /login.php");
    die();
}