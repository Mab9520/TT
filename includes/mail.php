<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//aleatoria
$codigoran = rand(1000,9999);

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
    $mail->addAddress($correo);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gracias por registrarte';
    $mail->Body    = '<html>
<head>
    <meta charset="UTF-8">

    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
  <title>Gracias por registrarte</title>
</head>
<body>
  <p>Tu codigo de verificacion es :</p>
   <h2>'.$codigoran.'</h2>
  <p> <a 
     href="http://61f8de7ffd0e.ngrok.io/TT/includes/confirm.php?email='.$correo.'">

    Verificar cuenta </a> 
    </p>
</body>
</html>';

$mail->send();
    
} catch (Exception $e) {
    
}
?>