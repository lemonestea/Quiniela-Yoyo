<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <link rel="stylesheet" href="/styles/buscar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">
    <title>Inicio</title>
</head>
<body>
<?php 
    require_once("menu.php");
?>
<h1>Buscar</h1>
    <form class = "search" action= "perfil.php" method="post">
        <input type="text" name="search" autocomplete="off" placeholder="Buscar perfil de un usuario..."/>
        <br>
        <button>Ir</button>
    </form>
    <?php
    date_default_timezone_set("Europe/Madrid");

        if (isset($_GET['status'])){
            if($_GET['status'] == "user_not_found"){
                echo "<p class = 'user-not-found'>No existe ningún jugador con ese nombre de usuario</p>";
            }
            if($_GET['status'] == "empty_search"){
                echo "<p class = 'user-not-found'>Introduzca un nombre de usuario</p>";
            }
        }
        require_once("redirect.php");
    ?>
</body>
</html>
