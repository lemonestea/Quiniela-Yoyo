<?php

if (isset($_SESSION['user_id'])){
    // There is a session
}

else{ //no session, redirect to login page (index.php)
    header('Location: ../index.php');
    die();
}


?>