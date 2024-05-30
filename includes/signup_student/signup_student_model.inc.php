<?php

declare(strict_types=1);

function get_studentnum(object $pdo, string $studentnum) {
    $query = "SELECT studentnum FROM dormers WHERE studentnum = :studentnum;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":studentnum", $studentnum);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $pwd, string $studentnum) {
    $query = "INSERT INTO dormers (studentnum, pwd) VALUES (:studentnum, :pwd);";

    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":studentnum", $studentnum);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();
}