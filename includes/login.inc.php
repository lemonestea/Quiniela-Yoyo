<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = strtolower($_POST['username']);
    $password = $_POST['pwd'];

    try{
        require_once('dbh.inc.php');
        require_once('login_model.inc.php');
        require_once('login_contr.inc.php');

        //ERROR HANDLERS
        $_errors = [];

        if(is_input_empty($username, $password)){
            $_errors['empty_input'] = 'Rellena todos los campos!';
        }
        
        $result = get_user($pdo,$username);

        if(is_username_wrong($result)){
            $_errors['login_incorrect'] = 'Usuario y contraseña incorrectos';
        }

        if(!is_username_wrong($result) && is_password_wrong($password, $result['pwd'])){
            $_errors['login_incorrect'] = 'Usuario y contraseña incorrectos';
        }

        

        require_once('config_session.inc.php');
        
        if($_errors){

            $_SESSION["errors_login"] = $_errors;

            header("Location: ../index.php");
            die();
        }

        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result['id'];
        session_id($sessionId);

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_username'] = htmlspecialchars( $result['username'] );
        $_SESSION['last_regeneration'] = time();
        
        header('Location: ../index.php?login=success');
        $pdo = null;
        $statement = null;
        die();

    }catch(PDOException $e){
        die('Unable to login. ' . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}
?>