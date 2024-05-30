<?php

declare(strict_types=1);

function is_input_empty(string $studentnum) {
    return empty($studentnum);
}

function is_studentnum_taken(object $pdo, string $studentnum) {
    return get_studentnum($pdo, $studentnum);
}

function is_studentnum_right_length(string $studentnum) {
    return strlen($studentnum) != 10;
}

function create_user($pdo, string $pwd, string $studentnum){
    
    set_user($pdo, $pwd, $studentnum);
}