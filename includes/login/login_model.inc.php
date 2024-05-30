<?php

declare(strict_types=1);

function get_user(object $pdo, string $studentnum) {
    $query = "SELECT * FROM dormers WHERE studentnum = :studentnum";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":studentnum", $studentnum);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}