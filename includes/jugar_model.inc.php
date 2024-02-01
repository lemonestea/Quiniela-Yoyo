<?php

declare(strict_types=1);

function check_table_access(object $pdo,string $tablename){
    $query = "SELECT acceso FROM acceso_a_tablas WHERE tabla = '".$tablename."'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetch_table(object $pdo, string $tablename){ 
    $query = "SELECT * FROM ".$tablename.";";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

function check_if_table_exists(object $pdo, string $tablename){

    try{
        $query = "SELECT * FROM ".$tablename.";";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if(isset($result)){
            return true;
        }
        else{
            return false;
        }
    }
    catch(PDOException $e){
        return false;
    }

}

?>