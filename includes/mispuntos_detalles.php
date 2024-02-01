<html>
    <head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/mispuntos_detalles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">

    <title>Puntos/Detalles</title>
    </head>
<?php
require_once("config_session_inside.inc.php");
require_once("dbh.inc.php");
require_once("menu.php");
require_once("mispuntos_model.php");
require_once('mispuntos_control.php');

$fase = $_GET['fase'];
$username = $_SESSION['user_username'];
$user_table = get_user_table($pdo,$username,$fase);
$results_table = get_results_table($pdo,$fase);

$points_table = calculate_points_per_match($pdo,$username,$fase);
if($user_table != null && $results_table != null){
    echo "<div class = 'tabla'>";
    echo"<h1>Tu Quiniela</h1>";
    foreach($user_table as $user){

        
        $bandera1 = assign_file_path($user['equipo1']);
        $bandera2 = assign_file_path($user['equipo2']);

        echo "<div class = 'equipo1'>";
        echo "<div><img src='".$bandera1."' width = 25 height = 25 ></div>";
        echo $user['equipo1'] . "</div><div class = 'resultado1'>" . $user["resultado1"] .
        "</div><div class = 'resultado2'>" . $user["resultado2"] . "</div><div class = 'equipo2'> " ;
        echo "<div><img src='".$bandera2."' width = 25 height = 25></div>".$user['equipo2']."</div>";
        if($fase != "fasedegrupos"){
            echo "<div class='pen'>Pen</div><div class = 'penales1'>".$user["penales1"]."</div><div class = 'penales2'>".$user["penales2"]."</div><div class='pen'></div>";
        }
        }
    echo "</div>\n";
    echo "<div class = 'tabla2'>";
    echo"<h1>Resultados</h1><div></div>";
    foreach($points_table as $user){
        $bandera1 = assign_file_path($user['equipo1']);
        $bandera2 = assign_file_path($user['equipo2']);

        echo "<div class = 'equipo1'>";
        echo "<div><img src='".$bandera1."' width = 25 height = 25 ></div>";
        echo $user['equipo1'] . "</div><div class = 'resultado1'>" . $user["resultado1"] .
        "</div><div class = 'resultado2'>" . $user["resultado2"] . "</div><div class = 'equipo2'> " ;
        echo "<div><img src='".$bandera2."' width = 25 height = 25></div>".$user['equipo2']."</div>";
        
        if($user['puntos'] > 0){
            echo"<div class='puntos'>+".$user['puntos']."</div>";
        }
        else{
            echo"<div></div>";
        }
        if($fase != "fasedegrupos"){
            echo "<div class = 'pen'>Pen</div><div class = 'penales1'>".$user["penales1"]."</div><div class = 'penales2'>".$user["penales2"]."</div><div class ='pen'></div><div></div>";
        }
    }
    echo "</div>\n";
}
else{
    echo"<div>Aún no se han cargado los resultados de los juegos</div>";
}
function assign_file_path(string $equipo){
    $path = null;
    if($equipo === 'Argentina'){
        $path = '../images/paises/argentina.png';
    }

    elseif($equipo === 'Bolivia'){
        $path = '../images/paises/bolivia.png';
    }

    elseif($equipo === 'Brasil'){
        $path = '../images/paises/brasil.png';
    }

    elseif($equipo === 'Chile'){
        $path = '../images/paises/chile.png';
    }

    elseif($equipo === 'Colombia'){
        $path = '../images/paises/colombia.png';
    }

    elseif($equipo === 'Ecuador'){
        $path = '../images/paises/ecuador.png';
    }

    elseif($equipo === 'Estados Unidos'){
        $path = '../images/paises/estados_unidos.png';
    }

    elseif($equipo === 'Jamaica'){
        $path = '../images/paises/jamaica.png';
    }

    elseif($equipo === 'Mexico'){
        $path = '../images/paises/mexico.png';
    }

    elseif($equipo === 'Panama'){
        $path = '../images/paises/panama.png';
    }

    elseif($equipo === 'Paraguay'){
        $path = '../images/paises/paraguay.png';
    }

    elseif($equipo === 'Peru'){
        $path = '../images/paises/peru.png';
    }

    elseif($equipo === 'Uruguay'){
        $path = '../images/paises/uruguay.png';
    }

    elseif($equipo === 'Venezuela'){
        $path = '../images/paises/venezuela.png';
    }

    else{
        $path = '../images/paises/por_definir.png';
    }

    

    return $path;
}
?>
</html>