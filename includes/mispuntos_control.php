<?php
declare(strict_types= 1);

require_once("mispuntos_model.php");

function calculate_points_per_match(object $pdo, string $username, string $fase){

    $PUNTOS_FASEDEGRUPOS_RESULTADO = 2;
    $PUNTOS_FASEDEGRUPOS_GOLES = 1;

    $PUNTOS_CUARTOS_RESULTADO = 5;
    $PUNTOS_CUARTOS_GOLES = 3;
    $PUNTOS_CUARTOS_PENALES = 1;

    $PUNTOS_SEMIS_RESULTADO = 7;
    $PUNTOS_SEMIS_GOLES = 5;
    $PUNTOS_SEMIS_PENALES = 2;

    $PUNTOS_3ERPUESTO_RESULTADO = 7;
    $PUNTOS_3ERPUESTO_GOLES = 5;
    $PUNTOS_3ERPUESTO_PENALES = 2;

    $PUNTOS_FINAL_RESULTADO = 9;
    $PUNTOS_FINAL_GOLES = 7;
    $PUNTOS_FINAL_PENALES = 3;

    $usertable = get_user_table($pdo,$username,$fase);
    $resultstable = get_results_table($pdo,$fase);
    
    if(!isset($usertable) || !isset($resultstable)){
        
        return null;
    }

    $i = 0;
    $points = [];
    $points_mask = 0;
    $puntos_ganados_goles = 0;
    $puntos_ganados_resultado = 0;
    $puntos_penales = 0;
    
    if($fase == "fasedegrupos"){
        $puntos_ganados_goles = $PUNTOS_FASEDEGRUPOS_GOLES;
        $puntos_ganados_resultado = $PUNTOS_FASEDEGRUPOS_RESULTADO;
    }

    if($fase == "cuartos"){
        $puntos_ganados_goles = $PUNTOS_CUARTOS_GOLES;
        $puntos_ganados_resultado = $PUNTOS_CUARTOS_RESULTADO;
        $puntos_penales = $PUNTOS_CUARTOS_PENALES;
    }
    if($fase == "semis"){
        $puntos_ganados_goles = $PUNTOS_SEMIS_GOLES;
        $puntos_ganados_resultado = $PUNTOS_SEMIS_RESULTADO;
        $puntos_penales = $PUNTOS_SEMIS_PENALES;
    }
    if($fase == "final"){
        $puntos_ganados_goles = $PUNTOS_FINAL_GOLES;
        $puntos_ganados_resultado = $PUNTOS_FINAL_RESULTADO;
        $puntos_penales = $PUNTOS_FINAL_PENALES;
    }
    $final_3erPuesto = 0; //Final = 0, 3er puesto = 1
    foreach($resultstable as $result){

        if($final_3erPuesto){
            $puntos_ganados_goles = $PUNTOS_3ERPUESTO_GOLES;
            $puntos_ganados_resultado = $PUNTOS_3ERPUESTO_RESULTADO;
            $puntos_penales = $PUNTOS_3ERPUESTO_PENALES;
        }
        if(isset($result['resultado1']) && isset($result['resultado2'])){

            if($result['resultado1'] == $usertable[$i]['resultado1'])
            {
                $points_mask = $points_mask + $puntos_ganados_goles;
            }
            if($result['resultado2'] == $usertable[$i]['resultado2'])
            {
                $points_mask = $points_mask + $puntos_ganados_goles;
            }
            if(
            ($result['resultado1'] > $result['resultado2'] && 
            $usertable[$i]['resultado1'] > $usertable[$i]['resultado2']) 
            ||
            ($result['resultado2'] > $result['resultado1'] && 
            $usertable[$i]['resultado2'] > $usertable[$i]['resultado1']
            )
            ||
            ($result['resultado2'] == $result['resultado1'] && 
            $usertable[$i]['resultado2'] == $usertable[$i]['resultado1'] && $fase == "fasedegrupos")
            )
            {
                $points_mask = $points_mask + $puntos_ganados_resultado;
            }
            if($fase != "fasedegrupos"){

                if($result['resultado1'] == $result['resultado2'] && $usertable[$i]["resultado1"] == $usertable[$i]["resultado2"])
                {
                    
                    if($result['penales1'] > $result['penales2'] && 
                        $usertable[$i]['penales1'] > $usertable[$i]['penales2'])
                    {
                        $points_mask += $puntos_ganados_resultado;
                        $points_mask = $points_mask + $puntos_penales;
                    }
                    if($result['penales1'] < $result['penales2'] && 
                        $usertable[$i]['penales1'] < $usertable[$i]['penales2'])
                    {
                        $points_mask += $puntos_ganados_resultado;
                        $points_mask = $points_mask + $puntos_penales;
                    }
                    
                }
                if($result['resultado1'] == $result['resultado2'] 
                ||
                $usertable[$i]['resultado1'] == $usertable[$i]['resultado2']
                ){    
                    if($result['resultado1'] == $result['resultado2'])
                    {
                        if($result['penales1'] > $result['penales2'] &&
                        $usertable[$i]['resultado1'] > $usertable[$i]['resultado2']){
                            $points_mask = $points_mask + $puntos_ganados_resultado;
                        }
                        if($result['penales1'] < $result['penales2'] &&
                        $usertable[$i]['resultado1'] < $usertable[$i]['resultado2']){
                            $points_mask = $points_mask + $puntos_ganados_resultado;
                        }
                    }
                    //
                    if($usertable[$i]['resultado1'] == $usertable[$i]['resultado2'])
                    {
                        if($result['resultado1'] > $result['resultado2'] &&
                            $usertable[$i]['penales1'] > $usertable[$i]['penales2']){
                            $points_mask = $points_mask + $puntos_ganados_resultado;
                        }
                        if($result['resultado1'] < $result['resultado2'] &&
                            $usertable[$i]['penales1'] < $usertable[$i]['penales2']){
                            $points_mask = $points_mask + $puntos_ganados_resultado;
                        }
                    }

                    
                }
            }
            

            $points[$i]['equipo1'] = $result['equipo1'];
            $points[$i]['resultado1'] = $result['resultado1'];
            $points[$i]['resultado2'] = $result['resultado2'];
            $points[$i]['equipo2'] = $result['equipo2'];
            if($fase != "fasedegrupos"){
                $points[$i]['penales1'] = $result['penales1'];
                $points[$i]['penales2'] = $result['penales2'];
            }
            $points[$i]['puntos'] = $points_mask;   
            $i = $i + 1;  
            $points_mask = 0;   

        }

        else{
            break;
        }
        if($fase == "final"){
            $final_3erPuesto = 1;
        }
    }
    
    
    return $points;
}

function get_fase_points(array $matchs){
    $total_points = 0;

    foreach($matchs as $match){
       $total_points += $match['puntos'];
   }
   
   return $total_points;
}
function get_total_points(array $points_array){
    $total_points = 0;
    $i = 0;

    foreach($points_array as $matchs){
        foreach($matchs as $match){
            
            $total_points += $match['puntos'];
            $i += 1;
        }
        $i = 0;
    }
    return $total_points;
}

function get_total_points_from_username(string $username, object $pdo){

    $total_points = 0;
    $points = [];
    if(calculate_points_per_match($pdo,$username,"fasedegrupos") != null){
        array_push($points,calculate_points_per_match($pdo,$username,"fasedegrupos"));
    }
    if(calculate_points_per_match($pdo,$username,"cuartos") != null){
        array_push($points,calculate_points_per_match($pdo,$username,"cuartos"));
    }
    if(calculate_points_per_match($pdo,$username,"semis") != null){
        array_push($points,calculate_points_per_match($pdo,$username,"semis"));
    }
    if(calculate_points_per_match($pdo,$username,"final") != null){
        array_push($points,calculate_points_per_match($pdo,$username,"final"));
    }

    $total_points = get_total_points($points);
    
    return $total_points;
    

}

