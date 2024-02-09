<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../sendemail/phpmailer/src/Exception.php");
require_once("../sendemail/phpmailer/src/PHPMailer.php");
require_once("../sendemail/phpmailer/src/SMTP.php");
require_once('config_session.inc.php');

$email = strtolower($_POST['email']);
if(isset($_POST['email']))
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $code = rand(100000,999999);
        $mail = new PHPMailer(true);
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "quinielayoyo@gmail.com";
        $mail->Password = "jcacemuvjiygbevt";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->setFrom("quinielayoyo@gmail.com");
        $mail->addAddress($email);
        $mail->IsSMTP();
        $mail->Subject = "Restaurar tu cuenta en Quiniela Yoyo";
        $mail->Body = "Tu clave de acceso es: " . strval($code);

        $mail->send();

        $_SESSION["code"] = $code;
        $_SESSION["email"] = $email;
        $_SESSION['toggler'] = 0;               //0 for entering code and 1 for entering new passwords
        header("Location: set_new_password.php");
    }
    else{
        header("Location: forgot_password.php?invalid=1");
        die();
    }
}
else{
    header("Location: forgot_password.php?invalid=1");
}