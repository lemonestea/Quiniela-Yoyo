<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = strtolower($_POST['username']);
    $password = $_POST['pwd'];
    $email = $_POST['email'];
    $confirm = $_POST['pwd2'];

    try{

        require_once ('dbh.inc.php');
        require_once ('signup_model.inc.php');
        require_once ('signup_contr.inc.php');

        //ERROR HANDLING
        $_errors = [];

        if(is_input_empty($username, $password, $email)){
            $_errors['empty_input'] = 'Rellena todos los campos!';
        }
        if(is_email_invalid($email)){
            $_errors['invalid_email'] = 'El Email no es válido';
        }

        if(is_username_taken($pdo,$username)){
            $_errors['username_taken'] = 'Este usuario ya existe';
        }
        if(username_contains_spaces($username)){
            $_errors['username_contains_spaces'] = 'Usuario no valido';
        }
        if(is_email_registered($pdo,$email)){
            $_errors['email_registered'] = 'Ya existe una cuenta con ese correo';
        }
        if($password === $confirm){
            $_errors['password_mismatch'] = 'Las contraseñas no coinciden';
        }

        require_once('config_session.inc.php');
        
        if($_errors){

            $_SESSION["errors_signup"] = $_errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }
        
            create_user($pdo,$username, $password, $email);
            $sessionId = session_create_id();
            session_id($sessionID);
            $_SESSION['user_id'] = get_user_id($pdo,$username)['id'];
            $_SESSION['user_username'] = strtolower(htmlspecialchars( $username ));
            $_SESSION['last_regeneration'] = time();

            header('Location: ../index.php?signup=success?successfull='.$_SESSION['signup_successfull']);
            $signupData = null;
            $_SESSION['signup_data'] = null;
            $pdo = null;
            $stmt = null;
            
            die();


    }catch(PDOException $e){
        die("Query failed. ". $e->getMessage());
    }
    
}
else{
    header('Location: ../index.php');
    die();
}
