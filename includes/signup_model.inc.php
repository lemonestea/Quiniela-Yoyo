<?php

declare(strict_types=1);


function get_username( object $pdo, string $username) {
    $username_to_lower = strtolower($username);
    $query = "SELECT username FROM users WHERE BINARY username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username_to_lower);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_id(object $pdo, string $username) {
    $username_to_lower = strtolower($username);
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username_to_lower);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function is_email_registered( object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $password, string $email) {
    $username_to_lower = strtolower($username);
    $query = "INSERT INTO users (username,pwd,email,fecha_creacion) 
    VALUES (:username, :pwd, :email, :fecha)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username_to_lower);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $fecha = date("Y-m-d H:i:s");
    $stmt->bindParam(":fecha",$fecha);

    $stmt->execute();
}