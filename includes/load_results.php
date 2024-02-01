<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    try{
        require_once('dbh.inc.php');
        require_once('config_session_inside.inc.php');


        if($_POST['fase'] == 'fasedegrupos'){
            if(check_table_access($pdo,'juegos__fasedegrupos')){

                $tabla = get_teams($pdo, 'fasedegrupos');
                prepare_database('fase_de_grupos', $pdo);
                enter_results($tabla, $pdo, 'fasedegrupos');
                echo "Fase de grupo cargados";
                
            }
        }
        if($_POST['fase'] == 'cuartos'){
            if(check_table_access($pdo,'juegos__cuartos')){

                $tabla = get_teams($pdo, 'cuartos');
                prepare_database('cuartos', $pdo);
                enter_results($tabla, $pdo, 'cuartos');
                echo "Cuartos cargados!";
                
            }
        }

        if($_POST['fase'] == 'semis'){
            if(check_table_access($pdo,'juegos__semis')){

                $tabla = get_teams($pdo, 'semis');
                prepare_database('semis', $pdo);
                enter_results($tabla, $pdo, 'semis');
                echo "Semis cargadas!";
                
            }
        }

        if($_POST['fase'] == 'final'){
            if(check_table_access($pdo,'juegos__final')){

                $tabla = get_teams($pdo,'final');
                prepare_database('final', $pdo);
                enter_results($tabla, $pdo, 'final');
                echo "Finales cargadas!";
                
            }
        }
        $username = $_SESSION["user_username"];
        require_once('mispuntos_view.php');
        $points = total_points_from_username($pdo,$username);
        load_results($username,$points,$pdo);
        header('Location: home.php');
    }

    catch(PDOException $e){
        die('Unable to load. '. $e->getMessage());
    }

}

else{
    header("Location: ../index.php");
    die();
}

function get_teams(object $pdo, string $fase){ //fdg = fase de grupos

    $query = "SELECT * FROM juegos__".$fase.";";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

function prepare_database(string $etapa, object $pdo){

    if($etapa === "fase_de_grupos"){
        $query = "CREATE TABLE `quiniela`.`fasedegrupos__".$_SESSION['user_username']."` 
        (`equipo1` VARCHAR(30) NOT NULL ,`resultado1` INT NOT NULL , 
        `resultado2` INT NOT NULL , `equipo2` VARCHAR(30) NOT NULL )";
    }

    if($etapa === "cuartos"){
        $query = "CREATE TABLE `quiniela`.`cuartos__".$_SESSION['user_username']."` 
        (`equipo1` VARCHAR(30) NOT NULL ,`resultado1` INT NOT NULL , 
        `resultado2` INT NOT NULL , `equipo2` VARCHAR(30) NOT NULL,
        `penales1` INT NULL, `penales2` INT NULL )";
    }

    if($etapa === "semis"){
        $query = "CREATE TABLE `quiniela`.`semis__".$_SESSION['user_username']."` 
        (`equipo1` VARCHAR(30) NOT NULL ,`resultado1` INT NOT NULL , 
        `resultado2` INT NOT NULL , `equipo2` VARCHAR(30) NOT NULL,
        `penales1` INT NULL, `penales2` INT NULL )";
    }

    if($etapa === "final"){
        $query = "CREATE TABLE `quiniela`.`final__".$_SESSION['user_username']."` 
        (`equipo1` VARCHAR(30) NOT NULL ,`resultado1` INT NOT NULL , 
        `resultado2` INT NOT NULL , `equipo2` VARCHAR(30) NOT NULL,
        `penales1` INT NULL, `penales2` INT NULL )";
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute();
}

function enter_results(array $tabla, object $pdo, string $fase){

    $i = 0;
    $t = 1;


    foreach($tabla as $row){
        if($fase != "fasedegrupos"){
            if($_POST['penales'.$i]  != ""  && $_POST['penales'.$i+1] != ""){
                $query = "INSERT INTO `".$fase."__".$_SESSION['user_username']."`".
                " VALUES ('".$row['equipo1']."',".$_POST['resultado'.$i].",".
                $_POST['resultado'.$t].",'".$row['equipo2']."', ".$_POST['penales'.$i].",".$_POST['penales'.$t].")";
            }
            else{
                $query = "INSERT INTO `".$fase."__".$_SESSION['user_username']."`".
                " VALUES ('".$row['equipo1']."',".$_POST['resultado'.$i].",".
                $_POST['resultado'.$t].",'".$row['equipo2']."', NULL, NULL)";
            }
        }
        else{
            $query = "INSERT INTO `".$fase."__".$_SESSION['user_username']."`".
            " VALUES ('".$row['equipo1']."',".$_POST['resultado'.$i].",".
            $_POST['resultado'.$t].",'".$row['equipo2']."')";
        }
        print_r($query);
        $i = $i + 2;
        $t = $t + 2;
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }

    

}

function check_table_access(object $pdo,string $tablename){
    $query = "SELECT acceso FROM acceso_a_tablas WHERE tabla = '".$tablename."'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function load_results(string $username,int $puntos_totales,object $pdo){
    
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

        header("Location: jugar.php");

}

