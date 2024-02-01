<?php

declare(strict_types=1);

function signup_input(){


    if (isset($_SESSION["signup_data"]["username"]) 
    && !isset($_SESSION["errors_signup"]["username_taken"])){

        echo ('<input type = "text" name = "username" value = "' . 
        $_SESSION["signup_data"]["username"]. '" placeholder = "Usuario" >');
    }


    else{
        echo '<input type = "text" name = "username" placeholder = "Usuario">';
    }
    echo '<br>';
    echo '<input type = "password" minlength="6" required name = "pwd" placeholder = "Contraseña">';
    echo '<br>';

    if (isset($_SESSION["signup_data"]["email"]) 
    && !isset($_SESSION["errors_signup"]["email_registered"])
    && !isset($_SESSION["errors_signup"]["invalid_email"])){

        echo ('<input type = "text" name = "email" value = "' . 
        $_SESSION["signup_data"]["email"] . '" placeholder = "E-mail">');
    }

    

    else{
        echo '<input type = "text" name = "email" placeholder = "E-mail">';
    }
    echo '<br>';
}

function check_signup_errors(){

    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo '<br>';
        foreach($errors as $error){
            echo '<p class="form-error" >'. $error . '</p>';
            if($error == 'Rellena todos los campos!'){
                break;
            }
            if($error == 'El Email no es válido'){
                break;
            }
            if($error == 'Este usuario ya existe'){
                break;
            }
            
        }

        unset($_SESSION['errors_signup']);
    }

}