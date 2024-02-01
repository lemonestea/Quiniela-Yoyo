<?php

require_once("config_session_inside.inc.php");
require_once("dbh.inc.php");

$username = $_SESSION["user_username"];
$equipo = $_POST["equipo"];
if($equipo != null){
    $query = "INSERT INTO equipo_favorito VALUES(:username, :equipo);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":equipo", $equipo);
    $stmt->execute();
}


header("Location:perfil.php");