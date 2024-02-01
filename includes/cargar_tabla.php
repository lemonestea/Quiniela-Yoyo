<?php

require_once("mispuntos_control.php");
require_once("dbh.inc.php");

$all_users = get_all_users($pdo);

set_total_points($all_users,$pdo);
header("Location:tabla.php");
die();

function get_all_users($pdo){
    $query = "SELECT username FROM users WHERE 1;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function set_total_points(array $users, $pdo){
    
    foreach($users as $user){
        
            
            $u = $user["username"];
            $puntos = get_total_points_from_username($u,$pdo);

            if(check_if_exists($u,$pdo)){
                update_user_points($u,$puntos,$pdo);
            }
            else{
                insert_user_points($u,$puntos,$pdo);
            }
        
        
    }
}

function check_if_exists($user,$pdo){
    $query = "SELECT * FROM tabla_de_posiciones WHERE username = :user";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($result['username'])){
        return true;                    //exists
    }
    else{
        return false;                   //doesn't exist
    }

}

function insert_user_points($user,$points,$pdo){
    $query = "INSERT INTO `tabla_de_posiciones` (`username`, `puntos`) 
    VALUES (:user,:points)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":points",$points);
    $stmt->execute();
}

function update_user_points($user,$points,$pdo){
    $query = "UPDATE `tabla_de_posiciones` SET `puntos`=:points WHERE username = :user";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":points", $points);
    $stmt->bindParam(":user",$user);
    $stmt->execute();
}