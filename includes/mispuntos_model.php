<?php

declare(strict_types= 1);

function get_user_table(object $pdo, string $username, string $fase){

    try
    {
    $query = "SELECT * FROM ".$fase."__".$username.";";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
    }
    catch (PDOException $e){
        return null;
    }

}

function get_results_table(object $pdo, string $fase){

    try{
        $query = "SELECT * FROM juegos__".$fase;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    catch (PDOException $e){
        return null;
    }

}

?>