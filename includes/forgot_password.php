
<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="../images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera tu Cuenta</title>
</head>
<body>
<?php
require_once('config_session.inc.php');
?>
<div>
    <img alt = 'Quiniela Yoyo' class = "logo" src="/images/icon_soccerball.png" width="60" height="60">
</div>
<div class='parent'>
<div class = 'child'>
    <h3>Reestablecer contraseña</h3>
    <form action = "send_email.php" method = "post" class = "login-form" >

        <input type = "text" name = "email" placeholder = "Email">
        <br>
        <button>Enviar código</button>
        <?php
        if(isset($_GET["invalid"])){
            echo "<p>Email inválido</p>";
        }
        if(isset($_GET["user_not_found"])){
            echo "<p>Email no registrado</p>";
        }
        ?>
        </form> 
    </div>
</div>
<footer>
    <p>Website launched and designed by YoyoDev for recreational purposes</p>
    <p><a href="https://github.com/yoyodev9" target="_blank">&#174; YoyoDev</a> - &copy; 2024 Copa America</p>
    <p>Open Source Project</p>
    <a href="https://github.com/yoyodev9/Quiniela-Yoyo" target="_blank">Github repository</a>
    <br><br>
    <a href="https://www.instagram.com/chamofutbolero/" target="_blank">
    <i class="fab fa-instagram" style="color: white;"></i>
    </a>
    
</footer>
</body>

</html>