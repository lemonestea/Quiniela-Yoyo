<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/reglas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reglas</title>
</head>
    <body>
        
        <?php
            require_once('menu.php');
            require_once('config_session_inside.inc.php');
            require_once('redirect.php');
        ?>
        <h1>Puntos</h1>
        <div class ="center">
        <p>
        En esta quiniela los participantes pueden ganar
        puntos de la siguiente manera en cada fase del torneo:
        </p>
        </div>
        <br><br>
        <div class="puntos-reglas">

            <div class="fase">
            
            <div>
                &#127942; Puntos por atinar Ganador<br><br>
                &#9917; Puntos por atinar número de Goles<br><br>
                &#128293; Puntos por atinar ganador en Penales           
            </div>
            </div>

            <div class="fase">
            <p class="title">&#128309; Fase de Grupos</p>
            <br>
            <div class="grid">
                <div>&#127942;</div><div>2 puntos</div>
                <div>&#9917;</div><div>1 punto</div>                
            </div>
            </div>

            <div class="fase">
            <p class="title">&#128309; Cuartos de Final</p>
            <br>
            <div class="grid">
                <div>&#127942;</div><div>5 puntos</div>
                <div>&#9917;</div><div>3 puntos</div>
                <div>&#128293;</div><div>1 punto</div>                
            </div>
            </div>

            <div class="fase">
            <p class="title">&#128309; Semifinales</p>
            <br>
            <div class="grid">
                <div>&#127942;</div><div>7 puntos</div>
                <div>&#9917;</div><div>5 puntos</div>
                <div>&#128293;</div><div>2 puntos</div>                
            </div>
            </div>

            <div class="fase">
            <p class="title">&#128309; Tercer Puesto</p>
            <br>
            <div class="grid">
                <div>&#127942;</div><div>7 puntos</div>
                <div>&#9917;</div><div>5 puntos</div>
                <div>&#128293;</div><div>2 puntos</div>                
            </div>
            </div>

            <div class="fase">
            <p class="title">&#128309; Final</p>
            <br>
            <div class="grid">
                <div>&#127942;</div><div>9 puntos</div>
                <div>&#9917;</div><div>7 puntos</div>
                <div>&#128293;</div><div>3 puntos</div>                
            </div>
            </div>

        </div>
        <br><br>
        <h1>Fechas Límite</h1>
        <div class="center">
        <p>
            En cada fase los jugadores tendran un límite de tiempo para mandar
            sus quinielas. Las fechas de &#128309; inicio y &#128308; fin son las siguientes:<br>
        </p>
        </div>
        <br><br>
        <div class="fechas-reglas">
            <div>
                Fase de Grupos<br><br>
                &#128309; 01-06-2024<br>
                &#128308; 20-06-2024
            </div>
            <div>
                Cuartos<br><br>
                &#128309; 03-07-2024<br>
                &#128308; 04-07-2024
            </div>
            <div>
                Semifinales<br><br>
                &#128309; 07-07-2024<br>
                &#128308; 09-07-2024
            </div>
            <div>
                Final y 3er puesto<br><br>
                &#128309; 11-07-2024<br>
                &#128308; 13-07-2024
            </div>
        </div>
        <br><br>
        <div class = "center" >
        <p style="text-align:center;">
            &#9200;Horas&#9200;<br><br> Una hora despues del ultimo partido de cada fase hasta una hora antes del primer partido
            de la siguiente fase
        </p>
        </div>
        <br><br>
        <h1>Alguna duda?</h1>
        <div class="center">
        <p>
            &#10071; Si tienes alguna duda puedes contactarnos por el grupo de WhatsApp de la Quiniela
        </p>
        </div>
    </body>
</html>
