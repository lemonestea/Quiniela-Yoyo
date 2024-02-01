<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/mispuntos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">

    <title>Mis Puntos</title>
</head>
    <body>
        
        <?php
            require_once('menu.php');
            require_once('config_session_inside.inc.php');
            require_once('dbh.inc.php');
            ?>
            <h1>Mis puntos</h1>
            <br><br>
            <?php
            require_once('mispuntos_model.php');
            require_once('mispuntos_control.php');
            require_once('mispuntos_view.php');
            total_points($pdo,$_SESSION['user_username']);
            
        ?>
        
            </div>
    </body>
</html>
<?php

//require_once('redirect.php');

?>