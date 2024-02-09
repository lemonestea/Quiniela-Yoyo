<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/tabla.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
    <body>
        
        <?php
            
            require_once('menu.php');
            require_once('config_session_inside.inc.php');
            require_once('redirect.php');
            require_once('dbh.inc.php');
            require_once('display_tabla.php');
        ?>
        <form class = 'center' method='post' action='cargar_tabla.php'>
            <button>Actualizar</button>
        </form>
        <h1 style="margin-bottom:2ch">Tabla de Posiciones</h1>
        <div class = 'tabla'>
        <div class = 'head'>Posición</div>
        <div class = 'head'>Jugador</div>
        <div class = 'head'>Puntos</div>
        <?php
        display_table($pdo, 10);
        ?>
        </div>
        
    </body>
</html>