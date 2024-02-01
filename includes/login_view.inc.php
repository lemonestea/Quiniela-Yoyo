<?php

declare(strict_types=1);

function output_username(){

    if(isset($_SESSION['user_id'])){
        echo "Hola " . $_SESSION['user_username'];
    }
    else{
        echo 'Bienvenido a la Quiniela de Yoyo!';
    }
}

function check_login_errors(){

    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        echo '<br>';
        foreach($errors as $error){
            echo '<p class="form-error" >'. $error . '</p>';
            if($error == 'Rellena todos los campos!'){
                break;
            }
        }

        unset($_SESSION['errors_login']);
    }
    else if (isset($_GET['login']) && $_GET['login'] === 'success') {
        echo '<br>';
        echo '<p class= "form-success">Login successful!</p>';

    }
}