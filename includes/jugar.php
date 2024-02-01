<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/jugar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">

    <title>Jugar</title>
</head>
    <body>

        <?php
            try{
                require_once('config_session_inside.inc.php');
                require_once('dbh.inc.php');
                require_once('menu.php');
                require_once('jugar_model.inc.php');
                ?>
                <h1>Ingresa tus resultados</h1>
                <div class = 'jugar' >
                <?php
                
                if(check_table_access($pdo, "juegos__fasedegrupos")['acceso']){
                    if(!check_if_table_exists($pdo, "fasedegrupos__".$_SESSION['user_username'])){
        ?>
            <?php
                ?>
                <a class = 'acceso' href="jugar_enter_results.php?fase=fasedegrupos">&#9917 Fase de Grupos</a>
                <?php
                    
                }
                else{
                    ?>
                    
                    <div class = 'aviso'>&#9989 Ya has enviado tus resultados para fase de grupos!</div>
                    
                    <?php
                    
                }

            }
            else
            {
                ?>
                <div class = 'aviso'>&#9940 Fase de grupos se encuentra cerrado</div>
                <?php   
            }
            ?>

<?php
                if(check_table_access($pdo, "juegos__cuartos")['acceso']){
                    if(!check_if_table_exists($pdo, "cuartos__".$_SESSION['user_username'])){
        ?>
            <?php
                ?>
                <a class = 'acceso' href="jugar_enter_results.php?fase=cuartos">Cuartos</a>
                <?php
                    
                }
                else{
                    ?>
                    
                    <div class = 'aviso'>&#9989 Ya has enviado tus resultados para cuartos!</div>
                    
                    <?php
                    
                }

            }
            else
            {
                ?>
                <div class = 'aviso'>&#9940 Cuartos se encuentra cerrado</div>
                <?php   
            }
            ?>

<?php
                if(check_table_access($pdo, "juegos__semis")['acceso']){
                    if(!check_if_table_exists($pdo, "semis__".$_SESSION['user_username'])){
        ?>
            <?php
                ?>
                <a class = 'acceso' href="jugar_enter_results.php?fase=semis">Semifinales</a>
                <?php
                    
                }
                else{
                    ?>
                    
                    <div class = 'aviso'>&#9989 Ya has enviado tus resultados para Semifinales!</div>
                    
                    <?php
                    
                }

            }
            else
            {
                ?>
                <div class = 'aviso'>&#9940 Semifinales se encuentra cerrado</div>
                <?php   
            }
            ?>
                
                <?php
                if(check_table_access($pdo, "juegos__final")['acceso']){
                    if(!check_if_table_exists($pdo, "final__".$_SESSION['user_username'])){
        ?>
            <?php
                ?>
                
                <a class = 'acceso' href="jugar_enter_results.php?fase=final">Final y 3er puesto</a>
                <?php
                    
                }
                else{
                    ?>
                    
                    <div class = 'aviso'>&#9989 Ya has enviado tus resultados para Finales!</div>
                    
                    <?php
                    
                }

            }
            else
            {
                ?>
                <div class = 'aviso'>&#9940 Final y 3er puesto se encuentra cerrado</div>
                <?php   
            }
            ?>

        </div>            

            <?php
            
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
            


            ?>
    
    </body>

</html>

<?php
    require_once('redirect.php');
?>