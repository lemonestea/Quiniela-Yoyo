<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="../images/icon_soccerball.png">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera tu Cuenta</title>
</head>
<body>
<?php
require_once('config_session.inc.php');

if(!isset($_SESSION['code'])) {
    header('Location: forgot_password.php');
}
?>
<div>
    <img alt = 'Quiniela Yoyo' class = "logo" src="/images/icon_soccerball.png" width="60" height="60">
</div>
<div class='parent'>
<div class = 'child'>
    <?php
    if((!isset($_SESSION['toggler']) || $_SESSION['toggler'] == 0) && !isset($_SESSION['code_is_correct'])){
    ?>
    
    <h3>Introduce tu código</h3>
    <form action = "verify_code.php" method = "post" class = "login-form" >
        <p>Hemos enviado un código de acceso a tu correo</p>
        <input type = "number" name = "code" placeholder = "Código">
        <br>
        <button>Ok</button>
        <?php
        if(isset($_GET["code_invalid"])){
            echo "<p>Código incorrecto</p>";
        }
        ?>
    </form>
    <?php
    }
    else if(isset($_SESSION['code_is_correct']) && isset( $_SESSION['toggler'] ) && $_SESSION['toggler'] == 1){
        
    ?>

    <h3>Crea tu nueva contraseña</h3>
    <form action = "update_password.php" method = "post" class = "login-form" >
        <input type = "password" minlength="6" name = "pwd1" placeholder = "Nueva contraseña">
        <br>
        <input type = "password" minlength="6" name = "pwd2" placeholder = "Nueva contraseña">
        <button>Ok</button>
    </form>
        <?php
    }
    ?>
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