<?php
declare(strict_types=1);
function get_count(object $pdo){
    $query = "SELECT count(*) FROM `users`;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();

    return $number_of_rows;
}