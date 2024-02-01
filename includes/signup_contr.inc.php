<?php
declare(strict_types= 1);

function is_input_empty (string $username,string $password,string $email) {
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    }
    else{
        return false;
    }
}

function is_email_invalid (string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else{
        return false;
    }
}

function is_username_taken(object $pdo,string  $username){
    if (get_username($pdo,$username)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo, string $username, string $password,string $email) {
    set_user($pdo, $username, $password, $email);
}

function username_contains_spaces($username){
    if(preg_match('/[^a-zA-Z]+/', $username)){
        return true;
    }
    
    else{
        return false;
    }
}

