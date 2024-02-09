<?php
if (isset($_SESSION['user_id'])){
//Hay una sesion
}
else{
    header('Location: ../index.php');
    die();
}
?>