<!DOCTYPE html>
<html lang='es'>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="preload" as="image" href="/images/Instagram_Glyph_White.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiniela</title>
</head>
<body>

<?php
require_once('includes/config_session.inc.php');
require_once('includes/signup_view.inc.php');
require_once('includes/login_view.inc.php');
?>

<div>
    <img class = "logo" alt= 'Quiniela Yoyo' src="/images/icon_soccerball.png" width="60" height="60">
</div>
        <p>Quiniela de la Copa América 2024</p>
        <?php
        if(isset($_SESSION['password_updated'])){
            echo "<p style='color:green'>Contraseña actualizada</p>";
            unset($_SESSION["password_updated"]);
        }
        ?>
        <div class = 'parent'>
        <div class = 'child'>
                <h3>Regístrate</h3>

                <form action = "includes/signup.inc.php" method = "post" class = "signup-form" >
                    <?php
                    signup_input();
                    ?>
                    <button>Registrar</button>
                    <?php 
        
                    check_signup_errors();
                    
                    if(isset($_SESSION['user_id'])){
                        header("Location: includes/home.php");
                        die();
                    } 
                    ?>
                </form>
                 
            </div>
            <div class = 'child'>
                <h3>Inicia Sesión</h3>
                <form action = "includes/login.inc.php" method = "post" class = "login-form" >
                

                    <input type = "text" autocapitalize="none" name = "username" placeholder = "Usuario">
                    <br>
                    <input id ="pwd2" type = "password" required autocapitalize="none" name = "pwd" placeholder = "Contraseña">
                    <br>
                    
                    <button>Entrar</button>
                    <?php 
                check_login_errors();
                if(isset($_SESSION["code_is_correct"])){
                    unset($_SESSION["code_is_correct"]);
                }
                
                ?>
                <br>
                <a id="forgot-password-link" href="includes/forgot_password.php">Olvidaste tu contraseña?</a>
                </form> 
            </div>
        </div>
        <footer>
            <p>Website done by YoyoDev and hosted on ngrok for recreational purposes</p>
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