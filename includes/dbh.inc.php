<?php

$host = 'localhost';
$dbname = 'quiniela';
$dbusername = 'root';
$dbpwd = '';

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $dbusername,$dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die( 'Connection Failed. '. $e->getMessage());
}
