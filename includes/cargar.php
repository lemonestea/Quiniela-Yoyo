<?php
try{
    require_once("dbh.inc.php");
    require_once("config_session_inside.inc.php");

    $username = $_SESSION["user_username"];
    $puntos_totales = $_POST["puntos_totales"];

    $query = "SELECT * FROM tabla_de_posiciones WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch();

    if($result == null){
        $query = "INSERT INTO tabla_de_posiciones VALUES ('".$username."','".$puntos_totales."');";
    }

    else{
        $query = "UPDATE tabla_de_posiciones SET puntos = '".$puntos_totales.
        "' WHERE username = '".$username."';";
        
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    header("Location: mispuntos.php");
}catch(PDOException $e){
    echo $e->getMessage();
}
