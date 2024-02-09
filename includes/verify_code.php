<?php

require_once('config_session.inc.php');

if(isset($_SESSION['code'])){
    if(strval($_SESSION['code']) == strval( $_POST['code'])){
        $_SESSION['code_is_correct'] = 1;
        $_SESSION['toggler'] = 1;
        header("Location: set_new_password.php");
    }
    else{
        header("Location: set_new_password.php?code_invalid=1");
        die();
    }
}
else{
    header("Location: forgot_password.php?code_invalid=1");
    die();
}