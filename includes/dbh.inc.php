<?php
// $host = 'sql211.infinityfree.com';
// $dbname = 'if0_35739207_db_quiniela';
// $dbusername='if0_35739207';
// $dbpwd = 'XG2zHS0ywU';

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