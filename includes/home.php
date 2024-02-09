<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

<?php 
    require_once("menu.php");
    require_once("dbh.inc.php");
?>
<div class = 'main-grid'>
    <div class = 'title'>
    <h1>Juega y Gana</h1>
    <p>Envía tu quiniela y empieza a ganar puntos!
    <br>
    <br>
        <span style="font-size:30px">&#127942;</span>
    </p>
    </div>
    <div class = "username">
        <p>
        <?php
      require_once('config_session_inside.inc.php');
      require_once('redirect.php');
      if (isset($_SESSION['user_id'])){
        echo 'Hola, '.$_SESSION['user_username'] . '. Bienvenid@ a la Quiniela de Yoyo';
    }
    ?>
        </p>
    </div>
    <a class = 'manda-resultados' href="jugar.php">
        <img alt = "Jugar" src="../images/casino_coin.png" style="margin-right:2ch;" width=50 height=50>
        Juega ya!   
    </a>

    <a class = "rrss" target=”_blank” href="https://www.instagram.com/chamofutbolero/">
        <img alt = '@chamofutbolero' style = "margin-right:2ch;" src="../images/instagram_logo.png" width = 40 height = 40> 
        Sígueme en Instagram</a>

    <a class= "reglas" href="reglas.php">
        Mira las Reglas &#128214;
    </a>
    <a class= "leaderboard" href="tabla.php">
        Tabla de Clasificación<br>
        <div class="tabla">
        <?php
        require_once('display_tabla.php');
        display_table($pdo,3); //only show 3 rows
        ?>
        </div>
    </a>
    <div class='copa-foto'>
        <img alt = 'Copa' class ='copa' src="../images/copa_america.png" width = "90" height = "180">
        <img alt = 'Messi' class="messi" src="../images/messi.png" width="100" height="150">
    </div>
    <a href="mispuntos.php" class = 'tus-puntos'>
        Has acumulado 
        <?php
        require_once('mispuntos_view.php');
        $points = total_points_from_username($pdo,$_SESSION['user_username']);
        echo $points;
         ?>
         puntos
    </a>
    <div class='jugadores-count'>
        Hay 
        <?php
        require_once('count_users.php');
        $count = get_count($pdo);
        echo $count;
        ?>
        jugadores participando
    </div>

</div>
</body>

</html>

