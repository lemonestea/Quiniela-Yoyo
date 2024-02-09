<?php
session_start();

if(isset($_SESSION['user_id'])){
    if(!isset($_SESSION['last_regeneration'])){
        regenerate_session_id_loggedin_inside();
    }
    
    else{
        $interval = 60 * 60;
        if(time() - $_SESSION["last_regeneration"] >= $interval ){
            regenerate_session_id_loggedin_inside();
        }
    }
}
else{
    if(!isset($_SESSION['last_regeneration'])){
        regenerate_session_id_inside();
    }
    
    else{
        $interval = 60 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval ){
            regenerate_session_id_inside();
        }
    }
}



function regenerate_session_id_loggedin_inside(){
    session_regenerate_id(true);
    
    $userId = $_SESSION['user_id'];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION['last_regeneration'] = time();

}
function regenerate_session_id_inside(){
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
?>