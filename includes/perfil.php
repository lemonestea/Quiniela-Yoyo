<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/perfil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">
    <title>Perfil</title>
</head>
<body>

<?php
require_once('config_session_inside.inc.php');
require_once("menu.php");
require_once("dbh.inc.php");
require_once("mispuntos_control.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['search'])){
        header('Location: buscar.php?status=empty_search');
        die();
    }
    $username = $_POST['search'];
    if(!user_exists($username,$pdo)){
        header('Location: buscar.php?status=user_not_found');
        die();
    }
    else{
        echo "<h1>".$username."</h1>";
        if(favorite_team_is_set($username,$pdo)){
            echo'<p>Equipo Favorito: '. get_favorite_team($username,$pdo).show_flag(get_favorite_team($username,$pdo)).'</p>';
            
        }
        else{
            echo '<p>Aún no tiene equipo Favorito</p>';
        }
    }
 
}
else{
    $username = $_SESSION['user_username'];
    echo "<h1>".$username."</h1>";
    if(favorite_team_is_set($username,$pdo)){
        
        echo'<p>Equipo Favorito: '. get_favorite_team($username,$pdo).show_flag(get_favorite_team($username,$pdo)).'</p>';

    }
    else{
        change_fav_team();
    }
}
get_position($username,$pdo);

get_date_creation($username,$pdo);
echo"<br><br>";
display_links();
echo"<br><br>";

user_table($pdo,$username);

function display_links(){
    echo"<div class = 'links'>";
    echo "<a href = 'perfil.php#Fase de Grupos'>Fase de Grupos</a>";
    echo "<a href = 'perfil.php#Cuartos'>Cuartos</a>";
    echo "<a href = 'perfil.php#Semis'>Semis</a>";
    echo "<a href = 'perfil.php#Final'>Final</a>";
    echo "</div>";
}
function user_table(object $pdo, string $username){
    $player_points = [];
        $player_points[0] = calculate_points_per_match($pdo,$username,"fasedegrupos");
        $player_points[1] = calculate_points_per_match($pdo,$username,"cuartos");
        $player_points[2] = calculate_points_per_match($pdo,$username,"semis");
        $player_points[3] = calculate_points_per_match($pdo,$username,"final");

        $player_table = [];
        $player_table[0] = get_user_table($pdo,$username,"fasedegrupos");
        $player_table[1] = get_user_table($pdo,$username,"cuartos");
        $player_table[2] = get_user_table($pdo,$username,"semis");
        $player_table[3] = get_user_table($pdo,$username,"final");

        $puntos_fase = [];
        $puntos_partido = 0;

        $i = 0;
        $l = 0;
        $fases = [];
        $fases[0] = "Fase de Grupos";
        $fases[1] = "Cuartos";
        $fases[2] = "Semis";
        $fases[3] = "Final";
        
        echo"<br><br><div class='grid'>";
        foreach($player_table as $fase){
            if($fase != null){
                echo "<h1 id = '".$fases[$l]."'>". $fases[$l]."</h1>";
                foreach($fase as $game){
                    if(isset($game)){
                        echo "<div>".$game['equipo1']."</div>";
                        echo "<div>".$game['resultado1']."</div>";
                        echo "<div>".$game['resultado2']."</div>";
                        echo "<div>".$game['equipo2']."</div>";
                        if(isset($player_points[$l][$i]['puntos'])){
                            if($player_points[$l][$i]['puntos'] > 0){
                                echo "<div id = 'puntos'>+".$player_points[$l][$i]['puntos']."</div>";
                            }
                            else{
                                echo "<div>+".$player_points[$l][$i]['puntos']."</div>";
                            }
                            $puntos_partido += $player_points[$l][$i]['puntos'];
                        }
                        else{
                            echo "<div>N/A</div>";
                        }
                        if($fases[$l] != "Fase de Grupos"){
                            echo "<div id='penales'>Penales.</div><div id='penales'>".$game['penales1']."</div>";
                            echo "<div id='penales'>".$game['penales2']."</div><div id='penales'></div>";
                            echo"<div id='penales'></div>";
                        }
                        $i++;
                        
                    }
                }
                $i = 0;
                
                $puntos_fase[$l] = $puntos_partido;
                $puntos_partido = 0;
            }
            
            $l++;
            
        }
        echo "</div>";
        echo "<br><br>";
        return $puntos_fase;
        

}
function user_exists(string $username, object $pdo){
    $query = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(isset($result['username'])){
        return true;
    }
    else{
        return false;
    }
}
function get_position(string $username,object $pdo){
    $query = "SELECT * FROM `tabla_de_posiciones` ORDER BY puntos DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $position = 0;
    $i = 0;
    $points_mask = -1;
    foreach($table as $t){

        if($t['puntos'] != $points_mask){
            $i++;
            $points_mask = $t['puntos'];
        }

        if($t['username'] == strtolower($username)){
            $position = $i;
        }
        
    }
    echo "<p class= 'position'>Posicion: ".$position."</p>";
}
function favorite_team_is_set(string $username,object $pdo){
    $query = "SELECT * FROM equipo_favorito WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($result != null){
        return true;
    }
    else{
        return false;
    }
}
function change_fav_team(){
    echo'<form action="favorite_team.php" id="equipo-favorito" method="post">
    <select id="ddlist" name="equipo">
    <option disabled selected>Elige tu equipo favorito</option>
    <option value="Argentina">Argentina</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Brasil">Brasil</option>
    <option value="Chile">Chile</option>
    <option value="Colombia">Colombia</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Estados Unidos">Estados Unidos</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Mexico">Mexico</option>
    <option value="Panama">Panama</option>
    <option value="Peru">Peru</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Venezuela">Venezuela</option>
    </select>
    <button type="submit">Ok</button>
    </form>';
}
function get_favorite_team(string $username, object $pdo){
    $query = 'SELECT equipo FROM equipo_favorito WHERE username = :username';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['equipo'];
}
function show_flag(string $team){
    $path = "../images/paises/".str_replace(" ","_",strtolower($team)).".png";
    return "<img src='".$path."' width='25' height = '25'/>";
}

function get_date_creation(string $username, object $pdo){
    $query = "SELECT fecha_creacion FROM users WHERE username = :username ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $fecha = substr($result["fecha_creacion"], 8, 2)."-". substr($result["fecha_creacion"], 5, 2) .
    "-".substr($result["fecha_creacion"], 0, 4);
    echo "<p>Se unió el " . $fecha . "</p>";
}

require_once("redirect.php");
?>




</body>
</html>