<?php
require_once('config_session.inc.php');
require_once('dbh.inc.php');

$pwd1 = strval( $_POST["pwd1"] );
$pwd2 = strval( $_POST["pwd2"] );


if($pwd1 === $pwd2){
    unset($_SESSION['code_is_correct']);
    unset($_SESSION['toggler']);
    unset($_SESSION['code']);

    $email = $_SESSION['email'];
    update_passwords($pwd1,$pdo,$email);

}

else{
    $_SESSION['code_is_correct'] = 1;
    $_SESSION['toggler'] = 1;
    header("Location: set_new_password.php");
    die();
}

function update_passwords(string $pwd1, object $pdo, string $email){
    if(user_exists($pdo,$email)){
        $username = user_exists($pdo,$email);

        $options = [
            'cost' => 12
        ];
    
        $hashedPwd = password_hash($pwd1, PASSWORD_BCRYPT, $options);

        $query = "UPDATE users SET pwd = :pwd WHERE username = :username AND email = :email";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->execute();  
        $_SESSION['password_updated'] = 1; 
        header("Location: ../index.php");
    }
    else{
        unset($_SESSION['code_is_correct']);
        unset($_SESSION['toggler']);
        unset($_SESSION['code']);
        header("Location: forgot_password.php?user_not_found");
        die();
    }
    
}

function user_exists(object $pdo, string $email){
    $query = "SELECT username FROM users WHERE email = '" . $email . "'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        return false;
    }
    else{
        return $result['username'];
    }
}