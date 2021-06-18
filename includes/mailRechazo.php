<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$especialista=$_SESSION['Nombre'];
$correo=$usuario[0]['Correo'];

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
    $mail->Subject = 'Te han rechazado el especialista';
    $mail->Body    = '<html>
<head>
    <meta charset="UTF8" />
    <link rel=StyleSheet href="../css/style.css" type="text/CSS">
  <title>Notificacion de Rechazo</title>
</head>
<body>
<h1>  El especialista '.$especialista.'  </h1>
  <p>Te ha rechazado, pero no te preocupes puedes enviar a otro especialista.</p>
  
 <h2></h2>
  
</body>
</html>';

$mail->send();
    
} catch (Exception $e) {
    
}
?>
