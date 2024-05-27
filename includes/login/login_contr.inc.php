<?php

declare(strict_types=1);

function is_input_empty(string $studentnum, string $pwd) {

    return (empty($studentnum) || empty($pwd));
}

function is_studentnum_wrong(bool|array $result) {

    return !$result;
}

function is_password_wrong(string $pwd, string $hashedPwd) {
   
    
    if(!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
} 