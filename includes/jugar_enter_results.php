<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/enter_results.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jugar</title>
</head>
    <body>
<?php

    try{
        require_once('dbh.inc.php');
        require_once('config_session_inside.inc.php');
        require_once('dbh.inc.php');
        require_once('menu.php');
        require_once('jugar_model.inc.php');
        require_once('jugar_view.inc.php');
        require_once('redirect.php');

        $username = $_SESSION['user_username'];
        $fase = $_GET['fase'];

        if(isset($username) && !check_if_table_exists($pdo, $fase."__".$username) && check_table_access($pdo,"juegos__".$fase))
        {
            $tabla_fdg = fetch_table($pdo,"juegos__".$fase);
            display_table($tabla_fdg,$fase);
        }
        else{
            header("Location: ../index.php");
            die();
        }
        ?>
        </body>

        </html>
        <?php
    }
    catch(PDOException $e) {
        header("Location: ../index.php");
    }

?>
