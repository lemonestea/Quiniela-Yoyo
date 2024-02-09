<?php

declare(strict_types= 1);
require_once("mispuntos_control.php");
require_once("mispuntos_model.php");

function total_points(object $pdo,string $username){
    $points = [];
    $fdg = calculate_points_per_match($pdo,$username,"fasedegrupos");
    $cua = calculate_points_per_match($pdo,$username,"cuartos");
    $semi = calculate_points_per_match($pdo,$username,"semis");
    $final = calculate_points_per_match($pdo,$username,"final");
    echo "<div class= 'puntos' >";
    if(isset($fdg))
    {
        print_r("<div class = 'fase'>Fase de Grupos</div><a href='mispuntos_detalles.php?fase=fasedegrupos'>". get_fase_points($fdg)."</a>");
        array_push($points,calculate_points_per_match($pdo,$username,"fasedegrupos"));
    }
    
    if(isset($cua))
    {
        print_r("<div class = 'fase'>Cuartos</div><a href='mispuntos_detalles.php?fase=cuartos''> ". get_fase_points($cua)."</a>");
        array_push($points,calculate_points_per_match($pdo,$username,"cuartos"));
    }
    if(isset($semi))
    {
        print_r("<div class = 'fase'>Semis</div><a href='mispuntos_detalles.php?fase=semis'>". get_fase_points($semi)."</a>");
        array_push($points,calculate_points_per_match($pdo,$username,"semis"));
    }
    if(isset($final))
    {
        print_r("<div class = 'fase'>Final</div><a href='mispuntos_detalles.php?fase=final'>". get_fase_points($final)."</a>");
        array_push($points,calculate_points_per_match($pdo,$username,"final"));
    }
    echo"<div class = 'fase'>Total</div><div class='total'>".get_total_points($points)."</div>";
    echo "</div>";
    echo "<form class='boton_enviar' action = 'cargar.php' method = 'post'>\n";
    echo "<input type='hidden' name = 'puntos_totales' value= '".get_total_points($points)."' >";
    echo "</form>";
}

function total_points_from_username(object $pdo,string $username){
    $points = [];
    $fdg = calculate_points_per_match($pdo,$username,"fasedegrupos");
    $cua = calculate_points_per_match($pdo,$username,"cuartos");
    $semi = calculate_points_per_match($pdo,$username,"semis");
    $final = calculate_points_per_match($pdo,$username,"final");

    if(isset($fdg))
    {
        array_push($points,calculate_points_per_match($pdo,$username,"fasedegrupos"));
    }
    
    if(isset($cua))
    {
        array_push($points,calculate_points_per_match($pdo,$username,"cuartos"));
    }
    if(isset($semi))
    {
        array_push($points,calculate_points_per_match($pdo,$username,"semis"));
    }
    if(isset($final))
    {
        array_push($points,calculate_points_per_match($pdo,$username,"final"));
    }
    $total_points = get_total_points($points);

    return $total_points;

}





