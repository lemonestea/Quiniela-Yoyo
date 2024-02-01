
<?php
require_once('includes/config_session.inc.php');
require_once('includes/signup_view.inc.php');
require_once('includes/login_view.inc.php');
?>
<html>
<head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">
    <title>Quiniela</title>
</head>

    <body>
        <br>
<div>
    <img class = "logo" src="/images/icon_soccerball.png" width="60" height="60">
</div>
        
        <div class = 'parent'>
            <div class = 'child'>
                <h3>Inicia Sesión</h3>
                <form action = "includes/login.inc.php" method = "post" class = "login-form" >
                

                    <input type = "text" name = "username" placeholder = "Usuario">
                    <br>
                    <input type = "password" name = "pwd" placeholder = "Contraseña">
                    <br>
                    <button>Entrar</button>
                    <?php 
                check_login_errors();
                ?>
                </form>
            
                
            </div>
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
                    } 
                    ?>
                    <div style="margin-top:3ch;">Usa solo letras y numeros</div>
                    <div>Evita usar espacios o caracteres invalidos</div>
                </form>
                 
            </div>
        </div>
        
    </body>
</html>