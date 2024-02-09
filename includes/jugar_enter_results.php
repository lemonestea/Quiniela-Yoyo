<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/enter_results.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jugar</title>
    <script>
        // Función que se llama cuando se cambia el valor de los inputs de resultado
        function habilitarPenales(resultado1,resultado2,penales1, penales2) {
            var resultado1 = document.getElementById(resultado1);
            var resultado2 = document.getElementById(resultado2);
            var penales1 = document.getElementById(penales1);
            var penales2 = document.getElementById(penales2);
            var result1 = parseInt(resultado1.value);
            var result2 =parseInt(resultado2.value);

            // Habilitar o deshabilitar el input de penales basándose en si los resultados son iguales
            if(result1 == result2 && 
            resultado1.value != "" && resultado2.value != ""){
                penales1.required = true;
                penales2.required = true;
                penales1.disabled = false;
                penales2.disabled = false;
            }
            else{
                penales1.required = false;
                penales2.required = false;
                penales1.value = null;
                penales2.value = null;
                penales1.disabled = true;
                penales2.disabled = true;
            }
        }
    </script>
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
require_once('redirect.php');
?>
