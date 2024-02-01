<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/equipos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">

    <title>Equipos</title>
</head>
    <body>
    <?php
    require_once('menu.php');
    require_once('config_session_inside.inc.php');
    require_once("dbh.inc.php");

    $teams = get_all_teams($pdo);
    display_teams($teams, $pdo);

    function get_all_teams(object $pdo) {
        $query = "SELECT equipo FROM equipos";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function display_teams(array $teams, object $pdo) {
        echo "<div class = 'teams'>";
        echo "<div class='header start' id='linea'>Equipo</div>";
        
        echo "<div class = 'end' id = 'linea'>% Fav</div>";
        
        $i = 0;
        foreach($teams as $team){
            $percentage = get_percentage($team["equipo"],$pdo);
            $teams[$i]['percentage'] = $percentage;
            $i++;
        }
        
        $teams = sort_teams($teams);
        
        foreach($teams as $team){
            $path = get_file_path($team["equipo"]);
            
            echo"<div class='start equipo'>".$team['equipo']."</div>";
            echo "<div class = 'middle bandera'><img src='".$path."' width='40' height = '40' /></div>";
            echo "<div class = 'end porcentaje'>".$team['percentage']."%</div>";
        }
        echo "</div>";
    }

    function get_file_path(string $team){
        $path = "../images/paises/";
        $path = $path . strtolower(str_replace(" ","_",$team)) . ".png";
        return $path;
    }

    function get_percentage(string $team, object $pdo){
        $query = "SELECT COUNT(*) FROM equipo_favorito WHERE equipo = :equipo ;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":equipo",$team);
        $stmt->execute();
        $number = $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];

        $query = "SELECT COUNT(*) FROM equipo_favorito";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $total_number = $stmt->fetch(PDO::FETCH_ASSOC)["COUNT(*)"];

        if($number == 0){
            return 0;
        }
        if($total_number == 0){
            return 0;
        }
        $result = ($number * 100) / $total_number;

        return number_format($result,1,".",",");

    }

    function sort_teams(array $teams){
        
        do
	    {
            $swapped = false;
            for( $i = 0, $c = count( $teams ) - 1; $i < $c; $i++ )
            {
                if( $teams[$i]['percentage'] < $teams[$i + 1]['percentage'] )
                {
                    list( $teams[$i + 1], $teams[$i] ) =
                            array( $teams[$i], $teams[$i + 1] );
                    $swapped = true;
                }
            }
	}
	    while( $swapped );
    return $teams;
    }
    ?>
    
    </body>
</html>