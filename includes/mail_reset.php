<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//aleatoria
$codigo = rand(1000,9999);

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'herramientaapoyoalpsicologo@gmail.com
';                     //SMTP username
    $mail->Password   = 'herramientaapoyo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('herramientaapoyoalpsicologo@gmail.com', 'Herramienta Apoyo al Psicologo
');
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Restablecer Contraseña';
    $mail->Body    = '<html>
<head>
  <title>Restablecer</title>
</head>
<body>
    <h1>Herramienta de apoyo al Psicologo</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contrasena</p>
        <h3>'.$codigo.'</h3>
        <p> <a 
            href="https://82820e037cd9.ngrok.io/TT/includes/reset.php?email='.$email.'&codigo='.$codigo.'"> 
            para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
</body>
</html>';

$mail->send();
    
} catch (Exception $e) {
    
}
?>

