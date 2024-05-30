<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $studentnum = $_POST["studentnum"];
    $pwd = $_POST["pwd"];

    try {
        
        require_once "../dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        //ERROR HANDLERS

        $errors = [];

        if (is_input_empty($studentnum, $pwd)) {
            $errors["empty_input"] = "Please fill in all fields.";
        } else {
            $result = get_user($pdo, $studentnum);

            if (is_studentnum_wrong($result)) {
                $errors["login_incorrect"] = "Student Number does not match";
            }
    
            if(!is_studentnum_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
                $errors["login_incorrect"] = "Password does not match";
            }
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors; 

            header("Location: /login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["studentnum"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["studentnum"];
        $_SESSION["user_username"] = htmlspecialchars($result["studentnum"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: /login.php?login=success");

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
